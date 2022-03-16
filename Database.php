<?php 

class Database{
    private $host = "localhost";
    private $uname = "root";
    private $pass = "";
    private $db = "oopcrud";
    protected $conn;

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

    function tampil(){
        $sql = "SELECT * FROM data";
        $query = mysqli_query($this->conn,$sql);
        while($d = mysqli_fetch_assoc($query)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tambah($nama,$email,$noTelp,$alamat){
        $sql = "INSERT INTO data VALUES('','$nama','$email','$noTelp','$alamat')";
        mysqli_query($this->conn,$sql);
    }

    function hapus($id){
        $sql = "DELETE FROM data WHERE id='$id'";
        mysqli_query($this->conn,$sql);
    }

    function edit($id){
        $data = mysqli_query($this->conn,"SELECT * FROM data WHERE id='$id'");
        while ($ubh = mysqli_fetch_array($data) ) {
            $res[] = $ubh;
        }
        return $res;
    }

    function ubah($id,$nama,$email,$noTelp,$alamat){
        $sql = "UPDATE data SET nama='$nama',email='$email',noTelp='$noTelp',alamat='$alamat' WHERE id='$id'";
        mysqli_query($this->conn,$sql);
    }
}
