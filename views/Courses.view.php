<?php

class CoursesView
{
  public function render($data)
  {
    $no = 1;
    $dataCourses = null;
    foreach ($data as $row) {
      list($course_id, $course_name, $prodi_id, $lecturer_id) = $row;

      $dataCourses .= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $course_name . "</td>
        <td>" . $prodi_id . "</td>
        <td>" . $lecturer_id . "</td>
        <td>
          <a href='courses.php?id_edit=" . $course_id . "' class='btn btn-warning'>Edit</a>
          <a href='courses.php?id_hapus=" . $course_id . "' class='btn btn-danger'>Hapus</a>
        </td>
      </tr>";
    }

    $tpl = new Template("templates/courses.html");
    $tpl->replace("JUDUL", "Courses");
    $tpl->replace("DATA_TABEL", $dataCourses);
    $tpl->write();
  }
}
