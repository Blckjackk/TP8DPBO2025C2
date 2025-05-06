<?php

class ProgramStudi extends DB
{
    function getProgramStudi()
    {
        $query = "SELECT * FROM program_studi";
        return $this->execute($query);
    }

    function add($data)
    {
        $prodi_name = $data['prodi_name'];
        $query = "INSERT INTO program_studi (prodi_name) VALUES ('$prodi_name')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM program_studi WHERE prodi_id = '$id'";
        return $this->execute($query);
    }

    function update($id, $new_name)
    {
        $query = "UPDATE program_studi SET prodi_name = '$new_name' WHERE prodi_id = '$id'";
        return $this->execute($query);
    }
}
