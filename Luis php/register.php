<?php
require_once '../Luis php/required.php';

// Non si dovrebbe poter accedere a questa pagina se l'utente è loggato
if(isLoggedIn()){
    setParametersByType(); // Rimanda alla pagina principale in base al tipo utente
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
            $SetParameters["nome"] = $_POST["nome"];
            $msg = "E-mail già presente";
            $success = false;
        } elseif(isset($_POST["password"]) && $_POST["password"]!=""){
            /* REGISTRARE UTENTE */
            $userid = $dbh->insertUser($_POST["nome"], $_POST["username"], $_POST["password"]);

            $msg = ($userid!=false)? "Inserimento completato correttamente!" : "Errore in inserimento!";

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