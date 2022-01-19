<?php
require_once 'required.php';

if($SetParameters["logged"] && $SetParameters["Tipo"] == "cliente"){
    // Loggato come cliente -> non può accedere qui, mando alla pagina principale
    header("location:index.php");
}

$SetParameters["titolo"] = "Gestione prodotti "; 
$SetParameters["file"] = "gestione_prodotti.php";

if(isset($_POST["prezzo"]) && $_POST["prezzo"]!=0 
    && isset($_POST["quantita"]) && $_POST["quantita"]!=0){
        $dbh->updateProduct(intval($_POST["prezzo"]), intval($_POST["quantita"]), intval($_POST["id"]));  
    }

$SetParameters["prodotti"] = $dbh->getSellerProducts($_SESSION["ID_Utente"]);

require("template/base.php");
?>