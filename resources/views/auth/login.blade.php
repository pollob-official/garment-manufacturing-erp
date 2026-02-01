<!DOCTYPE html>
<html lang="en" data-layout-mode="light_mode">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>LOGIN | Garments Manufacturing ERP</title>

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
            /* আপনার আগের সেই ব্যাকগ্রাউন্ড ইমেজ এবং ডার্ক ওভারলে */
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)),
                url('{{ asset('assets') }}/img/login-bg.jpg') center/cover no-repeat fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            /* হালকা ট্রান্সপারেন্সি যাতে ব্যাকগ্রাউন্ডের সাথে ব্লেন্ড হয় */
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            width: 1000px;
            max-width: 95%;
            display: flex;
            min-height: 580px;
            overflow: hidden;
            backdrop-filter: blur(5px);
            /* মডার্ন ফ্রস্টেড গ্লাস ইফেক্ট */
        }

        /* Left Side - Quick Access Table */
        .login-sidebar {
            background: #f1f5f9;
            width: 380px;
            padding: 40px 30px;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Right Side - Login Form */
        .login-main {
            flex: 1;
            padding: 40px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 25px;
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

        .form-control {
            height: 50px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 10px 15px;
            transition: all 0.3s;
            background: #fff;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            background: #fff;
        }

        .btn-login {
            background: var(--primary-color);
            color: white;
            border: none;
            height: 50px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            width: 220px;
            margin: 0 auto;
            display: block;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
            color: #fff;
        }

        .demo-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .demo-table tr {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
        }

        .demo-table td {
            padding: 12px;
            border: none;
            font-size: 13px;
            color: #334155;
        }

        .role-badge {
            background: #e0e7ff;
            color: #4338ca;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 600;
            display: block;
            margin-bottom: 3px;
        }

        .btn-fill {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-fill:hover {
            background: var(--primary-color);
        }

        @media (max-width: 850px) {
            .login-card {
                flex-direction: column-reverse;
                width: 450px;
                height: auto;
                margin: 20px;
            }

            .login-sidebar {
                width: 100%;
                border-right: none;
                border-top: 1px solid #eee;
            }

            .login-main {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="login-card animated zoomIn">

        <div class="login-sidebar">
            <div class="text-center mb-4">
                <h5 class="fw-bold text-dark"><i class="fas fa-key text-warning me-2"></i>Quick Access</h5>
                <p class="text-muted small">Select a role to auto-fill credentials</p>
            </div>

            <table class="demo-table">
                <tbody>
                    <tr>
                        <td>
                            <span class="role-badge">Admin</span>
                            <span class="text-muted small">admin@gmail.com</span>
                        </td>
                        <td class="text-end">
                            <button class="btn-fill" onclick="fillDetails('admin@gmail.com')">Fill</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="role-badge">Super Admin</span>
                            <span class="text-muted small">superadmin@gmail.com</span>
                        </td>
                        <td class="text-end">
                            <button class="btn-fill" onclick="fillDetails('superadmin@gmail.com')">Fill</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="role-badge">Supervisor</span>
                            <span class="text-muted small">supervisor@gmail.com</span>
                        </td>
                        <td class="text-end">
                            <button class="btn-fill" onclick="fillDetails('supervisor@gmail.com')">Fill</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="role-badge">Production</span>
                            <span class="text-muted small">production@gmail.com</span>
                        </td>
                        <td class="text-end">
                            <button class="btn-fill" onclick="fillDetails('production@gmail.com')">Fill</button>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="text-center mt-4">
                <p class="text-muted small">Default Password: <strong>12345678</strong></p>
            </div>
        </div>

        <div class="login-main">
            <div class="logo-container">
                <div class="logo-text">
                    <svg width="45" height="45" viewBox="0 0 40 40" class="me-2">
                        <rect width="40" height="40" rx="10" fill="#4f46e5" />
                        <path d="M10 20 L20 10 L30 20 L20 30 Z" fill="white" />
                    </svg>
                    GarM<span style="color: #4f46e5;">ERP</span>
                </div>
                <p class="text-muted mt-2">Garments Manufacturing ERP Software</p>
            </div>

            <div class="text-center mb-4">
                <h3 class="fw-bold text-dark">Sign In</h3>
                <p class="text-muted">Enter your account details below</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="Enter your email address" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label class="form-label text-dark fw-bold">Password</label>
                    <div class="pass-group position-relative">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password" required>
                        <span class="fas toggle-password fa-eye-slash text-muted"
                            style="position: absolute; right: 15px; top: 18px; cursor: pointer;"></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label text-dark small" for="remember">Keep me logged in</label>
                    </div>
                    <a href="#" class="small text-primary fw-bold text-decoration-none">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-login mb-4 shadow-sm">Sign In</button>

                <div class="text-center mt-2">
                    <p class="text-dark small">New on our platform?
                        <a href="{{ route('register') }}" class="text-primary fw-bold">Create an account</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets') }}/js/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <script>
        function fillDetails(email) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = '12345678';

            const btn = event.target;
            btn.innerText = 'Applied';
            btn.style.background = '#10b981';
            setTimeout(() => {
                btn.innerText = 'Fill';
                btn.style.background = '#1e293b';
            }, 800);
        }

        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            var input = $("#password");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>

</html>
