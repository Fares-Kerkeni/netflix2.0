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
    <div class="container">
        <div class="container_img">
            <div class="title_img">
                <p>Regarder vos séries et films</p>
                <p>Gratuitement</p>
            </div>
            <div class="img">
                <img src="../assets/result-YXHaXSNXuCh49bZk7-HLpPS6K8qeX9TvUP-removebg-preview.png" alt="" />
            </div>
        </div>
        <div class="container_form">
            <?php
            if(isset($_SESSION['error_message'])) {
                echo "<p>{$_SESSION['error_message']}</p>";
                unset($_SESSION['error_message']); // Supprimer le message d'erreur après l'avoir affiché
            }
            ?>
            <form method="POST" action="../traitements/inscription.php">
                <div class="title_form">
                    <p>Sign up</p>
                </div>
                <div class="input_form">
                    <input type="text" placeholder="username" name="username"/>
                    <input type="email" placeholder="Email"  name="email"/>
                    <input type="password" placeholder="Mot de passe" name="password"/>
                    <input type="password" placeholder="Confirmer mot de passe" name="password_confirm"/>
                </div>
                <div class="button_form">
                    <input type="submit" name="submit" value="Sign up">
                </div>
                <div class="checkbox">
                    <input type="checkbox" />
                    <p>Remember me</p>
                </div>
                <div class="link_form">
                    <p>Already registered</p>
                    <a href="sign_in.php">Sign in.</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>