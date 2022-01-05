<?php
require_once '../Luis php/required.php';

// Non si dovrebbe poter accedere a questa pagina se l'utente è loggato
if(isLoggedIn()){
    setParametersByType(); // Rimanda a index
}

$SetParameters["titolo"] = "Register";
$SetParameters["file"] = "register_form.php";

$success = true;

if(isset($_POST["nome"]) && $_POST["nome"]!=""){
    if(isset($_POST["username"]) && $_POST["username"]!="") {
        // Controllo se c'è username su db
        $stessousername = $dbh->checkExistingUsername($_POST["username"]);

        if(count($stessousername)!=0) {
            // E-mail già presente
            $SetParameters["username"] = $_POST["username"];
            $msg = "E-mail già presente";
            $success = false;
        } elseif(isset($_POST["password"]) && $_POST["password"]!=""){
            /* REGISTRARE UTENTE */


            // Registrazione effettuata correttamente!
            $SetParameters["titolo"] = "Registrato";
            $SetParameters["file"] = "register_success.php";
        } else {
            // Password non valida
            $msg = "Password non valida";
            $success = false;
        }
    } else {
        // E-mail non inserita
        $msg = "E-mail non inserita";
        $success = false;
    }
} else {
    // Nome non inserito
    $msg = "Nome non inserito";
    $success = false;
}

// Devo pulire il POST (?)
    
require("template/base.php");

?>