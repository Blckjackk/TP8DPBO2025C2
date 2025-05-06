<?php
include "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `program_studi` WHERE prodi_id=$id";
    $conn->query($sql);
}
header('location:/bakekok/index.php');
exit;
?>
