<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Policy;

class StaffDashboardController extends Controller
{
    /**
     * Show the staff dashboard with the list of policies.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Get the current authenticated user
        $staff = auth()->user();

        // Fetch the policies assigned to the staff
        $policies = $staff->policies;

        // Return the staff dashboard view with the policies
        return view('admin.staff.dashboard', compact('policies'));
    }

    /**
     * Show details for a specific policy.
     *
     * @param int $policyId
     * @return \Illuminate\View\View
     */
    public function showPolicy($policyId)
    {
        // Find the policy by ID and ensure it belongs to the authenticated user
        $policy = Policy::where('id', $policyId)
            ->where('staff_user_id', Auth::user()->id)
            ->firstOrFail();

        return view('admin.staff.policy-details', compact('policy'));
    }
}
