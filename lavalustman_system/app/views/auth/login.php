<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Gayoso Dental Clinic</title>  
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #1e3c72);
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
        margin-bottom: 2rem;  /* Increased margin to accommodate error message */
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #1e3c72;
            z-index: 2;  /* Reduced z-index */
        }
        .form-control {
            position: relative;
            z-index: 1;  /* Base z-index */
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
        .forgot-password {
            text-align: right;
            margin: 0.5rem 0 1.5rem;
        }
        .forgot-password a {
            color: #1e3c72;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        .forgot-password a:hover {
            color: #2a5298;
        }
        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
        }
        .signup-link a {
            color: #1e3c72;
            font-weight: 500;
            text-decoration: none;
        }
        .signup-link a:hover {
            color: #2a5298;
        }
        .invalid-feedback {
            position: absolute;
            bottom: -1.5rem;  /* Position below input */
            left: 0;
            font-size: 0.85rem;
            margin-top: 0.25rem;
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
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
            border: none;
            background: none;
            color: #1e3c72;
            cursor: pointer;
            padding: 20px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #2a5298;
        }

        .password-toggle:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h2>Login Form</h2>
            <div class="btn-group">
                <button class="btn btn-primary" onclick="window.location.href='<?=site_url('auth/login');?>'">Login</button>
                <button class="btn btn-outline" onclick="window.location.href='<?=site_url('auth/register');?>'">Register</button>

            </div>
            <div class="divider">
            <span>or continue with</span>
        </div>
        </div>
        <div class="card-body">
            <?php flash_alert(); ?>
            <form id="logForm" method="POST" action="<?=site_url('auth/login');?>">
                <?php csrf_field(); ?>
                <div class="input-group">
                    <i class="bi bi-envelope"></i>
                    <input id="email" type="email" class="form-control <?php echo isset($_SESSION['is_invalid']) ? $_SESSION['is_invalid'] : ''; ?>" 
                           name="email" placeholder="Email Address" required autofocus>
                    <div class="invalid-feedback">
                        <?php echo isset($_SESSION['err_message']) ? $_SESSION['err_message'] : ''; ?>
                    </div>
                </div>
                <div class="input-group">
                    <i class="bi bi-lock"></i>
                    <input id="password" type="password" class="form-control" 
                        name="password" placeholder="Password" minlength="8" required>
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <div class="forgot-password">
                    <a href="<?=site_url('auth/password-reset');?>">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>
            </form>
            <div class="signup-link">
                Don't have an account? <a href="<?=site_url('auth/register');?>">Sign up</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(function() {
            var logForm = $("#logForm")
            if(logForm.length) {
                logForm.validate({
                    rules: {
                        email: {
                            required: true,
                        },
                        password: {
                            required: true,
                        }
                    },
                    messages: {
                        email: {
                            required: "Please input your email address.",                            
                        },
                        password: {
                            required: "Please input your password.",  
                        }
                    },
                })
            }
        })
        function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = event.currentTarget.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
    </script>
</body>
</html>