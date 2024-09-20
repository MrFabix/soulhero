<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - RPG Database</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">

    <style>
        /* Impostazioni generali della pagina */
        body {
            background-image: url('path_to_your_background_image.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Cinzel', serif;
            color: #f4f4f4;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Contenitore del form */
        .forgot-password-container {
            background-color: rgba(26, 26, 26, 0.9);
            padding: 40px;
            border-radius: 15px;
            border: 2px solid gold;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.8);
        }

        .forgot-password-container h1 {
            font-family: 'Uncial Antiqua', serif;
            color: #f7d794;
            text-align: center;
            margin-bottom: 30px;
        }

        .forgot-password-container .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid #d4af37;
            color: #f4f4f4;
        }

        .forgot-password-container .form-control:focus {
            border-color: #f7d794;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .forgot-password-container .btn-reset {
            background-color: #d4af37;
            color: #1a1a1a;
            border: 2px solid #f7d794;
            width: 100%;
            margin-top: 20px;
        }

        .forgot-password-container .btn-reset:hover {
            background-color: #f7d794;
            color: #1a1a1a;
        }

    </style>
</head>
<body>

<div class="forgot-password-container">
    <h1>Forgot Password</h1>
    <form action="process_forgot_password.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Enter your email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-reset">Reset Password</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
