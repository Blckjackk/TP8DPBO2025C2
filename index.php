<?php
// Include the necessary files
include_once("controllers/Courses.controller.php");
include_once("controllers/Enrollments.controller.php");
include_once("controllers/Lecturers.controller.php");
include_once("controllers/ProgramStudi.controller.php");
include_once("controllers/Students.controller.php");

include_once("models/DB.class.php");

// Set default controller
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'students'; // Default to 'students'

// Check which controller to call
switch ($controllerName) {
    case 'courses':
        $controller = new CoursesController();
        break;
    case 'enrollments':
        $controller = new EnrollmentsController();
        break;
    case 'lecturers':
        $controller = new LecturersController();
        break;
    case 'program_studi':
        $controller = new ProgramStudiController();
        break;
    case 'students':
    default:
        $controller = new StudentsController();
        break;
}

// Call the index method or action method based on the controller
if (isset($_POST['add'])) {
    // Handle POST request (add data)
    $data = $_POST;
    $controller->add($data);
} else if (!empty($_GET['delete'])) {
    // Handle DELETE request (delete data)
    $nim = $_GET['delete'];
    $controller->delete($nim);
} else if (!empty($_GET['edit'])) {
    // Handle EDIT request (edit data)
    $nim = $_GET['edit'];
    $controller->edit($nim);
} else {
    // Default action (show list)
    $controller->index();
}
