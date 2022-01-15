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
$SetParameters["file"] = "carrello_form.php";

array_push($SetParameters["scripts"], "./script/carrello.js");

foreach($SetParameters["cart"] as $articolo){
    $id = $articolo["ID_Articolo"];
    $SetParameters["quantitàdb"][$id] = $dbh->getProdotto($id) [0] ["quantità"];
}

require("template/base.php");
?>