<?php
if(!defined('__CONFIG__')){
    exit("You do not have the config file.");
}

class Filter{
    /** @param string $string       string to filter
     *  @return                     filter and return a valid string to put on the db
     *  @note                       if $html is false, \n will be replaced be __BR__ to later turn to \r\n
     */ 
    public static function String($string, $html=false){
        if(!$html){
            //nao usado no ex, $string=preg_replace("/(\n)/","__BR__",$string);
            $string=filter_var($string,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
            //$string=preg_replace("__BR__","\r\n",$string);
        } else {
            $string=filter_var($string,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $string;
    }
    /** @param string $email        email to filter
     *  @return                     filter and return a valid email to put on the db
     */ 
    public static function Email($email){
        return filter_var($email,FILTER_SANITIZE_EMAIL);
    }
    /** @param string $url          URL to filter
     *  @return                     filter and return a valid url to put on the db
     */ 
    public static function URL($url){
        return filter_var($url,FILTER_SANITIZE_URL);
    }
    /** @param int  $integer        integer to filter
     *  @return                     filter and return a valid int to put on the db
     */ 
    public static function Int($integer){
        return filter_var($integer,FILTER_SANITIZE_NUMBER_INT);
    }        
}
?>