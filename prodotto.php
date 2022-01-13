<?php
require_once 'required.php';

if($SetParameters["logged"] && $SetParameters["Tipo"] == "venditore"){
    // Loggato come venditore -> mando alla pagina di gestione
    header("location:gestione.php");
}

$SetParameters["titolo"] = "Prodotto"; // Inserire nome prodotto
$SetParameters["file"] = "prodotto_singolo.php";
$SetParameters["prodotto"] = $dbh->getProdotto($_GET["id"]);

if(isset($_POST["id"])){
    if(!$SetParameters["logged"]){
    // Utente non loggato -> mando alla pagina di login
        header("location:login.php");
    } else {
        $dbh->insertProductInCart($_SESSION["ID_Utente"], intval($_POST["id"]), intval($_POST["quantità"]));
    }
}

require("template/base.php");
?>