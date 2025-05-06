<?php
include "connection.php";
if (isset($_POST['submit'])) {
  $prodi_name = $_POST['prodi_name'];
  $q = "INSERT INTO `program_studi`(`prodi_name`) VALUES ('$prodi_name')";
  $query = mysqli_query($conn, $q);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Program Studi</title>
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
          <li class="nav-item">
            <a class="nav-link" href="#">?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-lg-6 m-auto">
    <form method="post">
      <br><br>
      <div class="card">

        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Tambah Program Studi </h1>
        </div><br>

        <label> Nama Program Studi: </label>
        <input type="text" name="prodi_name" class="form-control" required> <br>

        <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
        <a class="btn btn-info" href="index.php">Cancel</a><br>

      </div>
    </form>
  </div>
</body>

</html>
