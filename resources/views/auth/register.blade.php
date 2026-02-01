<!DOCTYPE html>
<html lang="en" data-layout-mode="light_mode">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Register | Garments Manufacturing ERP</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/favicon.ico" />

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" />

    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #1e293b;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)),
                        url('{{ asset('assets') }}/img/login-bg.jpg') center/cover no-repeat fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            width: 850px; /* Register form typically needs more width for two columns */
            max-width: 95%;
            padding: 40px 50px;
            backdrop-filter: blur(5px);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-text {
            font-weight: 800;
            letter-spacing: -1.5px;
            margin: 0;
            color: var(--secondary-color);
            font-size: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            height: 48px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 10px 15px;
            transition: all 0.3s;
            background: #fff;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .btn-register {
            background: var(--primary-color);
            color: white;
            border: none;
            height: 50px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            width: 250px;
            margin: 20px auto 0;
            display: block;
            transition: all 0.3s;
        }

        .btn-register:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
            color: #fff;
        }

        .pass-group {
            position: relative;
        }

        .toggle-password, .toggle-passwords {
            position: absolute;
            right: 15px;
            top: 15px;
            cursor: pointer;
            color: #64748b;
        }

        .checkmarks {
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .register-card { padding: 30px 20px; }
            .btn-register { width: 100%; }
        }
    </style>
</head>

<body>

    <div class="register-card animated fadeInUp">
        <div class="logo-container">
            <div class="logo-text">
                <svg width="40" height="40" viewBox="0 0 40 40" class="me-2">
                    <rect width="40" height="40" rx="10" fill="#4f46e5" />
                    <path d="M10 20 L20 10 L30 20 L20 30 Z" fill="white" />
                </svg>
                GarM<span style="color: #4f46e5;">ERP</span>
            </div>
            <h3 class="fw-bold text-dark mt-3">Create Account</h3>
            <p class="text-muted">Join our Garments ERP platform today</p>
        </div>

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your full name" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="example@gmail.com" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <div class="pass-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Min. 8 characters" required>
                        <span class="fas toggle-password fa-eye-slash"></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirm Password</label>
                    <div class="pass-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repeat password" required>
                        <span class="fas toggle-passwords fa-eye-slash"></span>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">User Role</label>
                    <select class="form-select" name="role_id">
                        <option selected disabled>Select User Role</option>
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @empty
                            <option disabled>No Role Found!</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Upload Profile Image</label>
                    <input type="file" name="image" class="form-control">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
            </div>

            <div class="mb-3 mt-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label small text-muted" for="terms">
                        I agree to the <a href="#" class="text-primary fw-bold text-decoration-none">Terms & Conditions</a>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-register shadow-sm">Sign Up Now</button>

            <div class="text-center mt-4">
                <p class="text-dark small">Already have an account?
                    <a href="{{ route('login') }}" class="text-primary fw-bold">Sign In Instead</a>
                </p>
            </div>
        </form>
    </div>

    <script src="{{asset('assets')}}/js/jquery-3.7.1.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Password Visibility
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            var input = $("#password");
            input.attr("type") === "password" ? input.attr("type", "text") : input.attr("type", "password");
        });

        $(document).on('click', '.toggle-passwords', function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            var input = $("#password_confirmation");
            input.attr("type") === "password" ? input.attr("type", "text") : input.attr("type", "password");
        });
    </script>
</body>
</html>
