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

/* Filtraggio prodotti mostrati */
// Controllo se è stata selezionata una categoria
if($_GET["categoria"] == "Motherboard" || $_GET["categoria"] == "GPU"){
    $SetParameters["tipologia"] = $dbh->getType($_GET["categoria"]);
}
if(isset($_POST["submit"])){
    header("location:aggiunto.php");
}
// Controllo se è stato selezionato un venditore
if(isset($_GET["venditore"])){
    $SetParameters["prodotti"] = $dbh->getVenditoreProdotti($_GET["categoria"], $_GET["venditore"]);
} elseif (isset($_GET["tipologia"])) {
    $SetParameters["prodotti"] = $dbh->getTypeProducts($_GET["tipologia"]);
} else {
    $SetParameters["prodotti"] = $dbh->getProdotti($_GET["categoria"]);
}

require("template/base.php");
?>