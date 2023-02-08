<?php
        //email function
        ini_set("SMTP", "smtp.server.com"); //confirm smtp
        $to ="mopiviy872@bymercy.com";
        $subject = "Validation Token";
        $message = "UEUE";
        $from = "greepo_tech@outlook.com"; //sender
        $headers = "From: $from";
        if (mail($to, $subject, $message, $headers)) {
          echo "Email sent successfully.";
        } else {
          echo "Email sending failed.";
        }
?>
