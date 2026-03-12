@extends('layouts.backend.app')

@section('meta')
    <title>डाक रजिस्टर / Dak Register | Admin</title>
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
                    <a href="{{ route('admin.daks.create') }}" class="btn btn-primary">
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
                                <th>स्रोत<br>Source</th>
                                <th>पत्रांक संख्या<br>Letter No.</th>
                                <th>दिनांक<br>Date</th>
                                <th>संदर्भ<br>Subject</th>
                                <th>उपयोगकर्ता प्रकार<br>User Type</th>
                                {{-- <th>टिप्पणी<br>Remark</th> --}}
                                <th>स्थिति<br>Status</th>
                                <th>छवि<br>Image</th>
                                <th>कार्यवाही<br>Action</th>
                                <th>इतिहास<br>History</th>
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
                                    {{-- <td>
                                        <form action="{{ route('admin.daks.updateUser', $dak->id) }}" method="POST">
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
                                    <td>
                                        <span class="export-remark d-none">{{ $dak->remark }}</span>

                                        <form method="POST" action="{{ route('admin.daks.updateRemark', $dak->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="text" name="remark" value="{{ $dak->remark }}"
                                                class="form-control form-control-sm" onchange="this.form.submit()"
                                                placeholder="Enter Remark">
                                        </form>
                                    </td> --}}
                                    <td>
                                        <form action="{{ route('admin.daks.updateUser', $dak->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <select name="user_id" class="form-select form-select-sm">
                                                <option value="">Select User</option>

                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $dak->user_id == $user->id ? 'selected' : '' }}>

                                                        {{ $user->name }}

                                                    </option>
                                                @endforeach

                                            </select>

                                            <input type="text" name="remark" class="form-control form-control-sm mt-1"
                                                placeholder="Enter Remark">

                                            <input type="date" name="pickup_date"
                                                class="form-control form-control-sm mt-1">

                                            <button type="submit" class="btn btn-sm btn-primary mt-1">

                                                Assign

                                            </button>

                                        </form>
                                    </td>

                                    <!-- Status Dropdown -->
                                    <td>
                                        <form action="{{ route('admin.daks.updateStatus', $dak->id) }}" method="POST">
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
                                        @if (!empty($dak->attachment))
                                            <a href="{{ route('admin.daks.download', $dak->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                                            <a href="{{ route('admin.daks.edit', $dak->id) }}"
                                                class="btn btn-soft-info btn-sm waves-effect waves-light"><i
                                                    class="bx bx-pencil font-size-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-sm waves-effect waves-light sa-delete"
                                                title="Delete Brand" data-id="{{ $dak->id }}"
                                                data-link="/admin/daks/delete/"><i class="bx bx-trash font-size-16"></i></a>
                                        </div>
                                    </td>
                                    <!-- History Button -->
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#historyModal{{ $dak->id }}">
                                            History
                                        </button>
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


    {{-- Model  --}}
    @foreach ($daks as $dak)
        <div class="modal fade" id="historyModal{{ $dak->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">
                            Dak History - {{ $dak->letter_number }}
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Remark</th>
                                    <th>Pickup Date</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($dak->histories as $history)
                                    <tr>
                                        <td>{{ $history->sender->name ?? 'Admin' }}</td>
                                        <td>{{ $history->assignedUser->name ?? '-' }}</td>
                                        <td>{{ $history->remark }}</td>
                                        <td>{{ $history->pickup_date }}</td>
                                        <td>{{ $history->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center">No History Found</td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>
        </div>
    @endforeach

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Only apply DataTables if there's at least one data row
            const rowCount = $('.table tbody tr').length;
            const isEmpty = $('.table tbody tr td').first().attr('colspan') == 9;

            if (rowCount > 0 && !isEmpty) {
                $('#daksTable').DataTable({
                    dom: 'Bfrtip',
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

                                        if ($(node).find('.export-remark').length) {
                                            return $(node).find('.export-remark').text().trim();
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

                                        let $node = $(node).clone();

                                        // remove form elements (they cause new line issue)
                                        $node.find('form').remove();
                                        $node.find('select').remove();
                                        $node.find('input').remove();
                                        $node.find('button').remove();

                                        // get selected text from dropdown
                                        if ($(node).find('select').length) {
                                            let selectedText = $(node).find(
                                                'select option:selected').text();
                                            return selectedText ? selectedText.replace(/\s+/g, ' ')
                                                .trim() : '';
                                        }

                                        // remark safe export
                                        if ($(node).find('.export-remark').length) {
                                            return $(node).find('.export-remark').text().replace(
                                                /\s+/g, ' ').trim();
                                        }

                                        // default clean text (removes line breaks)
                                        return $node.text().replace(/\s+/g, ' ').trim();
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

                                        if ($(node).find('.export-remark').length) {
                                            return $(node).find('.export-remark').text().trim();
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
