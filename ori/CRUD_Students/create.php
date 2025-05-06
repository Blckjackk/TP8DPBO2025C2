<?php
include "connection.php";

// Handling form submission
if (isset($_POST['submit'])) {
  // Retrieving form data
  $name = $_POST['name'];
  $nim = $_POST['nim'];
  $phone = $_POST['phone'];
  $join_date = $_POST['join_date'];
  $prodi_id = isset($_POST['prodi_id']) ? $_POST['prodi_id'] : null;  // Optional field

  // Prepared statement to insert data into 'students' table
  $sql = "INSERT INTO `students`(`nim`, `name`, `phone`, `join_date`, `prodi_id`) 
          VALUES (?, ?, ?, ?, ?)";
  
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssssi", $nim, $name, $phone, $join_date, $prodi_id);
    
    if ($stmt->execute()) {
      // Redirect after successful insertion
      header('Location: index.php');
      exit;
    } else {
      echo "Error: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "Error preparing the query: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Students</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
          <h1 class="text-white text-center">Create Student</h1>
        </div><br>

        <label for="name">NAME:</label>
        <input type="text" name="name" class="form-control" required> <br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" class="form-control" required> <br>

        <label for="phone">PHONE:</label>
        <input type="text" name="phone" class="form-control" required> <br>

        <label for="join_date">JOIN DATE:</label>
        <input type="date" name="join_date" class="form-control" required> <br>

        <label for="prodi_id">PROGRAM STUDI:</label>
        <select name="prodi_id" class="form-control">
          <option value="">Select Program Studi (Optional)</option>
          <!-- Assuming you have a table called 'program_studi' -->
          <?php
            // Fetching available prodi_id values from the database
            $result = $conn->query("SELECT prodi_id, prodi_name FROM program_studi");
            while ($row = $result->fetch_assoc()) {
              echo "<option value='{$row['prodi_id']}'>{$row['prodi_name']}</option>";
            }
          ?>
        </select>
        <br>

        <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
        <a class="btn btn-info" href="index.php">Cancel</a><br>

      </div>
    </form>
  </div>

</body>

</html>
