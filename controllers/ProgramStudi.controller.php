<?php
include_once("conf.php");
// include_once("models/ProgramStudi.class.php");
// include_once("views/ProgramStudi.view.php");

class ProgramStudiController
{
    private $prodi;

    function __construct()
    {
        $this->prodi = new ProgramStudi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->prodi->open();
        $this->prodi->getProgramStudi();

        $data = array();
        while ($row = $this->prodi->getResult()) {
            array_push($data, $row);
        }

        $this->prodi->close();

        $view = new ProgramStudiView();
        $view->render($data);
    }

    public function add($data)
    {
        $this->prodi->open();
        $this->prodi->add($data);
        $this->prodi->close();
        header("location:program_studi.php");
    }

    public function delete($id)
    {
        $this->prodi->open();
        $this->prodi->delete($id);
        $this->prodi->close();
        header("location:program_studi.php");
    }

    public function update($id, $new_name)
    {
        $this->prodi->open();
        $this->prodi->update($id, $new_name);
        $this->prodi->close();
        header("location:program_studi.php");
    }
}
