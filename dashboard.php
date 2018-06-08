<?php 
define('__CONFIG__', true);
require_once "inc/config.php";
Page::ForceLogin();
$User=new User($_SESSION['userid']);
/* 
Saiu com a def de User como obj
$getUserInfo=$con->prepare("SELECT email, regts FROM users WHERE userid=:userid LIMIT 1");
$getUserInfo->bindParam(':userid', $userid, PDO::PARAM_INT);
$getUserInfo->execute();

if($getUserInfo->rowCount() == 1){
    $User = $getUserInfo->fetch(PDO::FETCH_ASSOC);

} else {
    //user not signed
    header("Location: /logout.php");
    exit;
}*/
?>
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
        <h2>Dashboard</h2>
        <p>Logged: <?php echo $User->email;?>, created at:  <?php echo $User->regts;?></p>
        <p><a href="logout.php">Logout</a></p>
        <p>
            NewsFeed
            friends feed
            change email
            change pass
            reset pass
            invite module
            add first name
            add last name
            add email confirmation
            sms conf
        </p>
    </div>
    <?php require_once "inc/footer.php"; ?>
</body>
</html>