@extends('layouts.backend.app')

@section('style')
    <style>
        .star {
            font-size: 15px;
        }
    </style>
@endsection
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
            <form action="{{ route('user.daks.store') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation">
                @csrf

                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    डाक प्रविष्टि जोड़ें / Add Dak Entry
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
                                                <option value="registry">Registry / रजिस्ट्री</option>
                                                <option value="email">Email / ईमेल</option>
                                                <option value="messenger">Messenger / मैसेंजर</option>
                                            </select>
                                            <div class="invalid-feedback">This field is required.</div>
                                        </div>
                                    </div>

                                    {{-- Letter From --}}
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                पत्र कहाँ से प्राप्त हुआ / Letter Received From<sup
                                                    class="text-danger star">*</sup>
                                            </label>
                                            <input type="text" name="letter_from" class="form-control"
                                                placeholder="Enter Letter Received From" required>
                                            <div class="invalid-feedback">This field is required.</div>
                                        </div>
                                    </div>

                                    {{-- Date --}}
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                प्राप्त / भेजा गया दिनांक / Date<sup class="text-danger star">*</sup>
                                            </label>
                                            <input type="date" name="received_date" class="form-control"
                                                onclick="this.showPicker()">
                                        </div>
                                    </div>

                                    {{-- Letter Number --}}
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                पत्रांक संख्या / Letter Number<sup class="text-danger star">*</sup>
                                            </label>
                                            <input type="text" name="letter_number" class="form-control"
                                                placeholder="Enter Letter Number">
                                        </div>
                                    </div>

                                    {{-- Reference Number --}}
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                संदर्भ संख्या / Reference Number<sup class="text-danger star">*</sup>
                                            </label>
                                            <input type="text" name="reference_number" class="form-control"
                                                placeholder="Enter Reference Number">
                                        </div>
                                    </div>

                                    {{-- Sent To --}}
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                कहाँ भेजा गया / Sent To<sup class="text-danger star">*</sup>
                                            </label>
                                            <input type="text" name="sent_to" class="form-control"
                                                placeholder="Enter Sent To">
                                        </div>
                                    </div>

                                    {{-- Subject --}}
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                पत्र का संदर्भ / Subject<sup class="text-danger star">*</sup>
                                            </label>
                                            <textarea name="subject" class="form-control" rows="3" placeholder="Enter Subject"></textarea>
                                        </div>
                                    </div>

                                    {{-- Sender Details --}}
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-bold">
                                                प्रेषक विवरण / Sender Details<sup class="text-danger star">*</sup>
                                            </label>
                                            <textarea name="sender_details" class="form-control" rows="3" placeholder="Enter Sender Details"></textarea>
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
                                            <small class="text-muted">Allowed formats: PDF, DOC, DOCX, JPG, PNG</small>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer text-start">
                                <button type="submit" class="btn btn-success">
                                    सहेजें / Save
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
