<?php
require_once "../include/bdd.php";

if (isset($_POST['submit'])) {
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password_confirm = htmlspecialchars($_POST['password_confirm']);

  // Vérification si les mots de passe correspondent
  if ($password === $password_confirm) {
    // Hacher le mot de passe avec password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Préparation de la requête avec l'objet $bdd
    $requete = $bdd->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password) ");
    $requete->execute(array(
      'username' => $username,
      'email' => $email,
      'password' => $hashed_password // Utilisation du mot de passe haché
    ));

    // Redirection vers la page de connexion
    header('Location: ../pages/sign_in.php');
    exit(); // Terminer le script après la redirection
  } else {
    // Les mots de passe ne correspondent pas, afficher un message d'erreur
    session_start();
    $_SESSION['error_message'] = "Password and password confirmation do not match.";
    header('Location: ../pages/inscription.html');
    exit();
  }
}
?>
