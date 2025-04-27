<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hero Soul</title>
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-box {
            background: #fff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-box h3 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h3 class="text-primary">Login</h3>
    <form method="POST" action="api/check-login.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
