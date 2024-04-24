<?php
session_start();
require_once "../include/bdd.php";

// Vérifier si l'utilisateur est connecté et s'il a le rôle d'administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Rediriger vers une page d'erreur ou de connexion si l'utilisateur n'est pas autorisé
    header('Location: ../pages/error.php');
    exit;
}

// Vérifier s'il y a des données de formulaire soumises pour la modification
if (isset($_POST['edit_content'])) {
    $type = $_POST['type'];
    $contentID = $_POST['contentID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $categoryID = $_POST['categoryID'];
    $cover_image = $_POST['cover_image'];
    $video_link = $_POST['video_link'];

    // Mettre à jour les données dans la base de données
    if ($type === 'movie') {
        $table = 'movies';
        $idField = 'movieID';
    } elseif ($type === 'series') {
        $table = 'series';
        $idField = 'seriesID';
    }

    $sql = "UPDATE $table SET title = :title, description = :description, categoryID = :categoryID, cover_image = :cover_image, video_link = :video_link WHERE $idField = :contentID";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array(
        ':title' => $title,
        ':description' => $description,
        ':categoryID' => $categoryID,
        ':cover_image' => $cover_image,
        ':video_link' => $video_link,
        ':contentID' => $contentID
    ));

    // Rediriger vers la page d'administration après la modification
    header('Location: admin.php');
    exit;
}

// Vérifier si un ID de contenu a été passé dans l'URL
if (isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $contentID = $_GET['id'];

    // Récupérer les détails du contenu à modifier depuis la base de données
    if ($type === 'movie') {
        $table = 'movies';
        $idField = 'movieID';
    } elseif ($type === 'series') {
        $table = 'series';
        $idField = 'seriesID';
    }

    $sql = "SELECT * FROM $table WHERE $idField = :contentID";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array(':contentID' => $contentID));
    $content = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le contenu existe
    if (!$content) {
        // Rediriger vers une page d'erreur si le contenu n'existe pas
        header('Location: ../pages/error.php');
        exit;
    }
} else {
    // Rediriger vers une page d'erreur si aucun ID de contenu n'a été spécifié
    header('Location: ../pages/error.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le contenu</title>
    <!-- Add your stylesheets and scripts here -->
</head>
<body>
  <a href="./index.php">home</a>
    <h1>Modifier le contenu</h1>

    <h2>Modifier <?= ucfirst($type) ?>: <?= $content['title'] ?></h2>
    <form action="" method="post">
        <input type="hidden" name="type" value="<?= $type ?>">
        <input type="hidden" name="contentID" value="<?= $contentID ?>">
        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title" value="<?= $content['title'] ?>" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?= $content['description'] ?></textarea><br>
        <label for="categoryID">Catégorie:</label><br>
        <select id="categoryID" name="categoryID" required>
            <?php
            $categories = $bdd->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $category) {
                $selected = ($category['categoryID'] == $content['categoryID']) ? 'selected' : '';
                echo "<option value='{$category['categoryID']}' $selected>{$category['name']}</option>";
            }
            ?>
        </select><br>
        <label for="cover_image">Image de couverture (URL):</label><br>
        <input type="text" id="cover_image" name="cover_image" value="<?= $content['cover_image'] ?>" required><br>
        <label for="video_link">Lien vidéo (URL):</label><br>
        <input type="text" id="video_link" name="video_link" value="<?= $content['video_link'] ?>" required><br><br>
        <input type="submit" name="edit_content" value="Enregistrer les modifications">
    </form>
</body>
</html>
