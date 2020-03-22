<?php
include 'dbh.php';
if(isset($_POST['forgot'])){
	$email=$_POST['email'];

	$sql="SELECT * FROM users WHERE email='$email'";
    $result=$conn->query($sql);
    if(!$row=mysqli_fetch_assoc($result)){
    echo 'does_not_exists';
    }
    else{
            $mission=mysqli_query($conn,"SELECT `password` FROM users WHERE email='$email'");
            $row = mysqli_fetch_row($mission);
            $savedPass=$row[0];
            $subject = 'Your password for Fliptask';

            require 'PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'oscorper@gmail.com';          // SMTP username
            $mail->Password = 'ThisIsMyNewPassword'; // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            $mail->setFrom('oscorper@gmail.com');
            $mail->addReplyTo('oscorper@gmail.com');
            $mail->addAddress($email);   // Add a recipient

            $mail->isHTML(true);  // Set email format to HTML

            $bodyContent = "Your password for FlipTask is: ".$savedPass;

            $mail->Subject = $subject;
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                echo 'not_sent';
            } 
            else {
                echo 'success';
            }
        }

	exit();
    
}

?>

