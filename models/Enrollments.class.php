<?php

class Enrollment extends DB
{
  private $conn;
  private $table = "enrollments";
  private $result = null;

  public function __construct($host, $user, $pass, $db)
  {
    $this->conn = new mysqli($host, $user, $pass, $db);
  }

  public function open()
  {
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function close()
  {
    $this->conn->close();
  }

  public function getEnrollments()
  {
    $query = "SELECT * FROM $this->table";
    $this->result = $this->conn->query($query);
  }

  public function add($data)
  {
    $nim = $this->conn->real_escape_string($data['nim']);
    $course_id = $this->conn->real_escape_string($data['course_id']);
    $enrollment_date = $this->conn->real_escape_string($data['enrollment_date']);
    $query = "INSERT INTO $this->table (nim, course_id, enrollment_date) 
              VALUES ('$nim', '$course_id', '$enrollment_date')";
    $this->conn->query($query);
  }

  public function delete($id)
  {
    $query = "DELETE FROM $this->table WHERE enrollment_id = $id";
    $this->conn->query($query);
  }

  public function getResult()
  {
    return $this->result ? $this->result->fetch_assoc() : null;
  }
}
