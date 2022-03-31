<?php 
session_start();
if (empty($_SESSION["login"])) {
    header("location:../index.php");
}
$id =  $_SESSION["id"];

include "../admin/Database.php";
$db = new Database();


$data = $db->tampilUser($id);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Daftar Siswa</title>
  </head>
  <body>

   
    <section id="table">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col">
                <h1>Hai <?= $data[0]["nama"]; ?></h1>
                    <table class="table table-bordered border-dark text-center align-middle">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td scope="row">1</td>
                            <td>
                                <span class="btn btn-danger"><a href="ubah.php?id=<?= $data[0]['id']; ?>" class="text-muted text-decoration-none text-reset">Ubah Data</a></span>
                                <span class="btn btn-primary"><a href="hapus.php?id=<?= $data[0]['id']; ?>" class="text-muted text-decoration-none text-reset">Hapus Data</a></span>
                            </td>
                            <td><?= $data[0]["nama"]; ?></td>
                            <td><?= $data[0]['email']; ?></td>
                            <td><?= $data[0]['pass']; ?></td>
                            <td><?= $data[0]['noTelp']; ?></td>
                            <td><?= $data[0]['alamat']; ?></td>
                            <td><img src="../admin/img/<?= $data[0]["img"]; ?>" alt="" width="100"></td>
                            </tr>
                        </tbody>
                    </table>     
                </div>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>