<?php
declare(strict_types=1);

//include all your model files here
require 'Model/Pdo.php';
require 'Model/StudentLoader.php';
require 'Model/ClassLoader.php';
require 'Model/TeacherLoader.php';


//include all your controllers here
require 'Controller/Homepage_Controller.php';
require 'Controller/Student_Controller.php';
require 'Controller/Teacher_Controller.php';
//require 'Controller/Class_Controller.php';

$controller = new Homepage_Controller();

//Check if student and all routing of student is selected
if (isset($_GET['page']) && $_GET['page'] === 'student' || isset($_GET['student']) && $_GET['student'] === 'Create New' || isset($_GET['student']) && $_GET['student'] === 'update') {
    $controller = new Student_Controller();
}

//Check if Teacher and all routing of teacher is selected
if (isset($_GET['page']) && $_GET['page'] === 'teacher' || isset($_GET['teacher']) && $_GET['teacher'] === 'Create New' || isset($_GET['teacher']) && $_GET['teacher'] === 'update') {
    $controller = new Teacher_Controller();
}

$controller->render($_GET, $_POST);