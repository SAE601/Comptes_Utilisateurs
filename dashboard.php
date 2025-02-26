<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>

    <div class="dashboard-container">
        <h2>Bienvenue sur votre tableau de bord</h2>
        <p>Vous avez maintenant accès à votre tableau de contrôle (dashboard pour les bilingues qui sont pas claqués au TOEIC genre Valentin)</p>
        <a class="btn btn-primary" href="logout.php" role="button">Se déconnecter</a>
    </div>

    <div class="dashboard-container">
        <h2>Rubrique 1</h2>
    </div>

    <div class="dashboard-container">
        <h2>Informations du compte : </h2>  
        <?php

        try {
            // Connect to the database
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=compte_utilisateur', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->exec("set names utf8");

            // Get the user ID from the session
            $id = $_SESSION['user_id'];

            // Prepare the SQL query with a placeholder
            $stmt = $bdd->prepare("SELECT username, email, lerole FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                echo "Nom de l'utilisateur : " . $user['username'] . "<br/>";
                echo "Adresse Email reliée : " . $user['email'] . "<br/>";
                echo "Rôle :" .  $user['lerole'] . "<br/>";
            } else {
                echo "Aucun utilisateur trouvé avec cet ID.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        ?>
        <br>
        <a class="btn btn-primary" href="changemdp.php" role="button">Changer de mot de passe</a>
    </div>

</body>

</html>