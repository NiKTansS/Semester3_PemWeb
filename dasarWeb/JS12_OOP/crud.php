<?php 
require_once 'database.php';

class Crud
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function create($jabatan, $keterangan)
    {
        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";
        $result = pg_query($this->db->conn, $query);
        return $result;
    }

    public function read()
    {
        $query = "SELECT * FROM jabatan";
        $result = pg_query($this->db->conn, $query);
        
        $data = [];
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        
        return $data;
    }
    
    public function readById($id)
    {
        $query = "SELECT * FROM jabatan WHERE id = '$id'";
        $result = pg_query($this->db->conn, $query);
        
        if (pg_num_rows($result) == 1) {
            return pg_fetch_assoc($result);
        } else {
            return null;
        }
    }
 
    public function update($id, $jabatan, $keterangan)
    {
        $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";
        $result = pg_query($this->db->conn, $query);
        return $result;
    }

    public function delete($id)
    {
        $query = "DELETE FROM jabatan WHERE id = '$id'";
        $result = pg_query($this->db->conn, $query);
        return $result;
    }
}
