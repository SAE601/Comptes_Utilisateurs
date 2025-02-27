<?php

include("config.php");

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Vérifier les contraintes du mot de passe
    if (strlen($password) < 8) {
        $message = 'Le mot de passe doit contenir au moins 8 caractères.';
    } elseif (preg_match('/\s/', $password)) {
        $message = 'Le mot de passe ne doit pas contenir d\'espaces.';
    } elseif (!preg_match('/\d/', $password)) {
        $message = 'Le mot de passe doit contenir au moins un chiffre.';
    } else {
        // Hacher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute(['email' => $email, 'username' => $username, 'password' => $hashedPassword]);

        if ($result) {
            $message = 'Inscription réussie!';
            header('Location: index.php');
            exit();
        } else {
            $message = 'Erreur lors de l\'inscription.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css"> <!-- Lien vers le fichier CSS externe -->
    <title>Inscription</title>
</head>
<body>

<div class="login-container">
    <h2>Inscription</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>

    <form action="register.php" method="post">
        <div>
            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <input type="submit" value="S'inscrire">
        </div>
    </form>
</div>

</body>
</html>