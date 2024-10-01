@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <div class="container">

            <!-- Page Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>

            <!-- Policies Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="header">
                            <h3>Policies</h3>
                        </div>

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Policy Number</th>
                                <th>Plan Reference</th>
                                <th>Member Name</th>
                                <th>Investment House</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($policies->isEmpty())
                                <tr>
                                    <td colspan="4">No policies assigned yet.</td>
                                </tr>
                            @else
                                @foreach ($policies as $policy)
                                    <tr onclick="window.location='{{ route('staff.policy.details', $policy->id) }}'">
                                        <td>{{ $policy->policy_number }}</td>
                                        <td>{{ $policy->plan_reference }}</td>
                                        <td>{{ $policy->member_name }}</td>
                                        <td>{{ $policy->investment_house }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

        <!-- Footer -->
        <footer class="footer">
            &copy; 2024. All Rights Reserved.
        </footer>
        <!-- End Footer -->

    </div> <!-- End wrapper -->
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

    <!-- Page specific js -->
    <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>
@endsection
