<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$currentPhoto = isset($_COOKIE['profile_photo']) ? $_COOKIE['profile_photo'] : 'nyquit1.jpg';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <style>
        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .modify-button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="dashboard-container" >
        <h2>Paramètres</h2>
        <p>Vous pouvez gérer votre profil et modifier les paramètres de motb de passe de photo de profil etc.</p>
        <a class="btn btn-primary" href="logout.php" role="button">Se déconnecter</a>
        <a class="btn btn-primary" href="dashboard.php" role="button">Retour au Tableau de bord</a>
    </div>

    <div class="dashboard-container" style='text-align: center'>
        <h2>Photo de profil</h2>
        <!-- Afficher la photo de profil actuelle -->
        <img src="<?php echo htmlspecialchars($currentPhoto); ?>" alt="Photo de profil" class="profile-photo">
        <!-- Bouton pour modifier la photo -->
        <form action="modifier_photo.php" method="GET" >
            <button type="submit" class="modify-button">Modifier</button>
        </form>
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
                echo "Rôle : " .  $user['lerole'] . "<br/>";
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

    <?php if ($user && $user['lerole'] === 'admin'): ?>
    <div class="dashboard-container">
        <h2>Section Administrateur</h2>
        <p>Cette section est uniquement accessible aux administrateurs.</p>

        <!-- Liste des utilisateurs -->
        <h3>Liste des utilisateurs</h3>
        <?php
        try {
            // Récupérer tous les utilisateurs depuis la base de données
            $stmt = $bdd->prepare("SELECT id, username, email, lerole FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($users) {
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>ID</th><th>Nom d'utilisateur</th><th>Email</th><th>Rôle</th><th>Action</th></tr></thead>";
                echo "<tbody>";
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['lerole']) . "</td>";
                    // Ajouter un bouton "Promouvoir" uniquement pour les membres
                    if ($user['lerole'] === 'membre') {
                        echo "<td style='display: flex;'>
                                <form method='POST' action='promote_user.php' style='display:inline; margin-right: 20px;'>
                                    <input type='hidden' name='user_id' value='" . htmlspecialchars($user['id']) . "'>
                                    <button type='submit' class='btn btn-success'>Promouvoir</button>
                                </form  >
                              </td>";
                    } else {
                        echo "<td></td>"; // Pas de bouton pour les autres rôles
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Aucun utilisateur trouvé.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Erreur lors de la récupération des utilisateurs : " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
    <?php endif; ?>

</body>

</html>