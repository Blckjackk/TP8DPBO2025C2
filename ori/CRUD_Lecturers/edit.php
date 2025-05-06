<?php
include "connection.php";

$lecturer_id = "";
$name = "";
$phone = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
  if (!isset($_GET['id'])) {
    header("location: index.php");
    exit;
  }

  $lecturer_id = $_GET['id'];
  $sql = "SELECT * FROM lecturers WHERE lecturer_id = $lecturer_id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if (!$row) {
    header("location: index.php");
    exit;
  }

  $name = $row["name"];
  $phone = $row["phone"];
} else {
  $lecturer_id = $_POST["lecturer_id"];
  $name = $_POST["name"];
  $phone = $_POST["phone"];

  $sql = "UPDATE lecturers SET name='$name', phone='$phone' WHERE lecturer_id = '$lecturer_id'";
  $result = $conn->query($sql);

  header("location: index.php");
  exit;
}
?>
