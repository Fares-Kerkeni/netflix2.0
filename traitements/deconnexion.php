<?php
session_start();

// Détruire toutes les variables de session
$_SESSION = array();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou une autre page de votre choix
header("Location: ../pages/sign_in.php");
exit;
?>
