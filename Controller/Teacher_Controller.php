<?php
declare(strict_types=1);

class Teacher_Controller
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        function getTeachers($pdo)
        {
            //get all teachers
            $teacherloader = new TeacherLoader($pdo);
            $getteacher = $teacherloader->getTeachers($pdo);
            $teachers = $teacherloader->createTeacher($getteacher);
            return $teachers;
        }

        var_dump(getTeachers($pdo));
        require 'View/teacher.php';

    }
}