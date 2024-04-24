<?php
session_start();
require_once "../include/bdd.php";

// Vérifier si l'utilisateur est connecté et s'il a le rôle d'administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Rediriger vers une page d'erreur ou de connexion si l'utilisateur n'est pas autorisé
    header('Location: ../pages/error.php');
    exit;
}

// Traitement du formulaire d'ajout de film ou de série
if (isset($_POST['add_content'])) {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $categoryID = $_POST['categoryID'];
    $cover_image = $_POST['cover_image'];
    $video_link = $_POST['video_link'];

    // Insérer les données dans la base de données
    if ($type === 'movie') {
        $table = 'movies';
    } elseif ($type === 'series') {
        $table = 'series';
    }

    $sql = "INSERT INTO $table (title, description, categoryID, cover_image, video_link) VALUES (:title, :description, :categoryID, :cover_image, :video_link)";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array(':title' => $title, ':description' => $description, ':categoryID' => $categoryID, ':cover_image' => $cover_image, ':video_link' => $video_link));
}

// Traitement du formulaire de suppression de contenu
if (isset($_POST['delete_content'])) {
    $contentID = $_POST['contentID'];
    $type = $_POST['type'];

    // Supprimer le contenu de la base de données
    if ($type === 'movie') {
        $table = 'movies';
    } elseif ($type === 'series') {
        $table = 'series';
    }

    $sql = "DELETE FROM $table WHERE ";
    $sql .= ($type === 'movie') ? "movieID = :contentID" : "seriesID = :contentID";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array(':contentID' => $contentID));
}

// Récupérer la liste des films et des séries depuis la base de données
$movies = $bdd->query("SELECT * FROM movies")->fetchAll(PDO::FETCH_ASSOC);
$series = $bdd->query("SELECT * FROM series")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Add your stylesheets and scripts here -->
</head>
<body>
    <h1>Admin Panel</h1>

    <h2>Ajouter un film ou une série</h2>
    <form action="" method="post">
        <label for="type">Type de contenu:</label>
        <select id="type" name="type" required>
            <option value="movie">Film</option>
            <option value="series">Série</option>
        </select><br>
        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="categoryID">Catégorie:</label><br>
        <select id="categoryID" name="categoryID" required>
            <?php
            $categories = $bdd->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $category) {
                echo "<option value='{$category['categoryID']}'>{$category['name']}</option>";
            }
            ?>
        </select><br>
        <label for="cover_image">Image de couverture (URL):</label><br>
        <input type="text" id="cover_image" name="cover_image" required><br>
        <label for="video_link">Lien vidéo (URL):</label><br>
        <input type="text" id="video_link" name="video_link" required><br><br>
        <input type="submit" name="add_content" value="Ajouter">
    </form>

    <h2>Liste des films</h2>
    <ul>
        <?php foreach ($movies as $movie): ?>
            <li>
                <?= $movie['title'] ?>
                <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="contentID" value="<?= $movie['movieID'] ?>">
                    <input type="hidden" name="type" value="movie">
                    <input type="submit" name="delete_content" value="Supprimer">
                </form>
                <a href="edit_content.php?type=movie&id=<?= $movie['movieID'] ?>">Modifier</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Liste des séries</h2>
    <ul>
        <?php foreach ($series as $serie): ?>
            <li>
                <?= $serie['title'] ?>
                <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="contentID" value="<?= $serie['seriesID'] ?>">
                    <input type="hidden" name="type" value="series">
                    <input type="submit" name="delete_content" value="Supprimer">
                </form>
                <a href="edit_content.php?type=series&id=<?= $serie['seriesID'] ?>">Modifier</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
