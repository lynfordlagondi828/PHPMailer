<?php
$message = "";

if (isset($_POST['send'])) {

    $sender_email = "lynfordlagondi828@gmail.com";

    $email = $_POST['email'];
    $subject= $_POST["subject"];
    $bodyContent = $_POST["bodyContent"];
    $message= $_POST["message"];

   


    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'lynfordlagondi828@gmail.com';          // SMTP username
    $mail->Password = 'harrisonford828'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom($sender_email);
    $mail->addReplyTo($sender_email);
    $mail->addAddress($email);   // Add a recipient
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

   

   //$bodyContent .= 'Sender: ' . $sender_email . "<br>" . $vorname . "<br>" . $nachname . "<br> " . $strass . "<br> " . $telefon . "<br>" . $plz . "<br>" . $her . "<br>" . $place;
    $bodyContent .= '<br>'. 'Sender: ' .$sender_email . '<br>' . 'Subject:' . $subject . '<br>' .'Message: '. $message;

    $mail->Subject = $subject;
    $mail->Body    = $bodyContent;

    if(!$mail->send()){
        $message = ' Message could not be sent.';
    } else {
        $message = ' Message has been sent';
    }
}
?>
<html>
    <head>
        <title>
            Mailing System Using PHP
        </title>
    </head>
<body>
    <form method="post">
        <input type="text" name="email" placeholder =" email"><br><br>
        <input type="text" name="subject" placeholder ="Subject"><br><br>
        <input type="text" name="bodyContent" placeholder ="Header"><br><br>
        <textarea name="message" rows="4" cols="40" placeholder="Message"></textarea><br><br>
        <button name="send">Submit</button>
        <?php echo $message; ?>
    </form>
</body>
</html>