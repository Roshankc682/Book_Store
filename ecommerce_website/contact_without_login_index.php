<?php

$to_email = 'codieburh682@gmail.com';
$subject = 'From : '.$_POST['name'].' 	Subject : '.$_POST['subject'];
$body = $_POST['message'];
$headers = "From: ".$to_email;


echo "<h1>Sending message wait few Seconds</h1>";
if (mail($to_email, $subject, $body, $headers)) {
    echo '<script>window.location.replace("contact_without_login.php?success=message_sent_succefully");</script>';
                exit();
} else {
     echo '<script>window.location.replace("contact_without_login.php?unsuccess=message_false");</script>';
                exit();
}
?>