<?php  
    require 'config/includes.php';
    
    if (isset($_POST['fullName'])) {

        $fullName = clean_string($_POST['fullName']);
        $email = clean_email($_POST['email']);
        $messageText = clean_string($_POST['messageText']);

        $ticket = my_randoms(10);

        $subject = "Ticket #" . $ticket;
        $message = "Ticket #" . $ticket . "<br><br>";
        $message .= "<p>Dear " . $fullName . ",</p>";
        $message .= "<p> hope this email finds you well. We wanted to confirm that we have successfully received your ticket request, which was submitted on " . date("F d, Y") . ".  <br><br>
        Our team is actively reviewing your request, and we will begin working on it as soon as possible. Please be assured that we prioritize all support tickets and aim to provide timely and effective assistance.</p>";

        $request = sendEmail($email, $subject, $subject, $message, "phpmailer/PHPMailerAutoload.php");
        $request1 = createEmailRequest($ticket, $email, $messageText);

        if ($request == true && $request1 == true) {
            header("location: support?note=sent");
        } else {
            header("location: support?note=error");
        }

    } else {
        header("location: support?note=invalid");
    }
?>