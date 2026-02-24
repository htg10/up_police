@extends('layouts.backend.app')

@section('meta')
    <title>उपयोगकर्ता सूची / All Users</title>
@endsection
@section('style')
@endsection

@section('content')
    <!--[ Page Content ] start -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- [ breadcrumb ] start -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">उपयोगकर्ता सूची / All Users</h4>
                        <div class="page-title-right">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary waves-effect waves-light"><i
                                    class="fas fa-reply-all"></i> नया उपयोगकर्ता जोड़ें / Add New User</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card border">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped align-middle" id="usersTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>क्रम संख्या<br>Sr.No.</th>
                                        <th>उपयोगकर्ता नाम<br>User Name</th>
                                        <th>उपयोगकर्ता प्रकार<br>User Type</th>
                                        <th>ईमेल<br>Email</th>
                                        <th>मोबाइल नंबर<br>Mobile No.</th>
                                        <th>कार्यवाही<br>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-wrap"><a href="{{ 'user/' . $user->id . '/edit' }}"
                                                    style="color: black">{{ $user->name }}</a></td>
                                            <td class="text-wrap">
                                                {{ $user->role_id == 1 ? 'Admin' : 'User' }}
                                            </td>
                                            <td class="text-wrap">{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->mobile }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                                    <a href="{{ 'user/' . $user->id . '/edit' }}"
                                                        class="btn btn-soft-info btn-sm waves-effect waves-light"><i
                                                            class="bx bx-pencil font-size-16"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-soft-danger btn-sm waves-effect waves-light sa-delete"
                                                        title="Delete Brand" data-id="{{ $user->id }}"
                                                        data-link="/user/delete/"><i
                                                            class="bx bx-trash font-size-16"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No daks found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div> <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Only apply DataTables if there's at least one data row
            const rowCount = $('.table tbody tr').length;
            const isEmpty = $('.table tbody tr td').first().attr('colspan') == 6;

            if (rowCount > 0 && !isEmpty) {
                $('#usersTable').DataTable({
                    dom: 'Bfrtip', // Buttons on top
                    buttons: [{
                            extend: 'excelHtml5',
                            text: 'Excel',
                            title: 'Users List',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude Action column
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            title: 'Users List',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        }
                    ],
                    pageLength: 10,
                    ordering: true,
                    searching: true,
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 5]
                    }]
                });
            }
        });
    </script>
@endsection
