<?php

class Lecturer extends DB
{
  private $conn;
  private $table = "lecturers";
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

  public function getLecturers()
  {
    $query = "SELECT * FROM $this->table";
    $this->result = $this->conn->query($query);
  }

  public function add($data)
  {
    $name = $this->conn->real_escape_string($data['name']);
    $phone = $this->conn->real_escape_string($data['phone']);
    $query = "INSERT INTO $this->table (name, phone) VALUES ('$name', '$phone')";
    $this->conn->query($query);
  }

  public function delete($id)
  {
    $query = "DELETE FROM $this->table WHERE lecturer_id = $id";
    $this->conn->query($query);
  }

  public function getResult()
  {
    return $this->result ? $this->result->fetch_assoc() : null;
  }
}
