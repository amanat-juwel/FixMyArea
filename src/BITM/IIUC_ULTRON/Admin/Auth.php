<?php
namespace App\Admin;
use PDO;

if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;

class Auth extends DB{


    public $adminname = "";
    public $adminpass = "";


    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('adminname', $data)) {
            $this->adminname = $data['adminname'];
        }
        if (array_key_exists('adminpass', $data)) {
            $this->adminpass = $data['adminpass'];
        }

        return $this;
    }


    public function is_registered(){
        $query = "SELECT * FROM `admin` WHERE `adminname`=:adminname AND `adminpass`=:adminpass";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':adminname'=>$this->adminname, ':adminpass'=>$this->adminpass));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	    public function log_out(){
        $_SESSION['adminname']="";
        return TRUE;
    }

   
}

