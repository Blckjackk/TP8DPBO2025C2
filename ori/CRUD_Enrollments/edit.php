<?php
include "connection.php";

$enrollment_id = "";
$nim = "";
$course_id = "";
$enrollment_date = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
  if (!isset($_GET['id'])) {
    header("location:index.php");
    exit;
  }

  $enrollment_id = $_GET['id'];
  $sql = "SELECT * FROM enrollments WHERE enrollment_id = $enrollment_id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if (!$row) {
    header("location:index.php");
    exit;
  }

  $nim = $row["nim"];
  $course_id = $row["course_id"];
  $enrollment_date = $row["enrollment_date"];
} else {
  $enrollment_id = $_POST["enrollment_id"];
  $nim = $_POST["nim"];
  $course_id = $_POST["course_id"];
  $enrollment_date = $_POST["enrollment_date"];

  $sql = "UPDATE enrollments SET nim='$nim', course_id='$course_id', enrollment_date='$enrollment_date' WHERE enrollment_id='$enrollment_id'";
  $conn->query($sql);

  header("location:index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Update Enrollment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Enrollments</a>
    </div>
  </nav>

  <div class="col-lg-6 m-auto">
    <form method="post">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center">Update Enrollment</h1>
        </div><br>

        <input type="hidden" name="enrollment_id" value="<?php echo $enrollment_id; ?>" class="form-control"><br>

        <label>NIM:</label>
        <input type="text" name="nim" value="<?php echo $nim; ?>" class="form-control" required><br>

        <label>Course ID:</label>
        <input type="number" name="course_id" value="<?php echo $course_id; ?>" class="form-control" required><br>

        <label>Enrollment Date:</label>
        <input type="date" name="enrollment_date" value="<?php echo $enrollment_date; ?>" class="form-control" required><br>

        <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
        <a class="btn btn-info" href="index.php">Cancel</a><br>
      </div>
    </form>
  </div>
</body>

</html>
