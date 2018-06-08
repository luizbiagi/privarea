<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    //sempre retornar JSON
    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('Content-Type: application/json');
        $return=[];
        $email=Filter::String($_POST['email']);
        //$email=strtolower($email);
        
        //$return=['test','tes1','tes2', array('name'=>'Zigoto', 'lastname'=>'Hermano')];
        //val.user existente
        $user_found=User::Find($email);

        if($user_found){
            $return['error']="You already have an account";
        } else {
            //user doesnt exists, adding
            $hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
            
            $addUser=$con->prepare("INSERT INTO users(email, hash) VALUES (LOWER(:email),:hash)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':hash', $hash, PDO::PARAM_STR);
            $addUser->execute();

            $userid=$con->lastInsertId();

            $_SESSION['userid']=(int)$userid;

            $return['redirect']='dashboard.php?msg=hi';
        }
        //val.user pode ser add
        //return proper info back to js to redirect us
        //$return['redirect']='/index.php?this-was-a-redirect';
        echo json_encode($return,JSON_PRETTY_PRINT);
        exit;
    } else {
        //kill script
        exit('Invalid URL');
    }
?>