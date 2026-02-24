@extends('layouts.backend.app')

@section('meta')
    <title>डाक रजिस्टर / Dak Register | User</title>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Header -->
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h4 class="text-primary">
                        <i class="fas fa-building"></i> डाक रजिस्टर
                    </h4>
                    <a href="{{ route('user.daks.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> नई प्रविष्टि / New Entry
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="card shadow-sm">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped align-middle" id="daksTable">
                        <thead class="table-light">
                            <tr>
                                <th>क्रम संख्या<br>Sr.No</th>
                                <th>प्रकार<br>Type</th>
                                <th>पत्रांक संख्या<br>Letter No.</th>
                                <th>दिनांक<br>Date</th>
                                <th>संदर्भ<br>Subject</th>
                                <th>उपयोगकर्ता प्रकार<br>User Type</th>
                                <th>स्थिति<br>Status</th>
                                <th>टिप्पणी<br>Remark</th>
                                <th>कार्यवाही<br>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daks as $index => $dak)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($dak->type) }}</td>
                                    <td>{{ $dak->letter_number }}</td>
                                    <td>{{ $dak->received_date }}</td>
                                    <td>{{ $dak->subject }}</td>
                                    <!-- User Type Dropdown -->
                                    <td>
                                        <form action="{{ route('user.daks.updateUser', $dak->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="user_id" class="form-select form-select-sm"
                                                onchange="this.form.submit()">
                                                <option value="">Select User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $dak->user_id == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>

                                    <!-- Status Dropdown -->
                                    <td>
                                        <form action="{{ route('user.daks.updateStatus', $dak->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()"
                                                class="form-select form-select-sm
                                                {{ $dak->status == 'Pending' ? 'border border-danger text-danger' : '' }}
                                                {{ $dak->status == 'In Progress' ? 'border border-warning text-warning' : '' }}
                                                {{ $dak->status == 'Completed' ? 'border border-success text-success' : '' }}
                                            ">
                                                <option value="Pending" class="text-danger"
                                                    {{ $dak->status == 'Pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="In Progress" class="text-warning"
                                                    {{ $dak->status == 'In Progress' ? 'selected' : '' }}>In Progress
                                                </option>
                                                <option value="Completed" class="text-success"
                                                    {{ $dak->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('user.daks.updateRemark', $dak->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="text" name="remark" value="{{ $dak->remark }}"
                                                class="form-control form-control-sm" placeholder="Enter remark"
                                                onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                                            <a href="{{ route('user.daks.edit', $dak->id) }}"
                                                class="btn btn-soft-info btn-sm waves-effect waves-light"><i
                                                    class="bx bx-pencil font-size-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-sm waves-effect waves-light sa-delete"
                                                title="Delete Brand" data-id="{{ $dak->id }}"
                                                data-link="/user/daks/delete/"><i class="bx bx-trash font-size-16"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted">No daks found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Only apply DataTables if there's at least one data row
            const rowCount = $('.table tbody tr').length;
            const isEmpty = $('.table tbody tr td').first().attr('colspan') == 9;

            if (rowCount > 0 && !isEmpty) {
                $('#daksTable').DataTable({
                    dom: 'Bfrtip', // Buttons on top
                    buttons: [{
                            extend: 'excelHtml5',
                            text: 'Excel',
                            title: 'Daks List',
                            exportOptions: {
                                columns: ':not(:last-child)',
                                modifier: {
                                    page: 'current'
                                },
                                format: {
                                    header: function(data, columnIdx) {

                                        const headers = [
                                            "Sr No",
                                            "Type",
                                            "Letter No",
                                            "Date",
                                            "Subject",
                                            "User",
                                            "Status",
                                            "Remark"
                                        ];

                                        return headers[columnIdx];
                                    },
                                    body: function(data, row, column, node) {
                                        if ($(node).find('select').length) {

                                            let selectedText = $(node).find(
                                                'select option:selected').text();

                                            if (!selectedText) {
                                                selectedText = $(node).find('select').val();
                                            }

                                            return selectedText ? selectedText.trim() : '';
                                        }

                                        if ($(node).find('input').length) {
                                            return $(node).find('input').val();
                                        }

                                        return $(node).text().trim();
                                    }
                                }
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            title: 'Daks List',
                            orientation: 'potrait',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: ':not(:last-child)',
                                modifier: {
                                    page: 'current'
                                },
                                format: {
                                    header: function(data, columnIdx) {

                                        const headers = [
                                            "Sr No",
                                            "Type",
                                            "Letter No",
                                            "Date",
                                            "Subject",
                                            "User",
                                            "Status",
                                            "Remark"
                                        ];

                                        return headers[columnIdx];
                                    },
                                    body: function(data, row, column, node) {

                                        if ($(node).find('select').length) {
                                            return $(node).find('select option:selected').text();
                                        }

                                        if ($(node).find('input').length) {
                                            return $(node).find('input').val();
                                        }

                                        return data;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            exportOptions: {
                                columns: ':not(:last-child)',
                                modifier: {
                                    page: 'current'
                                },
                                format: {
                                    header: function(data, columnIdx) {

                                        const headers = [
                                            "Sr No",
                                            "Type",
                                            "Letter No",
                                            "Date",
                                            "Subject",
                                            "User",
                                            "Status",
                                            "Remark"
                                        ];

                                        return headers[columnIdx];
                                    },
                                    body: function(data, row, column, node) {

                                        if ($(node).find('select').length) {
                                            return $(node).find('select option:selected').text();
                                        }

                                        if ($(node).find('input').length) {
                                            return $(node).find('input').val();
                                        }

                                        return data;
                                    }
                                }
                            }
                        }
                    ]
                });
            }
        });
    </script>
@endsection
