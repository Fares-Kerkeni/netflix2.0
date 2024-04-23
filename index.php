<?php
session_start();

// Vérifier si la variable de session 'user' est définie
if (!isset($_SESSION['user'])) {
  // Vérifier si le cookie 'email' est défini
  if (!isset($_COOKIE['email'])) {
    // Rediriger vers la page de connexion
    header('Location: pages/sign_in.php');
    exit;
  } else {
    // Définir la variable de session avec la valeur du cookie 'email'
    $_SESSION['email'] = $_COOKIE['email'];
    // Rediriger vers la page d'accueil
    header('Location: pages/index.php');
    exit;
  }
} else {
  // Rediriger vers la page d'accueil
  header('Location: pages/index.php');
  exit;
}

// Le reste de votre code ici
?>
