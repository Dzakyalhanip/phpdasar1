<?php
Class MyDb {
    public function __construct()
    {
        $host = "localhost";
        $dbname = "db";
        $username = "root";
        $password = "abc123";
        //metode PDO
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM db_warga");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function add_data($no_ktp,$nama_lengkap,$alamat_lengkap,$no_hp)
    {
        $data = $this->db->prepare('INSERT INTO db_warga (no_ktp,nama_lengkap,alamat_lengkap,no_hp) VALUES (?, ?, ?, ?)');
        
        $data->bindParam(1, $no_ktp);
        $data->bindParam(2, $nama_lengkap);
        $data->bindParam(3, $alamat_lengkap);
        $data->bindParam(4, $no_hp);

        $data->execute();
        return $data->rowCount();
    }
    public function get_by_id($id_warga){
        $query = $this->db->prepare("SELECT * FROM db_warga where id=?");
        $query->bindParam(1, $id_warga);
        $query->execute();
        return $query->fetch();
    }
    public function delete($id_warga)
    {
        $query = $this->db->prepare("DELETE FROM db_warga where id=?");
        $query->bindParam(1, $id_warga);
        $query->execute();
        return $query->rowCount();
    }
}
// var_dump("no errror");

?>