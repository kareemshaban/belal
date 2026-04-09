<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login To Belal-System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #4e73df, #224abe);
            min-height: 100vh;
        }

        .login-card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .login-image {
            background: url("{{ asset('assets/auth/images/bg.jpg') }}") center / cover no-repeat;
        }

        .form-control {
            height: 48px;
        }

        .btn-login {
            height: 48px;
            font-weight: 600;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-xl-9 col-lg-10 col-md-10">
            <div class="card login-card shadow-lg border-0">
                <div class="row g-0">

                    <!-- Left Image -->
                    <div class="col-lg-6 d-none d-lg-block login-image"></div>

                    <!-- Right Form -->
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h2 class="fw-bold text-primary">Welcome Back</h2>
                                <p class="text-muted">Login to continue</p>
                            </div>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" id="email" required
                                               class="form-control" placeholder="Enter your email">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" name="password" id="password" required
                                               class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>

                                <!-- Remember Me -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button type="submit" class="btn btn-primary w-100 btn-login">
                                    <i class="fa fa-sign-in-alt me-2"></i> Login
                                </button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
</body>
</html>
