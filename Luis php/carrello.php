<?php
require_once 'required.php';

if($SetParameters["logged"] && $SetParameters["Tipo"] == "venditore"){
    // Loggato come venditore -> mando alla pagina di gestione
    header("location:gestione.php");   
}

$SetParameters["titolo"] = isset($SetParameters["nome"])? "Carrello di ".$SetParameters["nome"] : "Carrello"; 
$SetParameters["file"] = "carrello_form.php";

require("template/base.php");
?>