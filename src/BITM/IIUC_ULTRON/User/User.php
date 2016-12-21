<?php
namespace App\User;

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class User extends DB
{
    public $user_id = "";
    public $userName = "";
    public $nid = "";
    public $address = "";
    public $ward_no = "";
    public $post_office = "";
    public $thana = "";
    public $district = "";
    public $mobile = "";
    public $gender = "";
    public $occupation = "";
    public $email = "";
    public $password1 = "";
    public $password2 = "";
    public $is_approved = "0";
    public $user_image = "";
    public $user_nid_image = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data = array())
    {

        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }

        if (array_key_exists('userName', $data)) {
            $this->userName = $data['userName'];
        }
        if (array_key_exists('nid', $data)) {
            $this->nid = $data['nid'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists('ward_no', $data)) {
            $this->ward_no = $data['ward_no'];
        }
        if (array_key_exists('post_office', $data)) {
            $this->post_office = $data['post_office'];
        }
        if (array_key_exists('thana', $data)) {
            $this->thana = $data['thana'];
        }
        if (array_key_exists('district', $data)) {
            $this->district = $data['district'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('mobile', $data)) {
            $this->mobile = $data['mobile'];
        }
        if (array_key_exists('gender', $data)) {
            $this->gender = $data['gender'];
        }
        if (array_key_exists('occupation', $data)) {
            $this->occupation = $data['occupation'];
        }
        if (array_key_exists('password1', $data)) {
            $this->password1 = md5($data['password1']);
        }
        if (array_key_exists('password2', $data)) {
            $this->password2 = md5($data['password2']);
        }
        if (array_key_exists('user_image', $data)) {
            $image_name = time() . $_FILES['user_image']['name'];
            $temporary_location = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($temporary_location, '../../../resource/Picture/' . $image_name);
            $this->user_image = $image_name;
        }
        if (array_key_exists('user_nid_image', $data)) {
            $image_name = time() . $_FILES['user_nid_image']['name'];
            $temporary_location = $_FILES['user_nid_image']['tmp_name'];
            move_uploaded_file($temporary_location, '../../../resource/Picture/' . $image_name);
            $this->user_nid_image = $image_name;
        }
        return $this;
    }

    public function store()
    {
        $arrData = array($this->userName, $this->ward_no, $this->nid, $this->password1, $this->mobile, $this->address, $this->post_office, $this->thana, $this->district, $this->gender, $this->occupation, $this->email, $this->user_image, $this->user_nid_image);

        $sql = "INSERT INTO user_info (user_name,ward_no,user_nid,user_pass,user_mobile,adress,postoffice,thana,district,gender,occupation,
                email,userimage,nidimage) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $STH = $this->DBH->prepare($sql);
        $result = $STH->execute($arrData);
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
                </div>");
            Utility::redirect('signup_login.php');
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            Utility::redirect('signup_login.php');
        }
    }


    public function index($mode = "ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from user_info where is_approved=0 ');

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }

    public function index_all($mode = "ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from user_info where is_approved=1');

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }

    public function change_password()
    {
        $query = "UPDATE `user_info` SET `user_pass`=:password  WHERE `user_info`.`email` =:email";
        $result = $this->DBH->prepare($query);
        $result->execute(array(':password' => $this->password1, ':email' => $this->email));
        /*
                if ($result) {
                    Message::message("
                     <div class=\"alert alert-info\">
                     <strong>Success!</strong> Password has been updated successfully.
                      </div>");
                    Utility::redirect('signup_login.php');
                } else {
                    echo "Error";
                }*/
    }

    public function view()
    {
        $query = "SELECT * FROM `user_info` WHERE `user_info`.`email` =:email";
        $result = $this->DBH->prepare($query);
        $result->execute(array(':email' => $this->email));
        $row = $result->fetch(PDO::FETCH_OBJ);
        return $row;
        unset($_FILES);
    }// end of view()


    public function validTokenUpdate()
    {
        $query = "UPDATE `user-management`.`users` SET  `email_verified`='" . 'Yes' . "' WHERE `users`.`email` =:email";
        $result = $this->DBH->prepare($query);
        $result->execute(array(':email' => $this->email));

        if ($result) {
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        } else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/SEIPXXXX/User/Profile/signup.php');
    }

    public function update()
    {
        $arrData = array($this->userName, $this->ward_no, $this->nid, $this->mobile, $this->address, $this->post_office, $this->thana, $this->district, $this->gender, $this->occupation, $this->email, $this->user_image, $this->user_nid_image);

        $query = 'UPDATE user_info  SET user_name=?,ward_no=?,user_nid=?,user_mobile=?,adress=?,postoffice=?,thana=?,district=?,gender=?,occupation=?,email=?,userimage=?,nidimage=? WHERE email =\'' . $this->email . '\'';
        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($arrData);
        //var_dump($STH);
        //die();
        if ($result) {
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        } else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }


    public function member_accept()
    {

        $sql = 'UPDATE user_info SET is_approved = 1 where user_id =' . $this->user_id;

        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute();

        if ($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Updated Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Updated Successfully!</h3></div>");

        Utility::redirect('member_request.php');
    }


    public function delete()
    {


        $sql = "Delete from user_info where user_id=" . $this->user_id;

        $STH = $this->DBH->prepare($sql);


        $result = $STH->execute();

        if ($result) {
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        } else {
            echo "Error";
        }

        Utility::redirect('member_request.php');


    }// end of delete

    public function getEmail()
    {
        $query = "SELECT email FROM `user_info` WHERE `user_info`.`user_id` =$this->user_id";
        $result = $this->DBH->prepare($query);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_OBJ);
        return $row;
    }

}

