<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RPG Database</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts per stile RPG -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">

    <style>
        /* Impostazioni generali della pagina */
        body {
            background-image: url('path_to_your_background_image.jpg'); /* Puoi usare un'immagine di sfondo fantasy */
            background-size: cover;
            background-position: center;
            font-family: 'Cinzel', serif;
            color: #f4f4f4;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Contenitore del form di login */
        .login-container {
            background-color: rgba(26, 26, 26, 0.9); /* Sfondo semi-trasparente scuro */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.8);
            border: 2px solid gold;
            width: 100%;
            max-width: 400px;
        }

        /* Titolo del form */
        .login-container h1 {
            font-family: 'Uncial Antiqua', serif;
            color: #f7d794;
            text-shadow: 2px 2px 8px #000;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Campi di input */
        .login-container .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid #d4af37;
            color: #f4f4f4;
            font-family: 'Cinzel', serif;
            border-radius: 5px;
        }

        .login-container .form-control:focus {
            border-color: #f7d794;
            box-shadow: none;
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Pulsante di login */
        .login-container .btn-login {
            background-color: #d4af37;
            color: #1a1a1a;
            border: 2px solid #f7d794;
            font-family: 'Cinzel', serif;
            font-weight: bold;
            width: 100%;
            margin-top: 20px;
        }

        .login-container .btn-login:hover {
            background-color: #f7d794;
            border-color: #d4af37;
            color: #1a1a1a;
        }

        /* Link "Forgot password?" */
        .login-container .forgot-password {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #f7d794;
        }

        .login-container .forgot-password:hover {
            color: #d4af37;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Login</h1>

    <form action="process_login.php" method="POST">
        <!-- Campo Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <!-- Campo Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Pulsante di login -->
        <button type="submit" class="btn btn-login">Login</button>

        <!-- Link "Forgot Password?" -->
        <a href="/forgot_password.php" class="forgot-password">Forgot Password?</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
