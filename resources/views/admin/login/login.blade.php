<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | UP Police (ATS)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Help Together Group" />

    @include('layouts.backend.partials.style')
    @yield('style')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">

    <!-- Custom login page styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(135deg, #0F1E4A, #1F3C88);
            /* Updated background gradient */
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            background: rgba(31, 60, 136, 0.75);
            border-radius: 16px;
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(201, 162, 77, 0.35);
            padding: 40px 30px;
            color: #FFFFFF;
            box-shadow: 0 0 35px rgba(201, 162, 77, 0.35);
        }

        .circular-logo {
            background: white;
            padding: 4px;
            height: 120px;
            width: 120px;
            border-radius: 50%;
            /* object-fit: cover; */
            border: 3px solid #C9A24D;
            box-shadow: 0 0 15px rgba(201, 162, 77, 0.6);
        }

        .login-wrapper h2 {
            text-align: center;
            font-size: 26px;
            font-weight: 600;
            color: #C9A24D;
        }

        .login-wrapper h4 {
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: #A3C6FF;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: #FFFFFF;
        }

        .form-control:focus {
            border-color: #A3C6FF;
            box-shadow: 0 0 0 0.15rem rgba(163, 198, 255, 0.4);
        }

        .btn-primary {
            background-color: #D71920;
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #B9151A;
            /* optional hover effect */
            color: #FFFFFF;
        }

        .footer-text a {
            color: #C9A24D;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <!-- Logo -->
        <div class="logo text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="circular-logo">
        </div>

        <!-- Title -->
        <h2 class="mt-3">UP Police (ATS)</h2>
        <h4 class="mb-3">[ Lucknow HQRS ]</h4>

        <!-- Alerts -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group auth-pass-inputgroup">
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Enter password" required>
                    <button class="btn btn-primary" type="button"
                        onclick="togglePasswordVisibility('password', 'password-addon1')">
                        <i class="mdi mdi-eye-outline" id="password-addon1"></i>
                    </button>
                </div>
            </div>

            <div class="form-check mb-3">
                {{-- <input class="form-check-input" type="checkbox" id="remember-check"> --}}
                <input type="checkbox" name="remember" class="form-check-input" id="remember-check">
                <label class="form-check-label" for="remember-check">Remember me</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Log In</button>
            </div>
        </form>
        <br>
        <!-- Footer -->
        <div class="footer-text">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> UP Police (ATS). Designed by
            <a href="https://helptogethergroup.com/" target="_blank">Help Together Group</a>
        </div>
    </div>

    @include('layouts.backend.partials.script')
    @yield('script')

    <!-- Password Toggle -->
    {{-- <script>
        document.getElementById('password-addon').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove('mdi-eye-outline');
                icon.classList.add('mdi-eye-off-outline');
            } else {
                passwordField.type = "password";
                icon.classList.remove('mdi-eye-off-outline');
                icon.classList.add('mdi-eye-outline');
            }
        });
    </script> --}}
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
    </script>

</body>

</html>
