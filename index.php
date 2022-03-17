<?php 
include "Database.php";
$db = new Database();
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
                <div class="col-8">
                <h1>Daftar Siswa</h1>
                <a href="tambah.php">Tambah Data Siswa</a>
                    <table class="table table-bordered border-dark text-center">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;
                            foreach($db->tampil() as $data){
                            ?>
                            <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td>
                                <span class="btn btn-danger"><a href="ubah.php?id=<?= $data['id']; ?>" class="text-muted text-decoration-none text-reset">Ubah Data</a></span>
                                <span class="btn btn-primary"><a href="hapus.php?id=<?= $data['id']; ?>" class="text-muted text-decoration-none text-reset">Hapus Data</a></span>
                            </td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['noTelp']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            </tr>
                        </tbody>
                        <?php $i++;
                        }
                        $jml = $i - 1;
                        ?>
                    </table>     
                    <p class="fw-bold">Jumlah Siswa : <?= $jml; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>