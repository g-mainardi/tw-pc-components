<?php
session_start();
//define("UPLOAD_DIR", "./upload/");
require_once("functions.php");
require_once("database/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "hd_progetto", 3306);
?>