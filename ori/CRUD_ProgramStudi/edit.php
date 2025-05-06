<?php
include "connection.php";

$prodi_id = "";
$prodi_name = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
  if (!isset($_GET['id'])) {
    header("location: index.php");
    exit;
  }

  $prodi_id = $_GET['id'];
  $sql = "SELECT * FROM program_studi WHERE prodi_id=$prodi_id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  
  if (!$row) {
    header("location: index.php");
    exit;
  }

  $prodi_name = $row["prodi_name"];
} else {
  $prodi_id = $_POST["prodi_id"];
  $prodi_name = $_POST["prodi_name"];

  $sql = "UPDATE program_studi SET prodi_name='$prodi_name' WHERE prodi_id=$prodi_id";
  $conn->query($sql);
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ubah Program Studi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Program Studi</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-lg-6 m-auto">
    <form method="post">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Update Program Studi </h1>
        </div><br>

        <input type="hidden" name="prodi_id" value="<?php echo $prodi_id; ?>" class="form-control">

        <label> Nama Program Studi: </label>
        <input type="text" name="prodi_name" value="<?php echo $prodi_name; ?>" class="form-control" required> <br>

        <button class="btn btn-success" type="submit">Submit</button><br>
        <a class="btn btn-info" href="index.php">Cancel</a><br>
      </div>
    </form>
  </div>
</body>
</html>
