<?php
require_once 'required.php';

if($SetParameters["logged"] && $SetParameters["Tipo"] == "venditore"){
    // Loggato come venditore -> mando alla pagina di gestione
    header("location:gestione.php");
}

$SetParameters["titolo"] = "Prodotto"; // Inserire nome prodotto
$SetParameters["file"] = "prodotto_singolo.php";
$SetParameters["prodotto"] = $dbh->getProdotto($_GET["id"]);

require("template/base.php");
?>