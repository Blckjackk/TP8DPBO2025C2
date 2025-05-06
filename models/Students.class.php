<?php

include_once('DB.class.php'); // atau sesuaikan path-nya


class Students extends DB
{
    var $nim = '';
    var $name = '';
    var $phone = '';
    var $join_date = '';
    var $prodi_id = '';

    function __construct($nim = '', $name = '', $phone = '', $join_date = '', $prodi_id = '')
    {
        $this->nim = $nim;
        $this->name = $name;
        $this->phone = $phone;
        $this->join_date = $join_date;
        $this->prodi_id = $prodi_id;
    }

    function getStudents()
    {
        // Sesuaikan kolom dengan yang ada di tabel
        $query = "SELECT nim, name, phone, join_date, prodi_id FROM students";
        return $this->execute($query);
    }



    function add($data)
    {
        $nim = $data['nim'];
        $name = $data['name'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $prodi_id = $data['prodi_id'];

        $query = "INSERT INTO students (nim, name, phone, join_date, prodi_id) 
                  VALUES ('$nim', '$name', '$phone', '$join_date', '$prodi_id')";

        return $this->execute($query);
    }

    function delete($nim)
    {
        $query = "DELETE FROM students WHERE nim = '$nim'";
        return $this->execute($query);
    }



}
