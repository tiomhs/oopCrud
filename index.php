<?php 

session_start();
include "admin/Database.php";
$db = new Database();

if ( isset($_POST["submit"])) {
    
    // tangkap dulu
    $nama = $_POST["nama"];
    $pass = $_POST["pass"];

    $sql = mysqli_query($db->conn, "SELECT * FROM data WHERE nama='$nama' and pass='$pass'");

        if ($sql->num_rows > 0) {
            $row = mysqli_fetch_assoc($sql);
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];

            if ($row["status"] == "admin") {
                header("location: admin/index.php");
            }elseif($row["status"] == "user"){
                header("location: user/index.php");
            }
        }else{
            echo "Password atau Username anda salah";
        }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>

  <section id="form">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-5 border border-dark border-3 rounded-3 p-5">
                    <h1 class="mb-3">Login </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-1">
                                <label for="nama" class="form-label">Nama : </label>
                                <input type="text" class="form-control" name="nama" id="nama" required placeholder="Masukkan Nama Anda.......">
                            </div>
                            <br>
                            <div class="mb-1">
                                <label for="pass" class="form-label">Password : </label>
                                <input type="password" class="form-control" name="pass" id="pass" required placeholder="Masukkan Email Anda..... ">
                            </div>
                            <br>
                            <a href="regis.php">Belum punya akun?</a>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>