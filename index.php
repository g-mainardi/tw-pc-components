<?php
require_once 'required.php';

if($SetParameters["logged"] && $SetParameters["Tipo"] == "venditore"){
    // Loggato come venditore -> mando alla pagina di gestione
    header("location:gestione.php");
}

$SetParameters["titolo"] = "Home";
$SetParameters["file"] = "homepage.php";
$SetParameters["prodottiRandom"] = $dbh->randomProducts();

array_push($SetParameters["scripts"], "./script/slider.js");
require("template/base.php");

?>