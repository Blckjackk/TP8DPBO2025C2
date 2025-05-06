<?php
class EnrollmentView
{
  public function render($data)
  {
    $content = '';
    foreach ($data as $row) {
      $content .= "
        <tr>
          <td>{$row['enrollment_id']}</td>
          <td>{$row['nim']}</td>
          <td>{$row['course_id']}</td>
          <td>{$row['enrollment_date']}</td>
          <td>
            <a href='enrollment.php?delete={$row['enrollment_id']}' class='btn btn-danger btn-sm'>Delete</a>
          </td>
        </tr>";
    }

    $template = new Template("templates/enrollment.html");
    // $template = file_get_contents("templates/enrollment.html");
    $template = str_replace("DATA_TABEL", $content, $template);
    echo $template;
  }
}
