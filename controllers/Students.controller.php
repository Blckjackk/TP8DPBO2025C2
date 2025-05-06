<?php
// Pastikan kamu meng-include file Conf.php dengan benar
include_once(__DIR__ . '/../Conf.php');  // Sesuaikan dengan path yang benar
include_once(__DIR__ . '/../models/Students.class.php');
include_once(__DIR__ . '/../views/Students.view.php');

class StudentsController
{
    private $students;

    function __construct()
    {
        // Menggunakan kredensial dari Conf untuk koneksi database
        $this->students = new Students(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->students->open();
        $this->students->getStudents();

        $data = array();
        while ($row = $this->students->getResult()) {
            array_push($data, $row);
        }

        $this->students->close();

        $view = new StudentsView();
        $view->render($data);
    }

    public function add($data)
    {
        $this->students->open();
        $this->students->add($data);
        $this->students->close();

        header("location:students.php");
    }

    public function edit($nim)
    {
        $this->students->open();
        $this->students->statusStudents($nim);
        $this->students->close();

        header("location:students.php");
    }

    public function delete($nim)
    {
        $this->students->open();
        $this->students->delete($nim);
        $this->students->close();

        header("location:students.php");
    }
}
?>
