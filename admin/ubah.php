<?php 
session_start();
if (empty($_SESSION["login"])) {
    header("location:../login.php");
}
include "Database.php";
$db = new Database();

$id = (isset($_GET['id']) ? $_GET['id'] : '');

if (isset($_POST["submit"])) {

    // input
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $noTelp = $_POST["noTelp"];
    $alamat = $_POST["alamat"];
    
    // input foto
    $img = $_FILES["img"]["name"];
    $tmp = $_FILES["img"]["tmp_name"];

    // jika tanpa foto
    if (empty($img)) {
        $sql = $db->ubahNoFoto($id,$nama,$email,$pass,$noTelp,$alamat);
        if (!$sql) {
            # code...
            header("location: index.php");
        }else {
            echo "Maaf Ada Kesalahan";
            header("location: ubah.php");
        }
    }else {
        $extensi = explode(".", $img);
        $newImg = "img-" . round(microtime(true)) . "." . end($extensi);
        $upload = move_uploaded_file($tmp, "img/". $newImg);
        $query = mysqli_query($db->conn, "SELECT * FROM data WHERE id = '$id'");
        $ubh = $query->fetch_assoc();

            //upp ke db
            if (is_file("img/". $ubh["img"])) {
                unlink("img/". $ubh["img"]);
            }
            $sql = $db->ubah($id,$nama,$email,$pass,$noTelp,$alamat,$newImg);
            if (!$sql) {
                header("location: index.php");
            }else {
                echo "maaf ada kesalahan";
            }

        
    }

    // dengan foto
    
    
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

    <title>Ubah Data</title>
  </head>
  <body>

        <section id="ubah">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-5 border border-3 border-dark rounded-3 p-3">
                        <h1>Ubah Data</h1>
                        <?php foreach($db->edit($id) as $ubh)
                        {
                         ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $ubh['id']; ?>">
                            <div class="mb-2">
                                <label for="nama" class="form-label">Nama : </label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $ubh['nama']; ?>">
                            </div>
                            <br>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email : </label>
                                <input type="text" class="form-control" name="email" id="email" value="<?= $ubh["email"]; ?>">
                            </div>
                            <br>
                            <div class="mb-2">
                                <label for="pass" class="form-label">Password : </label>
                                <input type="pass" class="form-control" name="pass" id="pass" value="<?= $ubh["pass"]; ?>">
                            </div>
                            <br>
                            <div class="mb-2">
                                <label for="noTelp" class="form-label">No Telepon : </label>
                                <input type="text" class="form-control" name="noTelp" id="noTelp" value="<?= $ubh["noTelp"]; ?>">
                            </div>
                            <br>
                            <div class="mb-2">
                                <label for="alamat" class="form-label">Alamat : </label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $ubh["alamat"]; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="img" class="form-label">Gambar : </label>
                                <img src="img/<?= $ubh["img"]; ?>" alt="" width="100">;
                                <input type="file" class="form-control" name="img" id="img">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                        </form>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>