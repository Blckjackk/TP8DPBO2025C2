<?php

class Courses extends DB
{
    function getCourses()
    {
        // Ambil semua data courses
        $query = "SELECT * FROM courses";
        return $this->execute($query);
    }

    function add($data)
    {
        // Ambil data dari form
        $course_name = $data['course_name'];
        $prodi_id = $data['prodi_id'];
        $lecturer_id = $data['lecturer_id'];

        // Query insert sesuai struktur tabel
        $query = "INSERT INTO courses (course_name, prodi_id, lecturer_id) 
                  VALUES ('$course_name', '$prodi_id', '$lecturer_id')";

        return $this->execute($query);
    }

    function delete($id)
    {
        // Menghapus course berdasarkan course_id
        $query = "DELETE FROM courses WHERE course_id = '$id'";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        // Update course berdasarkan course_id
        $course_name = $data['course_name'];
        $prodi_id = $data['prodi_id'];
        $lecturer_id = $data['lecturer_id'];

        $query = "UPDATE courses SET 
                    course_name = '$course_name', 
                    prodi_id = '$prodi_id', 
                    lecturer_id = '$lecturer_id' 
                  WHERE course_id = '$id'";

        return $this->execute($query);
    }
}
