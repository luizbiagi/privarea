<?
if(!defined('__CONFIG__')){
    exit("You do not have the config file.");
}

class Page{
    static function ForceLogin(){
        if(isset($_SESSION['userid'])){
        } else {
            //user nao auth
            header("Location: /login.php");
            exit;
        }
    }
    //force logged user to dashboard
    static function ForceDashboard(){
        if(isset($_SESSION['userid'])){
            header("Location: /dashboard.php");
            exit;
        } else {
            //user nao auth
        }
    }
}
?>