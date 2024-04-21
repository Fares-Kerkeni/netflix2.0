<?php
session_start();

// Vérifier si la variable de session est définie
if (!isset($_SESSION['user'])) {
  // Rediriger vers la page de connexion
  header('Location: pages/sign_in.php');
  exit;
} else {
  header('Location: pages/index.php');
}

// Le reste de votre code ici
?>