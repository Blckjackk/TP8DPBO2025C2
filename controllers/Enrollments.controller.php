<?php
include_once("conf.php");
// include_once("models/Enrollment.class.php");
// include_once("views/Enrollment.view.php"); 

class EnrollmentController
{
  private $enrollment;

  public function __construct()
  {
    $this->enrollment = new Enrollment(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->enrollment->open();
    $this->enrollment->getEnrollments();

    $data = array();
    while ($row = $this->enrollment->getResult()) {
      array_push($data, $row);
    }

    $this->enrollment->close();

    $view = new EnrollmentView();
    $view->render($data);
  }

  public function add($data)
  {
    $this->enrollment->open();
    $this->enrollment->add($data);
    $this->enrollment->close();

    header("Location: enrollment.php");
  }

  public function delete($id)
  {
    $this->enrollment->open();
    $this->enrollment->delete($id);
    $this->enrollment->close();

    header("Location: enrollment.php");
  }
}
