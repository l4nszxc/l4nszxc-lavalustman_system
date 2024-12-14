<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Gayoso Dental Clinic</title>  
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
            transition: all 0.3s ease;
        }
        .card-header {
            background: none;
            border: none;
            text-align: center;
            padding: 0 0 0rem 0;
        }
        .card-header h2 {
            color: #1e3c72;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .btn-outline {
            color: #1e3c72;
            border: 2px solid #1e3c72;
            background: transparent;
            padding: 0.5rem 2rem;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-outline:hover {
            background: rgba(30, 60, 114, 0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            border: none;
            padding: 0.5rem 2rem;
            border-radius: 8px;
            color: white;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
        }
        .input-group {
            position: relative;
            margin-bottom: 2rem;
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #1e3c72;
            z-index: 2;
        }
        .form-control {
            position: relative;
            z-index: 1;
            border-radius: 10px;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 2px solid #e9ecef;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.15);
        }
        .invalid-feedback {
            position: absolute;
            bottom: -1.5rem;
            left: 0;
            font-size: 0.85rem;
            color: #dc3545;
        }
        .form-control.error {
            border-color: #dc3545;
        }
        label.error {
            position: absolute;
            bottom: -1.5rem;
            left: 0;
            color: #dc3545;
            font-size: 0.85rem;
            margin: 0;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 2px solid rgba(30, 60, 114, 0.1);
        }
        .divider span {
            padding: 0 1rem;
            color: #1e3c72;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h2>Register Form</h2>
            <div class="btn-group">
                <button class="btn btn-outline" onclick="window.location.href='<?=site_url('auth/login');?>'">Login</button>
                <button class="btn btn-primary">Signup</button>
            </div>
            <div class="divider">
                <span>or continue with</span>
            </div>
        </div>
        <div class="card-body">
            <?php flash_alert(); ?>
            <form id="regForm" method="POST" action="<?=site_url('auth/register');?>">
                <?php csrf_field(); ?>
                <div class="input-group">
                    <i class="bi bi-person"></i>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <i class="bi bi-envelope"></i>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <i class="bi bi-lock"></i>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <i class="bi bi-lock-fill"></i>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-person-plus me-2"></i>Create Account
                </button>
            </form>
            <div class="text-center mt-3">
                <span class="text-muted">Already have an account?</span>
                <a href="<?=site_url('auth/login');?>" class="ms-1" style="color: #1e3c72; text-decoration: none; font-weight: 500;">Sign in</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(function() {
            var regForm = $("#regForm")
            if(regForm.length) {
                regForm.validate({
                    rules: {
                        email: {
                            required: true,
                        },
                        password: {
                            required: true,
                            minlength: 8
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 8,
                            equalTo: "#password"
                        },
                        username: {
                            required: true,
                            minlength: 5,
                            maxlength: 20
                        }
                    },
                    messages: {
                        email: {
                            required: "Please input your email address.",                            
                        },
                        password: {
                            required: "Please input your password",
                            minlength: jQuery.validator.format("Password must be at least {0} characters.")
                        },
                        password_confirmation: {
                            required: "Please confirm your password",
                            minlength: jQuery.validator.format("Password must be at least {0} characters."),
                            equalTo: "Passwords do not match"
                        },
                        username: {
                            required: "Please input your username.",
                            minlength: "Username must be at least 5 characters.",
                            maxlength: "Username cannot exceed 20 characters."
                        }
                    },
                })
            }
        })
    </script>
</body>
</html>