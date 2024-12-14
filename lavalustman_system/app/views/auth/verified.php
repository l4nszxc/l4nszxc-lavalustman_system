<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Success</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #1e3c72);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
            animation: slideUp 0.5s ease-out;
        }
        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .success-icon {
            font-size: 4rem;
            color: #1e3c72;
            margin-bottom: 1rem;
        }
        h1 {
            color: #1e3c72;
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 2rem;
        }
        p {
            margin: 1.5rem 0;
            font-size: 1.1rem;
            color: #495057;
            line-height: 1.6;
        }
        .btn {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            display: inline-flex;  /* Changed to inline-flex */
            align-items: center;   /* Center align icon and text */
            gap: 0.75rem;         /* Add space between icon and text */
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
        }
        @media (max-width: 480px) {
            .container {
                padding: 2rem;
            }
            h1 {
                font-size: 1.75rem;
            }
            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="bi bi-check-circle-fill success-icon"></i>
        <h1>You're Verified!</h1>
        <p>Thank you for verifying your email. You are now fully registered and can access the system.</p>
        <a href="<?=site_url('auth/login');?>" class="btn">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Log in to your account</span>
        </a>
    </div>
</body>
</html>