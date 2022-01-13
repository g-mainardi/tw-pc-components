<?php
require_once 'required.php';

if($SetParameters["logged"] && $SetParameters["Tipo"] == "venditore"){
    // Loggato come venditore -> mando alla pagina di gestione
    header("location:gestione.php");   
}

$SetParameters["titolo"] = "Categorie";
$SetParameters["file"] = "categoria_pezzi.php";
$SetParameters["categoria"] = $_GET["categoria"];
$SetParameters["venditori"] = $dbh->getVenditori($_GET["categoria"]);

if(isset($_POST["id"])){
    if(!$SetParameters["logged"]){
    // Utente non loggato -> mando alla pagina di login
        header("location:login.php");
    } else {
        $dbh->insertProductInCart($_SESSION["ID_Utente"], intval($_POST["id"]), 1);
    }
}

if($_GET["categoria"] == "Motherboard" || $_GET["categoria"] == "GPU"){
    $SetParameters["tipologia"] = $dbh->getType($_GET["categoria"]);
}

if(isset($_GET["venditore"])){
    $SetParameters["prodotti"] = $dbh->getVenditoreProdotti($_GET["categoria"], $_GET["venditore"]);
} elseif (isset($_GET["tipologia"])) {
    $SetParameters["prodotti"] = $dbh->getTypeProducts($_GET["tipologia"]);
} else {
    $SetParameters["prodotti"] = $dbh->getProdotti($_GET["categoria"]);
}

require("template/base.php");
?>