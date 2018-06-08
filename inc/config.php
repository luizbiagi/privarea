<?php
    //constante __CONFIG__ não def
    if(!defined('__CONFIG__')){
        exit("You don't have a config file");
    }
    //sessions always turned on
    if(!isset($_SESSION)){
        session_start();
    }

    //allow errors
    error_reporting(-1);
    ini_set('display_errors','On');

    include_once "classes/DB.php";
    include_once "classes/Filter.php";
    include_once "classes/User.php";
    include_once "classes/Page.php";
    
    include_once "functions.php";
    
    $con=DB::getConnection();
?>