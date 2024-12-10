<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            margin: 20px 0;
            font-size: 18px;
        }
        .btn {
            background-color: #ff4b4b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #e84141;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>You're Verified!</h1>
        <p>Thank you for verifying your email. You are now fully registered and can access the system.</p>
        <a href="http://localhost:8080/auth/login" class="btn">Log In into your account</a>

    </div>
</body>
</html>
