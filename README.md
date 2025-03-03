# Gestion des Utilisateurs - PHP & AJAX

## Description
Ce projet est une application web de gestion des utilisateurs avec des fonctionnalités de connexion, d'inscription, de promotion d'utilisateurs et de gestion de profil. Il utilise PHP pour la gestion des utilisateurs côté serveur et AJAX pour des mises à jour dynamiques sans rechargement de page.

## Fonctionnalités
- **Inscription & Connexion** : Les utilisateurs peuvent créer un compte et se connecter.
- **Gestion du Profil** : Modification de la photo de profil et des informations personnelles.
- **Promotion des Utilisateurs** : Les administrateurs peuvent promouvoir des utilisateurs au rôle d'admin via AJAX.
- **Tableau de Bord** : Interface utilisateur pour gérer les utilisateurs et voir les statistiques.

## Technologies utilisées
- **Frontend** : HTML, CSS (Bootstrap, style1.css, login.css), JavaScript (jQuery, script.js)
- **Backend** : PHP (index.php, register.php, login.php, profil.php, promote_user.php, logout.php, modifier_photo.php, dashboard.php)
- **Base de Données** : MySQL (non incluse dans ce dépôt)

## Installation
1. Clonez le dépôt :
   ```sh
   git clone https://github.com/votre-utilisateur/votre-projet.git
   ```
2. Déplacez-vous dans le dossier :
   ```sh
   cd votre-projet
   ```
3. Configurez votre serveur local (XAMPP, WAMP, etc.).
4. Importez la base de données (`database.sql` si disponible).
5. Configurez la connexion à la base de données dans `config.php` (si applicable).
6. Lancez le serveur et accédez à `http://localhost/votre-projet/`.

## Utilisation
- **Page d'accueil** : `index.php`
- **Inscription** : `register.php`
- **Connexion** : `login.php`
- **Tableau de bord** : `dashboard.php`
- **Gestion du profil** : `profil.php`
- **Déconnexion** : `logout.php`

## Développement
- **AJAX** est utilisé dans `script.js` pour promouvoir un utilisateur sans recharger la page.
- **CSS** pour le design des formulaires et de l'interface utilisateur.
- **PHP** gère l'authentification, la promotion et les actions utilisateur.

## Auteur
- **Votre Nom**
- Contact : `votre.email@example.com`
- [GitHub](https://github.com/votre-utilisateur)

## Licence
Ce projet est sous licence MIT. Voir `LICENSE` pour plus de détails.

