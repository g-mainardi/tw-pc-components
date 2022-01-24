<?php
require_once 'required.php';

if(!$SetParameters["logged"]){
    // Utente non loggato -> mando alla pagina di login
    header("location:login.php");
} elseif($SetParameters["Tipo"] == "venditore"){
    // Loggato come venditore -> mando alla pagina di gestione
    header("location:gestione.php");   
}

if(isset($_POST["submit"])){
    header("location:pagamento.php");
}

$SetParameters["titolo"] = isset($SetParameters["nome"])? "Carrello di ".$SetParameters["nome"] : "Carrello"; 

array_push($SetParameters["scripts"], "./script/carrello.js");

require("template/base.php");
?>