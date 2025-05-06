<?php

class CourseController
{
  private $course;

  public function __construct()
  {
    $this->course = new Course(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->course->open();
    $this->course->getCourses();

    $data = array();
    while ($row = $this->course->getResult()) {
      array_push($data, $row);
    }

    $this->course->close();

    $view = new CourseView();
    $view->render($data);
  }

  public function add($data)
  {
    $this->course->open();
    $this->course->add($data);
    $this->course->close();

    header("Location: course.php");
  }

  public function edit($id)
  {
    $this->course->open();
    $this->course->toggleStatus($id);
    $this->course->close();

    header("Location: course.php");
  }

  public function delete($id)
  {
    $this->course->open();
    $this->course->delete($id);
    $this->course->close();

    header("Location: course.php");
  }
}
