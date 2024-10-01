@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            <!-- Page Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Policy Details</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h3>Policy {{ $policy->policy_number }}</h3>

                        <!-- Back Button -->
                        <a href="{{ route('staff.dashboard') }}" class="btn btn-secondary mb-3">
                            <i class="fa fa-arrow-left"></i> Back to Dashboard
                        </a>

                        <table class="table table-bordered">
                            <tr>
                                <th>Plan Reference</th>
                                <td>{{ $policy->plan_reference }}</td>
                            </tr>
                            <tr>
                                <th>Member Name</th>
                                <td>{{ $policy->member_name }}</td>
                            </tr>
                            <tr>
                                <th>Investment House</th>
                                <td>{{ $policy->investment_house }}</td>
                            </tr>
                            <tr>
                                <th>Last Operation</th>
                                <td>{{ $policy->last_operation }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!-- wrapper -->
@endsection
