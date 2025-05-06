<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM enrollments WHERE enrollment_id = $id";
    $conn->query($sql);
}

header('Location: /bakekok/index.php');
exit;
