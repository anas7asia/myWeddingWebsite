<?php
 
if(isset($_POST['email'])) {
 

 
$email_to = "anastasia.oudin@gmail.com";

$email_subject = "Wedding music";

     

function died($error) {

    // your error code can go here

    echo "Désolé, il y une erreur d'envoi du formulaire ";

    echo "Elle est en-dessus <br /><br />";

    echo $error."<br /><br />";

    echo "Essayez de renvoyer le formulaire, s'il vous plaît. C\'est très important pour nous <br /><br />";

    die();

}
   

  // validation expected data exists

if(!isset($_POST['name']) ||

   !isset($_POST['song']) ||
{

    died('Désolé, il y a un petit problème d\'envoi de ce formulaire.');       

}
 

  $name = $_POST['name']; // required

  $song = $_POST['song']; // required
   

  $error_message = "";


  $string_exp = "/^[A-Za-z .'-]+$/";

if(!preg_match($string_exp,$name)) {

  $error_message .= 'Vous êtes sur que c\'est un prénom correct? <br />';

}

if(!preg_match($string_exp,$song)) {

  $error_message .= 'Oooups! La chanson que vous avez mise ne semble pas être correct. <br />';

}

  $email_message = "Form details below.\n\n";
   

  function clean_string($string) {

    $bad = array("content-type","bcc:","to:","cc:","href");

    return str_replace($bad,"",$string);

  }
   

  $email_message .= "Name: ".clean_string($name)."\n";

  $email_message .= "Song: ".clean_string($song)."\n";


// create email headers

$headers = 'From: '.$email_from."\r\n".

'X-Mailer: PHP/' . phpversion();


@mail($email_to, $email_subject, $email_message, $headers);  

?>



<!-- include your own success html here --> 

Merci beaucoup et à bientôt!

<?php

}

?>