<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    //include_once "../deb/debugo.php";

    //debug_out("post json");
    //debug_json("post json","Dbg:");

    //sempre retornar JSON
    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return=[];
        $email=Filter::String($_POST['email']);
        $password=$_POST['password'];
        //$email=strtolower($email);
        //debug_out("post json");
        //$return=['test','tes1','tes2', array('name'=>'Zigoto', 'lastname'=>'Hermano')];
        //val.user existente
        $user_found=User::Find($email, true);
        //$findUser=$con->prepare("SELECT userid, hash FROM users WHERE email=LOWER(:email) LIMIT 1");
        //$findUser->bindParam(':email', $email, PDO::PARAM_STR);
        //$findUser->execute();
        //debug_out("sel");

        if($user_found){
        //if($findUser->rowCount()==1){
            $userid=(int)$user_found['userid'];
            $hash=(string)$user_found['hash'];
            if(password_verify($password,$hash)){
                $return['redirect']="dashboard.php";
                $_SESSION['userid']=$userid;
            } else {
                $return['error']="Invalid email/password.";
            }
        } else {
            //user doesnt exists, error
            //$return['error']="Your email and/or password are invalid.<a href='/register.php'>Create a new one?</a>";
            $return['error']="Invalid email/password.";
        }
        echo json_encode($return,JSON_PRETTY_PRINT);
        exit;
    } else {
        //kill script
        exit('Invalid URL');
    }
?>