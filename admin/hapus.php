<?php 
include "Database.php";
$db = new Database();

$id = (isset($_GET['id']) ? $_GET['id'] : '');

$query = mysqli_query($db->conn, "SELECT * FROM data WHERE id = '$id'");
$ubh = $query->fetch_assoc();

    if (is_file("img/". $ubh["img"])) {
        unlink("img/". $ubh["img"]);
    }

    $sql = $db->hapus($id);
    if (!$sql) {
        header("location: index.php");
    }