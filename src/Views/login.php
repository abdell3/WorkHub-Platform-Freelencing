<?php

use App\Controllers\AuthController;
session_start();


if (isset($_SESSION['user_id'])) {
    header("Location: ../dashboard.php");
    exit();
}

$error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auth = new AuthController();
    $result = $auth->login(trim($_POST["email"]), trim($_POST["password"]));

    if ($result === true) {
        switch ($_SESSION['role_id']) {
            case 1:
                header("Location: /dashboard");
                break;
            case 2:
                header("Location: /dashboard");
                break;
            case 3:
                header("Location: /dashboard");
                break;
            default:
                header("Location: /dashboard");
        }
        exit();
    } else {
        $error = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Upwork Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-xl">
        <h2 class="text-2xl font-bold text-center text-gray-700">Connexion</h2>
        <?php if (isset($error)) : ?>
            <p class="text-red-500 text-center"> <?= htmlspecialchars($error) ?> </p>
        <?php endif; ?>
        <form action="login.php" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required class="w-full p-2 mt-1 border rounded-lg focus:ring focus:ring-indigo-300">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" required class="w-full p-2 mt-1 border rounded-lg focus:ring focus:ring-indigo-300">
            </div>
            <button type="submit" class="w-full p-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">Se connecter</button>
        </form>
        <p class="text-sm text-center text-gray-600">Pas encore de compte ? <a href="register.php" class="text-indigo-500">S'inscrire</a></p>
    </div>
</body>
</html>
