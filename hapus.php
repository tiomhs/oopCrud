<?php 
include "Database.php";
$db = new Database();

$db->hapus($_GET["id"]);
header("Location: index.php");