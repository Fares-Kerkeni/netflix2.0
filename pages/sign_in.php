<?php
session_start();

// Vérifier si l'utilisateur a soumis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si la case "Se souvenir de moi" est cochée
    $remember = isset($_POST['remember']) ? true : false;

    // Traiter le formulaire de connexion...

    // Si l'utilisateur a coché "Se souvenir de moi", créer un cookie
    if ($remember) {
        // Définir les informations de connexion dans le cookie
        setcookie("email", $_POST['email'], time() + (86400 * 30), "/"); // 86400 = 1 jour
        // Vous pouvez également stocker un jeton d'authentification sécurisé ici
    }
}

// Vérifier si l'utilisateur est déjà connecté en utilisant le cookie
if (isset($_COOKIE['email'])) {
    // Connectez automatiquement l'utilisateur en utilisant les informations stockées dans le cookie
    // Vous pouvez également vérifier d'autres informations d'authentification ici si nécessaire
    $_SESSION['email'] = $_COOKIE['email'];
}

// Rediriger l'utilisateur s'il est déjà connecté
if (isset($_SESSION['email'])) {
    header('Location: pages/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css" />
    <link rel="stylesheet" href="../styles/sign_pages.css" />
    <title>Document</title>
</head>
<body>
    <style>
        /* Style de la case à cocher */
        .custom-checkbox {
            display: inline-block;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            position: relative;
            border: 2px solid #564f6f;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Style du marqueur (coche) */
        .custom-checkbox::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 7px;
            width: 5px;
            height: 10px;
            border: solid #564f6f;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            display: none;
        }

        /* Style de la case à cocher lorsque cochée */
        .custom-checkbox.checked::after {
            display: block;
        }

        /* Style du texte à côté de la case à cocher */
        .checkbox p {
            display: inline;
            margin-left: 10px;
            color: #564f6f;
        }

        /* Style du texte "Remember me" */
        .checkbox p {
            margin-left: 10px;
            color: #564f6f;
            font-size: 16px;
        }

        /* Cacher la case à cocher par défaut */
        input[type="checkbox"] {
            display: none;
        }
    </style>
    <div class="container">
        <div class="container_img">
            <div class="title_img">
                <p>Regarder vos séries et films</p>
                <p>Gratuitement</p>
            </div>
            <div class="img"><img src="../assets/girl_sign.png" alt="" /></div>
        </div>
        <div class="container_form">
            <?php
            if(isset($_SESSION['login_error_message'])) {
                echo "<p>{$_SESSION['login_error_message']}</p>";
                unset($_SESSION['login_error_message']); // Supprimer le message d'erreur après l'avoir affiché
            }
            ?>
            <form method="POST" action="../traitements/connexion.php">
                <div class="title_form">
                    <p>Sign in</p>
                </div>
                <div class="input_form">
                    <input type="email" placeholder="Email" name="email" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" required>
                    <input type="password" placeholder="Mot de passe" name="password" required>
                </div>
                <div class="button_form">
                    <input type="submit" name="submit" value="Sign in">
                </div>
                <div class="forgot_password">
                    <p>Forgot password ?</p>
                </div>
                
                <div class="checkbox">
                    <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE['email'])) { echo 'checked'; } ?> />
                    <label for="remember" class="custom-checkbox"></label>
                    <p>Remember me</p>
                </div>

                <div class="link_form">
                    <p>Nex to Streamify?</p>
                    <a href="sign_up.php"> Sign up now.</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        // JavaScript pour gérer l'état de la case à cocher visuellement
        document.getElementById("remember").addEventListener("click", function() {
            var checkbox = document.getElementById("remember");
            checkbox.classList.toggle("checked");
        });
    </script>
</body>
</html>
