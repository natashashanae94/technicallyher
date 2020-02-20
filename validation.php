<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['email'];
    $subj = $_POST['subject'];
    $msg = $_POST['msg'];

    //Sanitize the form data
    function cleanString($x){

        $x = filter_var($x, FILTER_SANITIZE_STRING);
        $x = html_entity_decode($x, ENT_QUOTES, "utf-8");
        return $x;

    }

    function cleanEmail($y) {

        $y = filter_var($y, FILTER_SANITIZE_EMAIL);
        htmlentities($y, ENT_QUOTES, 'utf-8');
        htmlspecialchars($y);

        return $y;

    }

    $fname = cleanString($fname);
    $lname = cleanString($lname);
    $mail = cleanEmail($mail);
    $subj = cleanString($subject);
    $msg = cleanString($msg);
    

    /*SENDING EMAIL*/
    $to = "natashashanae@live.com";
    $headers = "From: ".$email; 
    $subject = "Subject: ".$subj;

    $message = "Name: ".$fname $lname."\n".
            "Email: ".$email."\n".
            

            "Wrote the following: "."\n\n".
                $msg;


    wp_mail($to, $subject, $message, $headers);
    
}
?>
