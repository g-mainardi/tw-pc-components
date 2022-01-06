<?php
require_once 'required.php';

if($SetParameters["logged"] && $SetParameters["Tipo"] == "cliente"){
    // Loggato come cliente -> non può accedere qui, mando alla pagina principale
    header("location:index.php");
}

$SetParameters["titolo"] = "Gestione prodotti "; 
$SetParameters["file"] = "gestione_prodotti.php";

require("template/base.php");
?>