<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
require_once "../include/bdd.php";
session_start();

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Récupérer le mot de passe haché de l'utilisateur depuis la base de données
    $requete = $bdd->prepare("SELECT userID, email, password FROM users WHERE email = :email");
    $requete->execute(array('email' => $email));
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        // Vous pouvez stocker des informations sur l'utilisateur dans la session si nécessaire
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        // Redirection vers une page d'accueil ou autre page
        header('Location: ../pages/index.php');
        exit();
    } else {
        // Identifiants incorrects
        $_SESSION['login_error_message'] = "Invalid email or password.";
        header('Location: ../pages/sign_in.php');
        exit();
    }
}
?>
