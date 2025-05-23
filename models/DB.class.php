<?php
class DB
{
    var $db_host = "localhost";
    var $db_user = "root";  
    var $db_pass = "";  
    var $db_name = "tp_mvc";  
    var $db_link = "";  
    var $result = 0;    

    function __construct($db_host, $db_user, $db_pass, $db_name)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    function open()
    {
        // Cek koneksi terlebih dahulu sebelum melanjutkan
        $this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if (mysqli_connect_errno()) {
            // Jika koneksi gagal, tampilkan error
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function execute($query)
    {
        // Eksekusi query
        $this->result = mysqli_query($this->db_link, $query);
        return $this->result;
    }

    function getResult()
    {
        // Mengambil hasil query
        return mysqli_fetch_array($this->result);
    }

    function close()
    {
        // Tutup koneksi database
        mysqli_close($this->db_link);
    }
}
?>
