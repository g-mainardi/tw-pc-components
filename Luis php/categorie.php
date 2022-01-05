<?php
require_once 'required.php';

$SetParameters["titolo"] = "Categorie";
$SetParameters["file"] = "categoria_pezzi.php";
$SetParameters["categoria"] = $_GET["categoria"];
$SetParameters["venditori"] = $dbh->getVenditori($_GET["categoria"]);

if(isset($_GET["venditore"])){
    $SetParameters["prodotti"] = $dbh->getVenditoreProdotti($_GET["categoria"], $_GET["venditore"]);
} else {
    $SetParameters["prodotti"] = $dbh->getProdotti($_GET["categoria"]);
}

require("template/base.php");
?>