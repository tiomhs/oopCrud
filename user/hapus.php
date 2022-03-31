<?php 
include "../admin/Database.php";
$db = new Database();

$id = (isset($_GET['id']) ? $_GET['id'] : '');

$query = mysqli_query($db->conn, "SELECT * FROM data WHERE id = '$id'");
$ubh = $query->fetch_assoc();

    if (is_file("../admin/img/". $ubh["img"])) {
        unlink("../admin/img/". $ubh["img"]);
    }

    $sql = $db->hapus($id);
    if (!$sql) {
        header("location: ../index.php");
    }