<?php
include_once("conf.php");
// include_once("models/Lecturer.class.php");
// include_once("views/Lecturer.view.php");

class LecturerController
{
  private $lecturer;

  public function __construct()
  {
    $this->lecturer = new Lecturer(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->lecturer->open();
    $this->lecturer->getLecturers();

    $data = array();
    while ($row = $this->lecturer->getResult()) {
      array_push($data, $row);
    }

    $this->lecturer->close();

    $view = new LecturerView();
    $view->render($data);
  }

  public function add($data)
  {
    $this->lecturer->open();
    $this->lecturer->add($data);
    $this->lecturer->close();

    header("Location: lecturer.php");
  }

  public function delete($id)
  {
    $this->lecturer->open();
    $this->lecturer->delete($id);
    $this->lecturer->close();

    header("Location: lecturer.php");
  }
}
