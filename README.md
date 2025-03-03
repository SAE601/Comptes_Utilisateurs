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
1. Configurez le serveur local Wamp pour faire des essais.
2. Importez la base de données `users.sql`.
3. Cloner l'intégrité du répertoire au sein du dossier `wamp64\www`
4. Lancez le serveur et accédez à `http://localhost/Comptes_Utilisateurs`.

## Utilisation
- **Page d'accueil** : `index.php`. Cette page permets de se login ou d'accéder à la page de création d'utilisateur.
- **Inscription** : `register.php`. Cette page permets de créer un nouvel utilisateur.
- **Connexion** : `login.php`. Fichier qui effectue la connexion au serveur.
- **Tableau de bord** : `dashboard.php`. Cette page permets d'accéder au tableau de contrôle du projet.
- **Gestion du profil** : `profil.php`. Cette page permets de voir les informations du compte connecter.
- **Déconnexion** : `logout.php`. Fichier qui effectue la déconnexion avec le serveur.

## Développement
- **AJAX** est utilisé dans `script.js` pour promouvoir un utilisateur sans recharger la page.
- **CSS** pour le design des formulaires et de l'interface utilisateur.
- **PHP** gère l'authentification, la promotion et les actions utilisateur.

## Auteurs
- **Othmane El Bertal**
- **Lilian Carrière**

## Licence
Y a pas de liscence mdr on est des clochards

