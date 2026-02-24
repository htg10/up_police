@extends('layouts.backend.app')

@section('meta')
    <title>Profile | Admin</title>
@endsection

@section('content')
    <!--[ Page Content ] start -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- [ breadcrumb ] start -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Admin Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="row">
                <div class="col-xl-12">
                    <form class="custom-form needs-validation" method="post"
                        action="{{ route('profile.update', Auth::user()->id) }}" enctype="multipart/form-data" novalidate>
                        @method('PATCH')
                        @csrf

                        <div class="card border">
                            <form action="#" class="custom-form needs-validation" novalidate>
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">Admin Profile Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="profile-image">
                                                <img class="rounded-circle"
                                                    src="{{ asset('assets/admin/images/avatar.webp') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">

                                                @auth
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Full Name:</label>
                                                            <input type="text" id="name"
                                                                value="{{ Auth::user()->name }}" class="form-control"
                                                                placeholder="Enter Your Full Name" name="name" required />
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">This field is required. </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Full Name:</label>
                                                            <input type="text" id="name" class="form-control"
                                                                placeholder="Enter Your Full Name" required />
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">This field is required. </div>
                                                        </div>
                                                    </div>
                                                @endauth


                                                @auth

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Email Id:</label>
                                                            <input type="email" id="name" name="email"
                                                                value="{{ Auth::user()->email }}" class="form-control"
                                                                placeholder="Enter Your Email" required />
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">This field is required. </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Email Id:</label>
                                                            <input type="email" id="name" class="form-control"
                                                                placeholder="Enter Your Email" required />
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">This field is required. </div>
                                                        </div>
                                                    </div>
                                                @endauth


                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">Mobile Number:</label>
                                                        <input type="text" id="name" class="form-control"
                                                            value="{{ Auth::user()->mobile }}" name="mobile"
                                                            placeholder="Enter Your Mobile Number" required />
                                                        <div class="valid-feedback">Looks good!</div>
                                                        <div class="invalid-feedback">This field is required. </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">DOB:</label>
                                                        <input type="date" id="name" name="dob"
                                                            class="form-control @error('dob') is-invalid @enderror"
                                                            value="{{ Auth::user()->dob }}" placeholder="Enter Your DOB" />
                                                        <div class="valid-feedback">Looks good!</div>
                                                        <div class="invalid-feedback">This field is required. </div>
                                                        @error('dob')
                                                            <div class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">Gender:</label>
                                                        <select class="form-select form-control form-control-sm"
                                                            name="gender">
                                                            <option value="male"
                                                                {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male
                                                            </option>
                                                            <option value="female"
                                                                {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>
                                                                Female</option>
                                                        </select>
                                                        <div class="valid-feedback">Looks good!</div>
                                                        <div class="invalid-feedback">This field is required. </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save
                                        Changes</button>
                                </div>

                        </div>
                        <!-- end card -->

                        <div class="card border">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">New Password:</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter password"
                                                    aria-label="Password" aria-describedby="password-addon"
                                                    name="password">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field is required. </div>
                                            </div>
                                            @error('password')
                                                <div class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Confirm Password:</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter password"
                                                    aria-label="Password" aria-describedby="password-addon"
                                                    name="password_confirmation">
                                                <button class="btn btn-light " type="button" id="password-addon1"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field is required. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Save
                                    Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
