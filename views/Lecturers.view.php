<?php
class LecturerView
{
  public function render($data)
  {
    $no = 1;
    $dataLecturer = null;
    foreach ($data as $val) {
      list($lecturer_id, $name, $phone) = $val;
      $dataLecturer .= "<tr>
                          <td>" . $no++ . "</td>
                          <td>" . $name . "</td>
                          <td>" . $phone . "</td>
                          <td>
                            <a href='lecturer.php?delete=" . $lecturer_id . "' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
    }

    $tpl = new Template("templates/lecturer.html");
    $tpl->replace("JUDUL", "Lecturer List");
    $tpl->replace("NAVBAR", "templates/navbar.html");
    $tpl->replace("DATA_TABEL", $dataLecturer);
    $tpl->write();
  }
}
