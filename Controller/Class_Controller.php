<?php
declare(strict_types=1);

class Class_Controller
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        function getClasses($pdo)
        {
            //get all classes
            $ClassLoader = new ClassLoader($pdo);
            $getClasses = $ClassLoader->getClasses($pdo);
            $getClass = $ClassLoader->createClasses($getClasses);
            return $getClass;
        }

        function getTeachers($pdo)
        {
            //get all teachers
            $teacherloader = new TeacherLoader($pdo);
            $getteacher = $teacherloader->getTeachers($pdo);
            $teachers = $teacherloader->createTeacher($getteacher);
            return $teachers;
        }

        function getSelectedTeachers($pdo)
        {
            $classTeachloader = new ClassLoader($pdo);
            $getClassteach = $classTeachloader->getSelectedTeacher($pdo);
            $result = $classTeachloader->createSelectedTeachers($getClassteach);
            return $result;
        }

        //functions to load the class views
        function loadViewClass($pdo)
        {
            $getclass = getClasses($pdo);

            if (isset($_GET['page']) && $_GET['page'] === 'class') {
                require 'View/class.php';
            }


            if (isset($_POST['class']) && $_POST['class'] === 'delete') {
                $handle = $pdo->prepare('DELETE FROM class WHERE id=:id');
                $handle->bindValue(':id', $_POST['id']);
                $handle->execute();
            }
        }

        function createNewClass($pdo)
        {

            if (isset($_GET['class']) && $_GET['class'] === 'Create New') {
                $getTeachers = getTeachers($pdo);

                require 'View/class_signup.php';
                if (isset($_GET['class']) && $_GET['class'] === 'Create New') {
                    if (isset($_POST['class_name'])) {
                        $handle = $pdo->prepare('INSERT INTO class (NAME, location, teacherId ) VALUES (:name, :location, :teacherId)');
                        $handle->bindValue(':name', $_POST['class_name']);
                        $handle->bindValue(':location', $_POST['class_location']);
                        $handle->bindValue(':teacherId', $_POST['teacherId']);
                        $handle->execute();
                    }
                }
            }
        }

        function updateClasses($pdo)
        {

            if (isset($_GET['class']) && $_GET['class'] === 'update') {
                $getTeachers = getTeachers($pdo);
                $getClassTeach =  getSelectedTeachers($pdo);
                require 'View/class_update.php';


                if (isset($_POST['class_name']) && $_POST['button'] === 'submit') {
                    $handle = $pdo->prepare('UPDATE class SET name = :name, location=:location, teacherId=:teacherId WHERE id = :id');
                    $handle->bindValue(':id', $_GET['id']);
                    $handle->bindValue(':name', $_POST['class_name']);
                    $handle->bindValue(':location', $_POST['class_location']);
                    $handle->bindValue(':teacherId', $_POST['teacherId']);
                    $handle->execute();
                }

                if (isset($_POST['class_name']) && $_POST['button'] === 'delete') {
                    $handle = $pdo->prepare('DELETE FROM class WHERE id=:id');
                    $handle->bindValue(':id', $getClassTeach[0]->getId());
                    $handle->execute();
                }
            }
        }

        //run the functions
        loadViewClass($pdo);
        createNewClass($pdo);
        updateClasses($pdo);

    }
}