<?php
namespace App\User;
use PDO;

if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;

class Auth extends DB{


    public $email = "";
    public $password1 = "";
    public $user_name="";
    public $nid="";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password1', $data)) {
            $this->password1 = md5($data['password1']);
        }
        if (array_key_exists('userName', $data)) {
            $this->user_name =$data['userName'];
        }
        if (array_key_exists('nid', $data)) {
            $this->nid =$data['nid'];
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `user_info` WHERE `user_info`.`email` =:email";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':email'=>$this->email));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function is_exist_nid(){

        $query="SELECT * FROM `user_info` WHERE `user_info`.`nid` =:nid";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':nid'=>$this->nid));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `user_info` WHERE `is_approved`='" . '1' . "' AND `email`=:email AND `user_pass`=:password";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':email'=>$this->email, ':password'=>$this->password1));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email']="";
        return TRUE;
    }
    public function check_user(){

        $query="SELECT * FROM `user_info` WHERE `user_name` =$this->user_name";
        $STH=$this->DBH->prepare($query);
        $result=$STH->execute();

        $count = $result->rowCount();
        if ($count > 0) {
            echo "<span class='status-not-available'> Username Not Available.</span>";
        } else {
            echo "<span class='status-not-available'> Available!.</span>";
        }
    }
    public function check_email(){

        $query="SELECT * FROM `user_info` WHERE `is_approved`='" . '1' . "' AND `email`=:email";
        $STH=$this->DBH->prepare($query);
        $result=$STH->execute(array(':email'=>$this->email));
        //var_dump($STH);
        //die();
        $count = $result->rowCount();
        if ($count > 0) {
            echo "<span class='status-not-available'> Email Is Not Verified.</span>";
        } else {
            echo "<span class='status-not-available'> Verified!.</span>";
        }
    }
    public function check_pass(){
        $query="SELECT user_pass FROM `user_info` WHERE `user_info`.`email` =:email";
        $STH=$this->DBH->prepare($query);
        $result=$STH->execute(array(':email'=>$this->email));
        $row = $STH->fetch(PDO::FETCH_OBJ);
        if($row->user_pass==$this->password1)
            return TRUE;
        else
            return FALSE;
    }

}

