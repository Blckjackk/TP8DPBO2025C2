<?php
include_once("Templates.class.php");

class StudentsView
{
  public function render($data)
  {
    $no = 1;
    $studentContent = '';

    foreach ($data as $val) {
      list( $nim, $name, $phone, $join_date, $prodi_id) = $val;

      $studentContent .= "<tr>
                            <td>" . $no++ . "</td>
                            <td>" . $nim . "</td>
                            <td>" . $name . "</td>
                            <td>" . $phone . "</td>
                            <td>" . $join_date . "</td>
                            <td>" . $prodi_id . "</td>
                            <td>
                              <a href='students.php?edit=$nim' class='btn btn-warning btn-sm'>Edit</a>
                              <a href='students.php?delete=$nim' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                          </tr>";
    }

    $tpl = new Template("templates/students.html");
    $tpl->replace("JUDUL", "Student List");
    $tpl->replace("DATA_TABEL", $studentContent);
    $tpl->write();
  }
}
