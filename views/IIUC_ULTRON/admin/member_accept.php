<?php
include_once('../../../vendor/autoload.php');
use App\User\User;

$objUser = new User();

if(isset($_GET["user_id"])) {
    $objUser->setData($_GET);
    $userEmail=$objUser->getEmail();
	$objUser->member_accept();
    $_POST['email']=$userEmail->email;
    if($_POST)
        $accept=1;
}
if($accept){

    $_POST['email_token'] = md5(uniqid(rand()));
    $obj= new User();
    require '../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username="sajedayeasmin@gmail.com";               //       your gmail address
    $mail->Password="sajeda3310";                        //       your gmail password
    $mail->SetFrom('bitm.php22@gmail.com','Fix My Area');
    $mail->AddReplyTo("bitm.php22@gmail.com","Fix My Area");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "Please click this link to verify your account: 
       http://localhost/FixMyArea_BITM_FINAL_PROJECT/views/IIUC_ULTRON/Profile/signup_login.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
    $mail->MsgHTML($message);
    $mail->Send();

}



