<?php

$errorMSG = "";
$name = "";
$song = "";


// NAME
if (empty($_POST["name"]) || !preg_match("/^[A-Za-z .'-]+$/", $_POST['name'])) {
    $errorMSG = "C'est un prénom correct? ";
} else {
    $name = trim(strip_tags($_POST["name"]));
}

// SONG
if (empty($_POST["song"]) || !preg_match("/^[A-Za-z0-9 .'-]+$/", $_POST['song'])) { // || preg_match($string_exp, $_POST['song'])
    $errorMSG .= "Il me semble pas que c'est une bonne chanson :(";
} else {
    $song = trim(strip_tags($_POST["song"]));
}



$EmailTo = "anastasia.oudin@gmail.com";
$Subject = "New Wedding Song";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Song: ";
$Body .= $song;
$Body .= "\n";


// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$name);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Il y a une erreur :(";
    } else {
        echo $errorMSG;
    }
}

?>
