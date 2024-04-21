<?php
require_once "../include/bdd.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Préparation de la requête pour récupérer toutes les catégories
$requete_all_categories = $bdd->query("SELECT * FROM categories");

// Vérifier si des catégories existent


// Fermer la requête

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/reset.css" />
    <link rel="stylesheet" href="../styles/app.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="div_more">
        <div class="center">
          <button id="close_popup">
            <img src="../assets/x.svg" alt="" />
          </button>
          <div class="img_couverture">
            <img src="../assets/serie.jpg" alt="" />
            <div class="container_play">
              <a href="" class="play">
                <img src="../assets/play_black.svg" alt="" />
                <p>Play</p>
              </a>
              <div class="containerimg">
                <img src="../assets/thumbs-up.svg" alt="" />
                <img src="../assets/circle-plus.svg" alt="" />
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
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis
                  quod, voluptates, quae, quos quidem quia quibusdam
                  exercitationem Lorem ipsum dolor sit amet consectetur
                  adipisicing elit. Quis quod, voluptates, quae, quos quidem
                  quia quibusdam exercitationem Lorem ipsum dolor sit amet
                  consectetur adipisicing elit. Quis quod, voluptates, quae,
                  quos quidem quia quibusdam exercitationem Lorem ipsum dolor
                  sit amet consectetur adipisicing elit. Quis quod, voluptates,
                  quae, quos quidem quia quibusdam exercitationem
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
                <img src="../assets/Group_7.svg" alt="" />
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
                <img src="../assets/serie.jpg" alt="" />
              </div>
              <div class="desciption_episode">
                <p class="title">uia quibusdam exercitationem Lorem</p>
                <p class="desciption">
                  quia quibusdam exercitationem Lorem ipsum dolor sit amet
                  consectetur adipisicing elit. Quis quod, voluptates, quae,
                  quos quidem quia quibusdam exercitationem Lorem ipsum dolor
                  sit amet consectetur adipisicing elit. Quis quod, voluptates,
                  quae, quos quidem quia quibusdam exercitationem
                </p>
              </div>
            </div>
            <div class="hr"></div>
            <div class="episode">
              <div class="number_episode"><p>1</p></div>
              <div class="image_episode">
                <img src="../assets/serie.jpg" alt="" />
              </div>
              <div class="desciption_episode">
                <p class="title">uia quibusdam exercitationem Lorem</p>
                <p class="desciption">
                  quia quibusdam exercitationem Lorem ipsum dolor sit amet
                  consectetur adipisicing elit. Quis quod, voluptates, quae,
                  quos quidem quia quibusdam exercitationem Lorem ipsum dolor
                  sit amet consectetur adipisicing elit. Quis quod, voluptates,
                  quae, quos quidem quia quibusdam exercitationem
                </p>
              </div>
            </div>
            <div class="hr"></div>
            <div class="episode">
              <div class="number_episode"><p>1</p></div>
              <div class="image_episode">
                <img src="../assets/serie.jpg" alt="" />
              </div>
              <div class="desciption_episode">
                <p class="title">uia quibusdam exercitationem Lorem</p>
                <p class="desciption">
                  quia quibusdam exercitationem Lorem ipsum dolor sit amet
                  consectetur adipisicing elit. Quis quod, voluptates, quae,
                  quos quidem quia quibusdam exercitationem Lorem ipsum dolor
                  sit amet consectetur adipisicing elit. Quis quod, voluptates,
                  quae, quos quidem quia quibusdam exercitationem
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="nav">
        <div class="container_one">
          <div class="logo">Netflix</div>
          <div class="navigation">
            <a href="../index.html">Home</a><a href="../pages/serie.html">Serie</a
            ><a href="../pages/film.html">Movie</a>
          </div>
        </div>
        <div class="container_two">
          <div class="recherche">
            <form action="">
              <button type="submit">
                <img src="../assets/search.svg" alt="" id="logo_recherche" />
              </button>
              <input
                type="text"
                name="recherche"
                id="recherche"
                placeholder="search"
              />
            </form>
          </div>
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
            <div class="popup_profil"></div>
          </div>
        </div>
      </div>
      <!-- <div class="avant">
        <div class="avant_first"><img src="../assets/serie.jpg" alt="" /></div>
        <div class="avant_second"><img src="../assets/serie.jpg" alt="" /></div>
      </div> -->
      <div class="container_catego_button">
        <div id="back"><img src="../assets/left.svg" alt="" /></div>
        <div id="next"><img src="../assets/right.svg" alt="" /></div>

        <div class="categories">
          <?php
          // Boucle pour afficher toutes les catégories
          while ($categorie = $requete_all_categories->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='categorie'><p>{$categorie['name']}</p></div>";
          }
          ?>

          <!-- Autres éléments .categorie -->
        </div>
      </div>
      <div class="title_series">
        <p>Trending in animation</p>
      </div>
      <div class="container_series">
        <div class="back_serie"><img src="../assets/left.svg" alt="" /></div>
        <div class="next_serie"><img src="../assets/right.svg" alt="" /></div>
        <div class="series">
          <div class="content_img">
            <img src="../assets/serie.jpg" alt="" class="img_hover" />
            <div class="content">
              <div class="container_three">
                <img src="../assets/play.svg" alt="" />
                <img src="../assets/thumbs-up.svg" alt="" />
                <img src="../assets/circle-plus.svg" alt="" />
              </div>
              <button class="open_popup">
                <img src="../assets/chevron-down.svg" alt="" />
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
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
