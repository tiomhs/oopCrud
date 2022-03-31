<?php  

include "admin/Database.php";

$db = new Database();

if (isset($_POST["submit"])) {
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $status = $_POST["status"];
    $noTelp = $_POST["noTelp"];
    $alamat = $_POST["alamat"];

    $extensi = explode(".", $_FILES["img"]["name"]);
    $img = "img-" . round(microtime(true)) . "." . end($extensi);
    $tmp = $_FILES["img"]["tmp_name"];
    $upload = move_uploaded_file($tmp, "admin/img/". $img);
    if ($upload) {
        $db->tambah($nama,$email,$pass,$status,$noTelp,$alamat,$img);
        header("location: index.php");
    }else {
        echo "<script>alert('Gagal');</script>";
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

    <title>Tambah Siswa</title>
  </head>
  <body>
    
    <section id="form">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-5 border border-dark border-3 rounded-3 p-3">
                    <h1>Registrasi</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-1">
                                <label for="name" class="form-label">Nama : </label>
                                <input type="text" class="form-control" name="name" id="name" required placeholder="Masukkan Nama Anda.......">
                            </div>
                            <br>
                            <div class="mb-1">
                                <label for="email" class="form-label">Email : </label>
                                <input type="text" class="form-control" name="email" id="email" required placeholder="Masukkan Email Anda..... ">
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label">Password : </label>
                                <input type="password" class="form-control" name="password" id="password" required placeholder="Masukkan Password Anda..... ">
                            </div>
                            <br>
                                <input type="hidden" name="status">
                            <div class="mb-1">
                                <label for="noTelp" class="form-label">No Telepon : </label>
                                <input type="text" class="form-control" name="noTelp" id="noTelp" required placeholder="Masukan nomor anda....">
                            </div>
                            <br>
                            <div class="mb-1">
                                <label for="alamat" class="form-label">Alamat : </label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required placeholder="Masukan Alamat Rumah Anda...">
                            </div>
                            <div class="k">
                                <label for="img" class="form-label">Gambar : </label>
                                <input type="file" class="form-control" name="img" id="img" required>
                            </div>
                            <br>
                            <a href="login.php">Sudah Punya Akun?</a>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>