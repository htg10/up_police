@extends('layouts.backend.app')

@section('meta')
    <title>उपयोगकर्ता संपादित करें / Edit User</title>
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="text-primary">
                    <i class="fas fa-user-edit"></i>
                    उपयोगकर्ता संपादित करें / Edit User
                </h4>
                <a href="{{ route('admin.user.index') }}"
                   class="btn btn-primary waves-effect waves-light">
                    <i class="fas fa-arrow-left me-1"></i>
                    सूची पर वापस जाएं / Back to List
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="card shadow-sm">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>त्रुटि / Error:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.user.update', $user->id) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      autocomplete="off">
                    @method('PATCH')
                    @csrf

                    <div class="row">

                        <!-- User Type -->
                        <div class="form-group col-lg-6 mb-3">
                            <label>
                                उपयोगकर्ता प्रकार / User Type
                            </label>
                            <select name="role_id" class="form-control" required>
                                <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>
                                    प्रशासक / Admin
                                </option>
                                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>
                                    उपयोगकर्ता / User
                                </option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="form-group col-lg-6 mb-3">
                            <label for="name">
                                नाम / Name
                            </label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   class="form-control"
                                   value="{{ $user->name }}">
                        </div>

                        <!-- Email -->
                        <div class="form-group col-lg-6 mb-3">
                            <label for="email">
                                ईमेल / Email
                            </label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control"
                                   value="{{ $user->email }}">
                        </div>

                        <!-- Mobile -->
                        <div class="form-group col-lg-6 mb-3">
                            <label for="mobile">
                                मोबाइल नंबर / Mobile No.
                            </label>
                            <input type="tel"
                                   name="mobile"
                                   id="mobile"
                                   class="form-control"
                                   maxlength="10"
                                   pattern="\d{10}"
                                   inputmode="numeric"
                                   placeholder="10 अंकों का मोबाइल नंबर दर्ज करें / Enter 10-digit mobile number"
                                   value="{{ $user->mobile }}">
                        </div>

                        <!-- Password -->
                        <div class="form-group col-lg-6 mb-3">
                            <label class="form-label">
                                नया पासवर्ड (यदि बदलना हो) / New Password (if changing)
                            </label>
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       id="password"
                                       placeholder="पासवर्ड दर्ज करें / Enter password"
                                       autocomplete="new-password">
                                <button class="btn btn-light" type="button"
                                    onclick="togglePasswordVisibility('password', 'password-addon1')">
                                    <i class="mdi mdi-eye-outline" id="password-addon1"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-2">
                        अपडेट करें / Update
                    </button>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection


@section('script')
<script>
    function togglePasswordVisibility(passwordFieldId, iconId) {
        const passwordField = document.getElementById(passwordFieldId);
        const icon = document.getElementById(iconId);
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.replace("mdi-eye-outline", "mdi-eye-off-outline");
        } else {
            passwordField.type = "password";
            icon.classList.replace("mdi-eye-off-outline", "mdi-eye-outline");
        }
    }

    document.getElementById('mobile').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endsection
