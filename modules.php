<?php
if(!isset($_GET['action'])) exit;
$action = $_GET['action'];

switch($action){
    case 'contact-form':{
        $errorMSG = "";

        if (empty($_POST["name"])) {
            $errorMSG = "Imię jest wymagane";
        } else {
            $name = $_POST["name"];
        }

        if (empty($_POST["email"])) {
            $errorMSG .= "Email jest wymagany";
        } else {
            $email = $_POST["email"];
        }

        if (empty($_POST["msg_subject"])) {
            $errorMSG .= "Temat jest wymagany";
        } else {
            $msg_subject = $_POST["msg_subject"];
        }

        if (empty($_POST["message"])) {
            $errorMSG .= "Wiadomość nie może być pusta";
        } else {
            $message = $_POST["message"];
        }

        $EmailTo = "krzychu2956@gmail.com";
        $Subject = "Wiadomość z strony shield.agh.edu.pl";

        $Body = "";
        $Body .= "Name: ";
        $Body .= $name;
        $Body .= "\n";
        $Body .= "Email: ";
        $Body .= $email;
        $Body .= "\n";
        $Body .= "Subject: ";
        $Body .= $msg_subject;
        $Body .= "\n";
        $Body .= "Message: ";
        $Body .= $message;
        $Body .= "\n";

        $success = mail($EmailTo, $Subject, $Body, "From:".$email);

        if ($success && $errorMSG == ""){
        echo "success";
        }else{
            if($errorMSG == ""){
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }break;
}