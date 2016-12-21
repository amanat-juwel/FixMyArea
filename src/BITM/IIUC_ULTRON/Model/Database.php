<?php
namespace App\Model;
use PDO;
use PDOException;


class Database{
    public $DBH;
    public $host="localhost";
    public $dbname="fix_my_area";
    public $user="root";
    public $password="";

    public function __construct()
    {
        try {
            $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);

        }
        catch(PDOException $error){
            echo $error->getMessage();

        }
    }

}

