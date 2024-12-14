<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - Gayoso Dental Clinic</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #1e3c72 );
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            background: rgba(255, 255, 255, 0.95);
            margin-top: 2rem;
        }
        .card-header {
            background: none;
            border: none;
            text-align: center;
            padding: 2rem 1rem;
            color: #1e3c72;
            font-size: 1.8rem;
            font-weight: 600;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control {
        border-radius: 10px;
        padding: 0.75rem 1rem 0.75rem 45px !important; /* Increased left padding */
        border: 2px solid #e9ecef;
        font-size: 1rem;
        transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.15);
        }
        .btn-primary {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 500;
            transition: all 0.3s;   
            width: 100%;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
        }
        .form-label {
            color: #1e3c72;
            font-weight: 500;
        }
        .invalid-feedback, .valid-feedback {
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        .input-group {
        position: relative;
        margin-bottom: 1rem;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #1e3c72;
            z-index: 4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-key-fill me-2"></i>Reset Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?=site_url('auth/password-reset');?>">
                            <?php csrf_field(); ?>
                            <div class="mb-4">
                                    <label for="email" class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <i class="bi bi-envelope"></i>
                                        <input id="email" type="email" class="form-control ps-4 <?php echo isset($_SESSION['alert']) ? $_SESSION['alert'] : ''; ?>" 
                                            name="email" placeholder="Enter your email" required>
                                    </div>
                                    <?php if(isset($_SESSION['error_message'])): ?>
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong><?php echo $_SESSION['error_message']; ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(isset($_SESSION['success_message'])): ?>
                                        <span class="valid-feedback d-block" role="alert">
                                            <strong><?php echo $_SESSION['success_message']; ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-2"></i>Send Password Reset Link
                            </button>
                            <div class="text-center mt-3">
                                <a href="<?=site_url('auth/login');?>" class="text-decoration-none" 
                                   style="color: #1e3c72; font-weight: 500;">
                                    <i class="bi bi-arrow-left me-1"></i>Back to Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>