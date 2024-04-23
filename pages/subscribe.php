<!-- subscribe.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souscrire à un abonnement</title>
</head>
<body>
    <h1>Souscrire à un abonnement</h1>
    <form action="subscribe_process.php" method="post">
        <label for="subscription">Choisissez votre abonnement :</label>
        <select name="subscription" id="subscription">
            <?php
            // Inclure le fichier de connexion à la base de données
            require_once "../include/bdd.php";

            // Récupérer les options d'abonnement depuis la base de données
            $sql = "SELECT * FROM subscriptions";
            $stmt = $bdd->query($sql);
            $subscriptions = $stmt->fetchAll();

            // Afficher les options d'abonnement dans le formulaire
            foreach ($subscriptions as $subscription) {
                echo "<option value=\"{$subscription['subscriptionID']}\">{$subscription['name']} ({$subscription['duration']} jours)</option>";
            }
            ?>
        </select>
        <button type="submit">Souscrire</button>
    </form>
</body>
</html>
