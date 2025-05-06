<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>Rumah</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Students</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-4">
    <div class="col-1 my-3">
      <a class="btn btn-primary" href="create.php">Add New</a>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NIM</th>
          <th>PHONE</th>
          <th>JOIN DATE</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $students->fetch_assoc()) {
          echo "
            <tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['nim']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['join_date']}</td>
              <td>
                <a class='btn btn-success' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger' href='delete.php?id={$row['id']}'>Delete</a>
              </td>
            </tr>
          ";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
