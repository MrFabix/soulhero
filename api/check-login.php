<?php
session_start();
include '../include/config.php';

// Salva la pagina di provenienza, se non è già stata salvata
if (!isset($_SESSION['last_page']) && isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['last_page'] = $_SERVER['HTTP_REFERER'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        $stmt = $link->prepare("SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // ⚠️ Consigliato: usare password_hash / password_verify
            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['loggedin'] = true;

                $redirect = $_SESSION['last_page'] ?? 'character.php';
                unset($_SESSION['last_page']);
                header("Location: $redirect");
                exit;
            }
        }

        $error = "Invalid username or password.";
    } else {
        $error = "Please fill in both fields.";
    }
}

header("Location: /login.php?error=" . urlencode($error));
exit;
