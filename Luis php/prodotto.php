<?php
require_once 'required.php';

$SetParameters["file"] = "prodotto_singolo.php";
$SetParameters["prodotto"] = $dbh->getProdotto($_GET["id"]);

require("template/base.php");
?>