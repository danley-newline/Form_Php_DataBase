<?php

 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=btsform', 'root', 'dakac');
    //echo "c'est bon";
} catch (Exception $error) {
   die("Erreur : ".$error->getMessage());
}
   
