<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPolicyRequest;
use App\Http\Requests\StoreStaffRequest;
use App\Models\Policy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * List all staff users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all users with the 'staff' role
        $staff = User::where('role', 'staff')->get();

        // Return a view to list staff users
        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Store a new staff member.
     *
     * @param \App\Http\Requests\StoreStaffRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreStaffRequest $request)
    {
        // Form is already validated by StoreStaffRequest
        $password = Str::random(10); // Generate a random password

        // Create the new staff user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password), // Store the hashed password
            'role' => 'staff',
            'status' => 'invitation_sent', // Assuming you track statuses
        ]);

        // Optionally, send an email with the generated password or invitation link
        // Mail::to($request->input('email'))->send(new InvitationEmail($password));

        return redirect()->route('admin.staff.index')->with('success', 'Invitation sent to the staff member.');
    }

    /**
     * View policies assigned to a specific staff user.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Get the staff user by ID
        $staff = User::findOrFail($id);

        // Get all policies assigned to this staff user
        $policies = $staff->policies()->get();

        // Get available policies not assigned to any staff
        $availablePolicies = Policy::whereNull('staff_user_id')->get();

        // Return a view to display policies
        return view('admin.staff.show', compact('staff', 'policies', 'availablePolicies'));
    }

    /**
     * Assign a policy to a staff user.
     *
     * @param \App\Http\Requests\AssignPolicyRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignPolicy(AssignPolicyRequest $request, $id)
    {
        // Find the staff user by ID
        $staff = User::findOrFail($id);

        // Find the policy by the validated policy ID from the request
        $policy = Policy::findOrFail($request->policy_id);

        // Assign the policy to the staff user
        $policy->staff_user_id = $staff->id;

        // Save the changes
        $policy->save();

        // Redirect back to the policies list for this staff user
        return redirect()->route('admin.staff.show', $id)
            ->with('success', 'Policy successfully assigned to staff.');
    }

    /**
     * Remove a policy from a staff user.
     *
     * @param int $id
     * @param int $policyId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removePolicy($id, $policyId)
    {
        // Find the policy by ID
        $policy = Policy::findOrFail($policyId);

        // Unassign the policy from the staff user
        $policy->staff_user_id = null;

        // Save the changes
        $policy->save();

        // Redirect back to the policies list for this staff user
        return redirect()->route('admin.staff.show', $id)
            ->with('success', 'Policy successfully removed from staff.');
    }

    /**
     * Remove a staff user (soft delete).
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeStaff($id)
    {
        // Find the staff user by ID
        $staff = User::findOrFail($id);

        // Unassign all policies from the staff user
        $staff->policies()->update(['staff_user_id' => null]);

        // Soft delete the staff user
        $staff->delete();

        // Redirect to the staff index with a success message
        return redirect()->route('admin.staff.index')
            ->with('success', 'Staff member removed successfully.');
    }
}
