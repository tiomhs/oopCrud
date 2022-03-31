<?php 

class Database{
    private $host = "localhost";
    private $uname = "root";
    private $pass = "";
    private $db = "oopcrud";
    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->uname,$this->pass, $this->db);
        mysqli_select_db($this->conn, $this->db);

        try {
            $this->conn;
        } catch ( Exception $e) {
            echo "Connection Failed" . $e->getMessage();
        }
    }

    // function login($email,$pass){
    //     $sql = mysqli_query($this->conn, "SELECT * FROM data WHERE email='$email' and pass='$pass'");

    //     if ($sql->num_rows > 0) {
    //         $_SESSION["login"] = true;
    //         $row = mysqli_fetch_assoc($sql);
    //         if ($row["status"] == "admin") {
    //             header("location: admin/index.php");
    //         }elseif($row["status"] == "user"){
    //             header("location: user/index.html");
    //         }
    //     }else{
    //         return false;
    //     }

    // }

    function tampil(){
        $sql = "SELECT * FROM data";
        $query = mysqli_query($this->conn,$sql);
        while($d = mysqli_fetch_assoc($query)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampilUser($id){
        $hasil = [];
        $sql = "SELECT * FROM data WHERE id='$id'";
        $query = mysqli_query($this->conn,$sql);
        while($d = mysqli_fetch_assoc($query)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    
    function tambah($nama,$email,$pass,$status,$noTelp,$alamat,$img){
        $status = "user";
        $db = $this->conn;
        $db->query("INSERT INTO data VALUES('','$nama','$email','$pass','$status','$noTelp','$alamat','$img')") or die($db->error);
    }

    function hapus($id){
        $sql = "DELETE FROM data WHERE id='$id'";
        mysqli_query($this->conn,$sql);
    }

    function edit($id){
        $res = [];
        $data = mysqli_query($this->conn,"SELECT * FROM data WHERE id='$id'");
        while ($ubh = mysqli_fetch_array($data) ) {
            $res[] = $ubh;
        }
        return $res;
    }

    function ubah($id,$nama,$email,$pass,$noTelp,$alamat,$img){
        $sql = "UPDATE data SET nama='$nama',email='$email',pass='$pass',noTelp='$noTelp',alamat='$alamat', img='$img' WHERE id='$id'";
        mysqli_query($this->conn,$sql);
    }

    function ubahNoFoto($id,$nama,$email,$pass,$noTelp,$alamat){
        $sql = "UPDATE data SET nama='$nama',email='$email',pass='$pass',noTelp='$noTelp',alamat='$alamat' WHERE id='$id'";
        mysqli_query($this->conn,$sql);
    }
}
