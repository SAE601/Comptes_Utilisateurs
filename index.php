<?php
include("config.php");

session_start(); // Démarre la session

// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php'); // Redirige vers le dashboard
    exit(); // Arrête l'exécution du script
}

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Mettre à jour l'heure de dernière connexion
        $update_sql = "UPDATE users SET last_login = NOW() WHERE id = :user_id";
        $update_stmt = $pdo->prepare($update_sql);
        $update_stmt->execute(['user_id' => $user['id']]);

        // Démarrer la session et rediriger
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: profil.php');
        exit();
    } else {
        $message = 'Identifiant ou mot de passe incorrect';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="login.css"> <!-- Lien vers le fichier CSS externe -->
    <title>Accueil</title>
</head>
<body>

<div class="login-container">
    <h2>Connexion</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <div>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username">
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <input type="submit" value="Se connecter">
            <a href="register.php" class="btn">S'inscrire</a>
        </div>
    </form>
</div>

</body>
</html>