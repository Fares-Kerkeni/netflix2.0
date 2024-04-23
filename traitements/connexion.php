<?php
session_start();
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
require_once "../include/bdd.php";


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
        $_SESSION['user_id'] = $user['userID'];

        $_SESSION['user_email'] = $user['email'];
        $userID = $_SESSION['user_id'];
        // Redirection vers une page d'accueil ou autre page
        $sql = "SELECT subscriptionID FROM users WHERE userID = :userID";

        // Préparation de la requête
        $stmt = $bdd->prepare($sql);
    
        // Liaison des paramètres
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    
        // Exécution de la requête
        $stmt->execute();
    
        // Récupération du résultat
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ( $user['subscriptionID'] === NULL) {
            // Rediriger vers la page d'abonnement si l'utilisateur n'a pas d'abonnement
            echo "L'utilisateur n'a pas d'abonnement";
            header('Location: ../pages/subscribe.php');
            exit;
        } else {
            // Stocker subscriptionID dans la session
            $_SESSION['subscriptionID'] = $user['subscriptionID'];

            // Rediriger vers la page principale si l'utilisateur est connecté et a un abonnement
            echo "L'utilisateur a un abonnement";
            header('Location: ../pages/index.php');
        exit;
    }
        
    } else {
        // Identifiants incorrects
        $_SESSION['login_error_message'] = "Invalid email or password.";
        header('Location: ../pages/sign_in.php');
        exit();
    }
}
?>
