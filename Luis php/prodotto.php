<?php
require_once 'required.php';

$SetParameters["titolo"] = "Prodotto"; // Inserire nome prodotto
$SetParameters["file"] = "prodotto_singolo.php";
$SetParameters["prodotto"] = $dbh->getProdotto($_GET["id"]);

require("template/base.php");
?>