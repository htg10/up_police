@extends('layouts.backend.app')

@section('meta')
    <title>नया उपयोगकर्ता / New User</title>
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="text-primary">
                    <i class="fas fa-user-plus"></i> नया प्रशासक / उपयोगकर्ता जोड़ें
                    <br class="d-none d-sm-block"> Add New Admin / User
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

                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <!-- User Type -->
                        <div class="form-group col-lg-6 mb-3">
                            <label for="role_id">
                                उपयोगकर्ता प्रकार / User Type
                            </label>
                            <select name="role_id" id="role_id"
                                    class="form-control" required>
                                <option value="">-- प्रकार चुनें / Select Type --</option>
                                <option value="1">प्रशासक / Admin</option>
                                <option value="2">उपयोगकर्ता / User</option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="form-group col-lg-6 mb-3">
                            <label for="name">
                                नाम / Name
                            </label>
                            <input type="text" name="name" id="name"
                                   class="form-control"
                                   placeholder="नाम दर्ज करें / Enter Name" />
                        </div>

                        <!-- Email -->
                        <div class="form-group col-lg-6 mb-3">
                            <label for="email">
                                ईमेल / Email
                            </label>
                            <input type="email" name="email" id="email"
                                   class="form-control"
                                   placeholder="ईमेल दर्ज करें / Enter Email">
                        </div>

                        <!-- Mobile -->
                        <div class="form-group col-lg-6 mb-3">
                            <label for="mobile">
                                मोबाइल नंबर / Mobile No.
                            </label>
                            <input type="tel" name="mobile" id="mobile"
                                   class="form-control" maxlength="10"
                                   pattern="\d{10}" inputmode="numeric"
                                   placeholder="10 अंकों का मोबाइल नंबर दर्ज करें / Enter 10-digit mobile number">
                        </div>

                        <!-- Password -->
                        <div class="form-group col-lg-6 mb-3">
                            <label class="form-label">
                                पासवर्ड / Password
                            </label>
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" name="password"
                                       class="form-control" id="password"
                                       placeholder="पासवर्ड दर्ज करें / Enter password">
                                <button class="btn btn-light" type="button"
                                    onclick="togglePasswordVisibility('password', 'password-addon1')">
                                    <i class="mdi mdi-eye-outline" id="password-addon1"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group col-lg-6 mb-3">
                            <label class="form-label">
                                पासवर्ड की पुष्टि करें / Confirm Password
                            </label>
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       id="confirm-password"
                                       placeholder="पासवर्ड की पुष्टि करें / Confirm password">
                                <button class="btn btn-light" type="button"
                                    onclick="togglePasswordVisibility('confirm-password', 'password-addon2')">
                                    <i class="mdi mdi-eye-outline" id="password-addon2"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-2">
                        सबमिट करें / Submit
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
