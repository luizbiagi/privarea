<?
if(!defined('__CONFIG__')){
    exit("You do not have the config file.");
}

class User{
    private $con;

    public $userid;
    public $email;
    public $regts;

    public function __construct(int $userid){
        $this->$con=DB::getConnection();

        $userid=Filter::Int($userid);

        $user=$this->con->prepare("SELECT userid, email, regts FROM users WHERE userid=:userid LIMIT 1");
        $user->bindParam(':userid', $userid, PDO::PARAM_INT);
        $user->execute();

        if($user->rowCount()==1){
            $user=$user->fetch(PDO::FETCH_OBJ);

            $this->email=  (string)$user->email;
            $this->userid= (int)   $user->userid;
            $this->regts=  (string)$user->regts;

        } else {
            //no user red logoff
            header("Location: /logout.php");
            exit;
        }
    }

    public static function Find($email, $return_assoc=false){
        $con=DB::getConnection();

        $email=(string)Filter::String($email);
        $findUser=$con->prepare("SELECT userid, hash FROM users WHERE email=LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($return_assoc){
            return $findUser->fetch(PDO::FETCH_ASSOC);
        }

        $user_found=(boolean) $findUser->rowCount();
        return $user_found;
    }
}
?>