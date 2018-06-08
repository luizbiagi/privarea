<?php 
define('__CONFIG__', true);
require_once "inc/config.php";?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="robots" content="follow">
    <title>Ninjas também dormem!</title>
    <!--base href="/"/-->
    <link rel="stylesheet" href="../uikit.min.css"/>
</head>
<body>
    <div class="uk-section uk-container">
        <?php 
            echo "Data:";
            date("Y m d"); 
        ?>
        <p>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </p>
    </div>
    <?php require_once "inc/footer.php"; ?>
</body>
</html>