<?php 
include "Database.php";
$db = new Database();

if (isset($_POST["submit"])) {
    
    $db->ubah($_POST['id'],$_POST['nama'],$_POST['email'],$_POST['noTelp'], $_POST['alamat']);
    if(!$db){
        echo "Query Gagal";
    }else {
        header("Location: index.php");
    }

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
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
                        <?php foreach($db->edit($_GET["id"]) as $ubh)
                        {
                         ?>
                        <form action="" method="post">
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
                                <label for="noTelp" class="form-label">No Telepon : </label>
                                <input type="text" class="form-control" name="noTelp" id="noTelp" value="<?= $ubh["noTelp"]; ?>">
                            </div>
                            <br>
                            <div class="mb-2">
                                <label for="alamat" class="form-label">Alamat : </label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $ubh["alamat"]; ?>">
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