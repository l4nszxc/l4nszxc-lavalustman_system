<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="<?=base_url();?>public/css/main.css" rel="stylesheet">
    <link href="<?=base_url();?>public/css/style.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
        body {
            background: linear-gradient(to right, #001f3f, #003366);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }
        .card-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.25rem;
        }
        .btn-primary {
            background-color: #3282b8;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 0.25rem;
            width: 100%;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0f4c75;
        }
        .btn-outline {
            background-color: white;
            color: #3282b8;
            border: 1px solid #3282b8;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }
        .btn-group .btn {
            flex: 1;
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
        </div>
        <div class="card-body">
            <?php flash_alert(); ?>
            <form id="regForm" method="POST" action="<?=site_url('auth/register');?>">
                <?php csrf_field(); ?>
                <div class="form-group">
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="" required>
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                            minlength: 8
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
                            required: "Please input your password",
                            minlength: jQuery.validator.format("Password must be at least {0} characters.")
                        },
                        username: {
                            required: "Please input your username.",                            
                        }
                    },
                })
            }
        })
    </script>
</body>
</html>