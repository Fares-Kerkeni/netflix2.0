<?php
session_start();
require_once "../include/bdd.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Préparation de la requête pour récupérer toutes les catégories
$requete_all_categories = $bdd->query("SELECT * FROM categories");

// Vérifier si des catégories existent
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si l'utilisateur est connecté
    if (!$userID) {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        header('Location: sign_in.php');
        exit;
    }

    // Récupération des données du formulaire
    $itemID = $_POST['series_id']; // Correction du nom du champ
    $rating = $_POST['rating'];

    // Vérification si l'utilisateur a déjà noté cet élément
    $checkRatingQuery = $bdd->prepare("SELECT * FROM series_ratings WHERE seriesID = ? AND userID = ?");
    $checkRatingQuery->execute([$itemID, $userID]);
    $existingRating = $checkRatingQuery->fetch(PDO::FETCH_ASSOC);

    if ($existingRating) {
        // Mettre à jour la note existante si elle existe déjà
        $updateRatingQuery = $bdd->prepare("UPDATE series_ratings SET rating = ? WHERE seriesID = ? AND userID = ?");
        $updateRatingQuery->execute([$rating, $itemID, $userID]);
    } else {
        // Insérer une nouvelle note si l'utilisateur n'a pas encore noté cet élément
        $insertRatingQuery = $bdd->prepare("INSERT INTO series_ratings (seriesID, userID, rating) VALUES (?, ?, ?)");
        $insertRatingQuery->execute([$itemID, $userID, $rating]);
    }

    // Redirection vers la page précédente après la soumission du formulaire
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/app.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="div_more">
        <div class="center">
            <button id="close_popup">
                <img src="../assets/x.svg" alt="">
            </button>
            <div class="img_couverture">
                <img src="../assets/serie.jpg" alt="">
                <div class="container_play">
                    <a href="" class="play">
                        <img src="../assets/play_black.svg" alt="">
                        <p>Play</p>
                    </a>
                    <div class="containerimg">
                        <img src="../assets/thumbs-up.svg" alt="">
                        <img src="../assets/circle-plus.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="container_dates_genres">
                <div class="container_date_saison">
                    <div class="date_saison">
                        <p>2020</p>
                        <p>5 saisons</p>
                    </div>
                    <div class="container_title">
                        <p>title</p>
                    </div>
                    <div class="container_description">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quod, voluptates, quae,
                            quos quidem quia quibusdam exercitationem Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Quis quod, voluptates, quae, quos quidem quia quibusdam exercitationem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quod, voluptates, quae,
                            quos quidem quia quibusdam exercitationem Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Quis quod, voluptates, quae, quos quidem quia quibusdam exercitationem
                        </p>
                    </div>
                </div>
                <div class="genres">
                    <p>Genre :</p>
                    <p>serie dramatique</p>
                </div>
            </div>
            <div class="container_change_saison">
                <div class="saison">
                    <p>Saison 1</p>
                    <div class="button_saison">
                        <p>Saison 1</p>
                        <img src="../assets/Group_7.svg" alt="">
                        <div class="all_saison">
                            <p>Saison 1</p>
                            <p>Saison 2</p>
                            <p>Saison 3</p>
                            <p>Saison 4</p>
                            <p>Saison 5</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container_episodes">
                <div class="episode">
                    <div class="number_episode"><p>1</p></div>
                    <div class="image_episode">
                        <img src="../assets/serie.jpg" alt="">
                    </div>
                    <div class="desciption_episode">
                        <p class="title">uia quibusdam exercitationem Lorem</p>
                        <p class="desciption">
                            quia quibusdam exercitationem Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quis quod, voluptates, quae, quos quidem quia quibusdam exercitationem Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Quis quod, voluptates, quae, quos quidem quia
                            quibusdam exercitationem
                        </p>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="episode">
                    <div class="number_episode"><p>1</p></div>
                    <div class="image_episode">
                        <img src="../assets/serie.jpg" alt="">
                    </div>
                    <div class="desciption_episode">
                        <p class="title">uia quibusdam exercitationem Lorem</p>
                        <p class="desciption">
                            quia quibusdam exercitationem Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quis quod, voluptates, quae, quos quidem quia quibusdam exercitationem Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Quis quod, voluptates, quae, quos quidem quia
                            quibusdam exercitationem
                        </p>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="episode">
                    <div class="number_episode"><p>1</p></div>
                    <div class="image_episode">
                        <img src="../assets/serie.jpg" alt="">
                    </div>
                    <div class="desciption_episode">
                        <p class="title">uia quibusdam exercitationem Lorem</p>
                        <p class="desciption">
                            quia quibusdam exercitationem Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quis quod, voluptates, quae, quos quidem quia quibusdam exercitationem Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Quis quod, voluptates, quae, quos quidem quia
                            quibusdam exercitationem
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="container_one">
            <div class="logo">Netflix</div>
            
            
        </div>
       <?php
    
    if($_SESSION['role'] === 'admin'){
        echo '<a href="admin.php" class="admin-link">Admin</a>';
    }
    ?>
        
        
        
        <div class="container_two">
            
            <div class="profil">
                <div class="img">
                    <img src="../assets/girl_signa.png" alt="" />
                </div>

                <div class="name_profil">
                    <p>Fares</p>
                    <p>Kerkeni</p>
                </div>
                <div class="fleche">
                    <img src="../assets/Group_7.svg" alt="" />
                </div>
                <div class="popup_profil">
                    <?php
                    // Assurez-vous de remplacer "path_to_your_database_connection_file.php" par le chemin correct vers votre fichier de connexion à la base de données
                    require_once "../include/bdd.php";

                    // Vérifier si l'utilisateur est connecté
                    if (!isset($_SESSION['user_id'])) {
                        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
                        header('Location: sign_in.php');
                        exit;
                    }

                    // Récupérer l'ID de l'utilisateur à partir de la session
                    $userID = $_SESSION['user_id'];

                    // Requête pour récupérer la date d'expiration de l'abonnement de l'utilisateur
                    $sql = "SELECT subscription_date, duration FROM users INNER JOIN subscriptions ON users.subscriptionID = subscriptions.subscriptionID WHERE userID = :userID";

                    // Préparation de la requête
                    $stmt = $bdd->prepare($sql);

                    // Liaison des paramètres
                    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);

                    // Exécution de la requête
                    $stmt->execute();

                    // Récupération du résultat
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Vérifier si l'utilisateur a un abonnement
                    if ($user && $user['subscription_date'] !== null) {
                        // Calculer la date d'expiration de l'abonnement en ajoutant la durée de l'abonnement à la date de début
                        $subscriptionEndDate = date('Y-m-d', strtotime($user['subscription_date'] . ' +' . $user['duration'] . ' days'));

                        // Calculer la différence entre la date d'expiration et la date actuelle
                        $currentTime = time();
                        $expirationTime = strtotime($subscriptionEndDate);
                        $difference = $expirationTime - $currentTime;

                        // Afficher le compte à rebours
                        if ($difference > 0) {
                            $days = floor($difference / (60 * 60 * 24));
                            $hours = floor(($difference % (60 * 60 * 24)) / (60 * 60));
                            $minutes = floor(($difference % (60 * 60)) / 60);
                            $seconds = $difference % 60;

                            echo "Votre abonnement expire dans : $days jours, $hours heures, $minutes minutes, $seconds secondes.";
                        } else {
                            echo "Votre abonnement a expiré.";
                        }
                    } else {
                        echo "Vous n'avez pas d'abonnement.";
                    }
                    ?>
                    <form method="POST" action="../traitements/connexion.php">
    <!-- Vos autres champs de formulaire -->

    <!-- Bouton de connexion -->
    <div class="button_form">
        <input type="submit" name="submit" value="Sign in">
    </div>
    
    <!-- Bouton de déconnexion -->
    <div class="button_form">
        <a href="../traitements/deconnexion.php">Déconnexion</a>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
   
    <p>Series</p>
    <?php
// Préparation de la requête pour récupérer toutes les catégories
$requete_all_categories = $bdd->query("SELECT * FROM categories");

// Boucle sur chaque catégorie
while ($categorie = $requete_all_categories->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='container_series'>";
    echo "<h2>{$categorie['name']}</h2>"; // Affiche le nom de la catégorie

    // Préparation de la requête pour récupérer les séries par catégorie
    $requete_series_by_category = $bdd->prepare("SELECT * FROM series WHERE categoryID = ?");
    $requete_series_by_category->execute([$categorie['categoryID']]);
   
    echo "<div class='series'>";
    // Boucle pour afficher toutes les séries de la catégorie actuelle
    while ($serie = $requete_series_by_category->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='content_img' data-id='{$serie['seriesID']}'>";
        echo "<img src='{$serie['cover_image']}' alt='' class='img_hover' />";
        echo "<div class='content'>";
        echo "<div class='container_three'>";
        echo "<img src='../assets/play.svg' alt='' />";
        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='series_id' value='{$serie['seriesID']}' />";
        echo "<select name='rating'>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "</select>";
        echo "<button type='submit'>Noter</button>";
        echo "</form>";

        // Calculer la moyenne des notes pour cette série
        $avgRatingQuery = $bdd->prepare("SELECT AVG(rating) AS average_rating FROM series_ratings WHERE seriesID = ?");
        $avgRatingQuery->execute([$serie['seriesID']]);
        $averageRating = $avgRatingQuery->fetch(PDO::FETCH_ASSOC);

        if ($averageRating && $averageRating['average_rating'] !== null) {
            echo "<p>Moyenne des notes : " . round($averageRating['average_rating'], 2) . "</p>";
        } else {
            echo "<p>Aucune note pour le moment</p>";
        }
        
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>"; // Fin de la classe .series
    echo "</div>"; // Fin de la classe .container_series
}
?>
<p>Films</p>
<?php
// Préparation de la requête pour récupérer toutes les catégories
$requete_all_categories = $bdd->query("SELECT * FROM categories");

// Boucle sur chaque catégorie
while ($categorie = $requete_all_categories->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='container_film'>";
    echo "<h2>{$categorie['name']}</h2>"; // Affiche le nom de la catégorie

    // Préparation de la requête pour récupérer les films par catégorie
    $requete_films_by_category = $bdd->prepare("SELECT * FROM movies WHERE categoryID = ?");
    $requete_films_by_category->execute([$categorie['categoryID']]);

    echo "<div class='film'>";
    // Boucle pour afficher tous les films de la catégorie actuelle
    while ($film = $requete_films_by_category->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='content_img'>";
        echo "<img src='../assets/film.jpg' alt='' class='img_hover' />";
        echo "<div class='content'>";
        echo "<div class='container_three'>";
        echo "<img src='../assets/play.svg' alt='' />";
        echo "<img src='../assets/thumbs-up.svg' alt='' />";
        echo "<img src='../assets/circle-plus.svg' alt='' />";
        echo "</div>";
        echo "<button class='open_popup'>";
        echo "<img src='../assets/chevron-down.svg' alt='' />";
        echo "</button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>"; // Fin de la classe .film
    echo "</div>"; // Fin de la classe .container_film
}
?>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let divMoreElements = document.querySelectorAll(".div_more");

    divMoreElements.forEach(function (element) {
        element.addEventListener("click", function () {
            let serieId = element.getAttribute("data-id");
            console.log("ID de la série:", serieId);
            
            // Vous pouvez utiliser cet ID comme vous le souhaitez, par exemple, pour récupérer plus de détails sur la série via AJAX
        });
    });
});

    document.addEventListener("DOMContentLoaded", function () {
        let scrollContainer = document.querySelector(".categories");
        let back = document.querySelector("#back");
        let next = document.querySelector("#next");

        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });

        back.addEventListener("click", () => {
            scrollContainer.scrollLeft -= 100;
        });

        next.addEventListener("click", () => {
            scrollContainer.scrollLeft += 100;
        });

        let seriesContainers = document.querySelectorAll(".container_series");

        seriesContainers.forEach(function (container) {
            let series = container.querySelector(".series");
            let backSerie = container.querySelector(".back_serie");
            let nextSerie = container.querySelector(".next_serie");

            series.addEventListener("wheel", (evt) => {
                evt.preventDefault();
                series.scrollLeft += evt.deltaY;
            });

            backSerie.addEventListener("click", () => {
                series.scrollLeft -= 100;
            });

            nextSerie.addEventListener("click", () => {
                series.scrollLeft += 100;
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        let openPopups = document.querySelectorAll(".open_popup");
        let popup = document.querySelector(".div_more");
        let closePopup = document.querySelector("#close_popup");

        openPopups.forEach(function (openPopup) {
            openPopup.addEventListener("click", () => {
                popup.style.display = "flex";
                document.body.style.overflow = "hidden"; // Empêcher le défilement lorsque la popup est ouverte
            });
        });

        closePopup.addEventListener("click", () => {
            popup.style.display = "none";
            document.body.style.overflow = "auto"; // Réactiver le défilement lorsque la popup est fermée
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        let popupButton = document.querySelector(".button_saison");
        let popup = document.querySelector(".all_saison");

        popupButton.addEventListener("click", () => {
            // Vérifie si la popup est actuellement affichée ou non
            if (popup.style.display === "none" || popup.style.display === "") {
                // Si la popup est cachée, l'affiche
                popup.style.display = "flex";
                document.body.style.overflow = "hidden"; // Empêcher le défilement lorsque la popup est ouverte
            } else {
                // Si la popup est visible, la cache
                popup.style.display = "none";
                document.body.style.overflow = "auto"; // Réactiver le défilement lorsque la popup est fermée
            }
        });
    });
</script>
</body>
</html>
