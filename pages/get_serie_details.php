<?php
// Assurez-vous d'inclure votre fichier de connexion à la base de données ici
require_once "../include/bdd.php";

// Vérifiez si l'ID de la série a été envoyé depuis JavaScript
if(isset($_GET['id'])) {
    // Récupérez l'ID de la série envoyé depuis JavaScript
    $serieId = $_GET['id'];

    // Préparez la requête SQL pour récupérer les détails de la série
    $requete_details_serie = $bdd->prepare("SELECT * FROM series WHERE id = ?");
    $requete_details_serie->execute([$serieId]);

    // Récupérez les détails de la série depuis la base de données
    $details_serie = $requete_details_serie->fetch(PDO::FETCH_ASSOC);

    // Renvoyez les détails de la série sous forme de réponse JSON
    header('Content-Type: application/json');
    echo json_encode($details_serie);
} else {
    // Si aucun identifiant n'a été envoyé depuis JavaScript, renvoyez une réponse vide
    echo json_encode(array('error' => 'Aucun identifiant de série reçu.'));
}
?>
