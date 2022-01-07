<?php
require_once 'required.php';

// Controllo se l'utente proviene dalla pagina di accesso per loggarlo
if(isset($_POST["username"]) && isset($_POST["password"])) {
    
    // Controllo se c'è su db
    $utente = $dbh->checkLogin($_POST["username"], $_POST["password"]);

    if(count($utente)==0) {
        // Login fallito -> ?
        // $SetParameters["risultatologin"] = "Errore: username o password errati";
    } else {
        // Login riuscito -> setto l'utente come loggato
        setLoggedUser($utente[0]);
        header();
    }
}

if($SetParameters["logged"] && $SetParameters["Tipo"] == "venditore"){
    // Loggato come venditore -> mando alla pagina di gestione
    header("location:gestione.php");
}

$SetParameters["titolo"] = "Home";
$SetParameters["file"] = "homepage.php";
    
require("template/base.php");

?>