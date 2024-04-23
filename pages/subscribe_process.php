<?php
// Assurez-vous de remplacer "path_to_your_database_connection_file.php" par le chemin correct vers votre fichier de connexion à la base de données
require_once "../include/bdd.php";

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: sign_in.php');
    exit;
}

// Vérifier si le formulaire de souscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subscription'])) {
    // Récupérer l'ID de l'utilisateur à partir de la session
    $userID = $_SESSION['user_id'];

    // Récupérer l'ID de l'abonnement sélectionné depuis le formulaire
    $subscriptionID = $_POST['subscription'];

    // Date actuelle
    $currentDate = date('Y-m-d');

    // Mettre à jour l'abonnement de l'utilisateur dans la base de données avec la date actuelle
    $sql = "UPDATE users SET subscriptionID = :subscriptionID, subscription_date = :subscription_date WHERE userID = :userID";

    // Préparation de la requête
    $stmt = $bdd->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':subscriptionID', $subscriptionID, PDO::PARAM_INT);
    $stmt->bindParam(':subscription_date', $currentDate, PDO::PARAM_STR);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Rediriger vers la page principale après la souscription
        header('Location: index.php');
        exit;
    } else {
        // En cas d'erreur, afficher un message d'erreur
        echo "Une erreur s'est produite lors de la souscription à l'abonnement.";
    }
} else {
    // Rediriger vers la page de souscription si aucune donnée n'a été soumise
    header('Location: subscribe.php');
    exit;
}
?>
