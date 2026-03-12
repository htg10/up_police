@extends('layouts.backend.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-0 text-primary">
                            <i class="fas fa-building me-2"></i> डाक प्रविष्टि जोड़ें / Add Dak Entry
                        </h4>
                        <a href="{{ route('user.daks') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list me-1"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <form action="{{ route('user.daks.update', $dak->id) }}" method="POST" enctype="multipart/form-data"
                class="needs-validation">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    डाक विवरण संशोधित करें / Edit Dak Entry
                                </h4>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    {{-- Source Type --}}
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="dak_type" class="form-label fw-bold">
                                                स्रोत / Source
                                                <sup class="text-danger">*</sup>
                                            </label>
                                            <select id="dak_type" name="type" class="form-control dropdown_icon"
                                                required>
                                                <option value="registry" {{ $dak->type == 'registry' ? 'selected' : '' }}>
                                                    Registry / रजिस्ट्री</option>
                                                <option value="email" {{ $dak->type == 'email' ? 'selected' : '' }}>Email /
                                                    ईमेल</option>
                                                <option value="messenger" {{ $dak->type == 'messenger' ? 'selected' : '' }}>
                                                    Messenger / मैसेंजर</option>
                                            </select>
                                            <div class="invalid-feedback">This field is required.</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                पत्र कहाँ से / Letter From
                                            </label>
                                            <input type="text" name="letter_from" class="form-control"
                                                value="{{ $dak->letter_from }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                दिनांक / Date
                                            </label>
                                            <input type="date" name="received_date" class="form-control"
                                                onclick="this.showPicker()" value="{{ $dak->received_date }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                पत्रांक / Letter Number
                                            </label>
                                            <input type="text" name="letter_number" class="form-control"
                                                value="{{ $dak->letter_number }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                संदर्भ संख्या / Reference Number
                                            </label>
                                            <input type="text" name="reference_number" class="form-control"
                                                value="{{ $dak->reference_number }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                कहाँ भेजा गया / Sent To
                                            </label>
                                            <input type="text" name="sent_to" class="form-control"
                                                value="{{ $dak->sent_to }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                पत्र का संदर्भ / Subject
                                            </label>
                                            <textarea name="subject" class="form-control" rows="3">{{ $dak->subject }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                प्रेषक विवरण / Sender Details
                                            </label>
                                            <textarea name="sender_details" class="form-control" rows="3">{{ $dak->sender_details }}</textarea>
                                        </div>
                                    </div>
                                    {{-- File Upload --}}
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">
                                                दस्तावेज़ / Attach Document
                                            </label>
                                            <input type="file" name="attachment" class="form-control"
                                                accept=".pdf,.doc,.docx,.jpg,.png">
                                            @if ($dak->attachment)
                                                <small class="text-muted">Current file: <a
                                                        href="{{ asset('storage/daks/' . $dak->attachment) }}"
                                                        target="_blank">{{ $dak->attachment }}</a></small>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer text-start">
                                <button type="submit" class="btn btn-primary">
                                    अपडेट करें / Update
                                </button>
                                <a href="{{ route('user.daks') }}" class="btn btn-secondary">
                                    वापस जाएँ / Back
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
