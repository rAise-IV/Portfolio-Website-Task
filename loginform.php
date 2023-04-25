<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Quicksand|Staatliches|Play">
        <link rel="stylesheet" type="text/css" href="css/loginform.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
    </head>
    <body>
        <?php
            // Display an error message if login failed
            if(isset($_GET["error"])){
                $error = $_GET["error"];
                echo "<p>$error</p>";
            }
        ?>
        
        <form class="container" action="validate_login.php" method="post">

            <h1 class="bold center-text">LOGIN</h1>
            <fieldset class="credential-container">
                <input type="email" placeholder="Email" name="email" id="email">
                <input type="password" placeholder="Password" name="password" id="password">
            </fieldset>
            <section class="submission">
                <button type="submit">Login</button>
            </section>
        </form>
    </body>
</html>