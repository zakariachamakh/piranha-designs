@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <div class="container">

            <!-- Page Title -->
            <div class="row">
                <div class="col-sm-12" style="padding-bottom: 20px;">
                    <!-- Placeholder for page title or actions -->
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="header">
                            <h3>Edit Staff</h3>
                        </div>

                        <!-- Staff Information -->
                        <form class="col-12 padded padded-bottom padded-la" action="{{ route('admin.staff.store') }}" method="POST">
                            @csrf
                            <!-- If you want to allow editing, include appropriate fields and method -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $staff->name }}" required/>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $staff->email }}" disabled/>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <label>Status</label><br/>
                                    @if ($staff->status == 'active')
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-info">Invitation Sent</span>
                                    @endif
                                </div>
                            </div>
                        </form>

                        <!-- Assigned Policies -->
                        <div class="col-12 header">
                            <h3>Policies
                                <button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal"
                                        data-target="#addProducts">
                                    <i class="fa fa-plus"></i> Add Policy
                                </button>
                            </h3>
                        </div>

                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Policy</th>
                                        <th>Plan Reference</th>
                                        <th>Member Name</th>
                                        <th>Investment House</th>
                                        <th>Last Operation</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($policies->isNotEmpty())
                                        @foreach ($policies as $policy)
                                            <tr>
                                                <td>{{ $policy->code }}</td>
                                                <td>{{ $policy->plan_reference }}</td>
                                                <td>{{ $policy->first_name }} {{ $policy->last_name }}</td>
                                                <td>{{ $policy->investment_house }}</td>
                                                <td>{{ $policy->last_operation ?? '-' }}</td>
                                                <td>
                                                    <!-- Remove Policy Form -->
                                                    <form method="POST" action="{{ route('admin.staff.removePolicy', ['id' => $staff->id, 'policyId' => $policy->id]) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">No policies assigned to this staff member.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            <!-- Save and Remove Staff -->
                            <div class="row padded">
                                <div class="col-6">
                                    <!-- If you have an update route, use it here. Otherwise, you can remove this button -->
                                    <button type="submit" name="submit" class="btn btn-success">
                                        <i class="fa fa-floppy-o"></i> Save
                                    </button>
                                </div>
                                <div class="col-6 text-right padded padded-top">
                                    <!-- Remove Staff Button -->
                                    <a href="#"
                                       onclick="event.preventDefault(); document.getElementById('remove-staff-form').submit();"
                                       title="Remove User"
                                       class="text-danger">
                                        <i class="fa fa-trash"></i> Remove Staff
                                    </a>

                                    <form id="remove-staff-form" action="{{ route('admin.staff.remove', ['id' => $staff->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Policy Modal -->
                <div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Available Policies</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Policy</th>
                                                <th>Plan Reference</th>
                                                <th>Member Name</th>
                                                <th>Investment House</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($availablePolicies->isNotEmpty())
                                                @foreach ($availablePolicies as $policy)
                                                    <tr>
                                                        <td>{{ $policy->code }}</td>
                                                        <td>{{ $policy->plan_reference }}</td>
                                                        <td>{{ $policy->first_name }} {{ $policy->last_name }}</td>
                                                        <td>{{ $policy->investment_house }}</td>
                                                        <td>
                                                            <!-- Assign Policy Form -->
                                                            <form method="POST" action="{{ route('admin.staff.assignPolicy', ['id' => $staff->id]) }}" style="display:inline;">
                                                                @csrf
                                                                <input type="hidden" name="policy_id" value="{{ $policy->id }}">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-plus"></i> Add
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">No available policies to assign.</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- container -->

        <!-- Footer -->
        <footer class="footer">
            &copy; 2024. All Rights Reserved.
        </footer>
        <!-- End Footer -->

    </div> <!-- End wrapper -->
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
