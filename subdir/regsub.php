<?php


class uregister
{
    public $class_uid;
    public $class_link;

    function sub_reg($name, $username, $university_id, $semester, $email, $password)
    {
        include('../include/connection.php');
        include('../include/mailer.php');

        $name = stripcslashes($name);
        $username = stripcslashes($username);
        $university_id = stripcslashes($university_id);
        $semester = stripcslashes($semester);
        $email = stripcslashes($email);
        $password = stripcslashes($password);


        $name = mysqli_real_escape_string($con, $name);
        $username = mysqli_real_escape_string($con, $username);
        $university_id = mysqli_real_escape_string($con, $university_id);
        $semester = mysqli_real_escape_string($con, $semester);
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);


        //insert user into database table --start
        $sql = "INSERT INTO `user` (`name`, `username`, `university_id`, `semester`, `email`, `pass`) VALUES ('$name', '$username', '$university_id', '$semester', '$email', '$password')";
        $rs = mysqli_query($con, $sql);
        //insert user into database table --end

        //create a row for that user in database --start
        $sql2 = "SELECT * FROM user WHERE username = '$username' AND email = '$email' AND pass = '$password'";
        $res2 = mysqli_query($con, $sql2);
        $row = mysqli_fetch_array($res2, MYSQLI_ASSOC);
        $this->class_uid = $row['id'];

        //mail verification email to user email address --start
        $codegen = rand(0000, 9999);
        $vercode = $codegen . $this->class_uid;
        $this->class_link = "<h3><a href='" . $verifymail_website . "subdir/verify_email.php?vcode=" . $vercode . "&id=" . $this->class_uid . "&email=" . $email . "'>Click and Verify Your Email On NEUB WORKSHOP Site</a></h3>";

        //verification status insert --start
        $sql4 = "UPDATE user SET verified = '" . $vercode . "' WHERE id = " . $this->class_uid;
        $rs4 = mysqli_query($con, $sql4);
        //verification status insert --end

    }

    function mail_the_code()
    {
        include('../include/mailer.php');
        require_once('../phpmailer/PHPMailerAutoload.php');

        $mail = new PHPMailer();
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = $mailer_mail;
        // GMAIL password
        $mail->Password = $mailer_pass;
        $mail->SMTPSecure = "ssl";
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From = 'neub.acm.2022@gmail.com';
        $mail->FromName = 'NEUB WORKSHOP';
        $name = $_POST['name'];
        $mail->AddAddress($_POST['email'], $name);
        $mail->Subject  =  'Verify Account on NEUB WORKSHOP';
        $mail->IsHTML(true);
        $mail->Body    = 'NEUB WORKSHOP Email Verification System - Click on this link : ' . $this->class_link . '';
        $mail_rs = $mail->Send();
        //mail verification email to user email address --start

        if ($mail_rs) {
            return true;
        } else {
            return false;
        }
    }
}



$name = $_POST['name'];
$username = $_POST['username'];
$university_id = $_POST['university_id'];
$semester = $_POST['semester'];
$email = $_POST['email'];
$password = $_POST['password'];



$register_user = new uregister();

if ($register_user->sub_reg($name, $username, $university_id, $semester, $email, $password)) {
    echo "<h1>Sorry User Already Registered</h1>";
}

if ($register_user->mail_the_code()) {
    echo "Registration Successfull";
    header('Location: ../login.php');
} else {
    echo "Registration Failed";
}
