<?php
declare(strict_types=1);

class Student_Controller
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        //creating class in a loader wrapped in a function to use multiple times.
        function getStudents($pdo)
        {
            //get all students
            $studentloader = new StudentLoader($pdo);
            $getstudent = $studentloader->getStudents($pdo);
            $students = $studentloader->createStudents($getstudent);

            return $students;
        }

        function getClasses($pdo)
        {
            //get all classes
            $ClassLoader = new ClassLoader($pdo);
            $getClasses = $ClassLoader->getClasses($pdo);
            $getClass = $ClassLoader->createClasses($getClasses);

            return $getClass;
        }

        function getSelectedStudent($pdo)
        {
            //Get selected student
            $studentloader = new StudentLoader($pdo);
            $getStudentSelect = $studentloader->getStudentSelect($pdo);
            $stu_select = $studentloader->createStudentSelect($getStudentSelect);

            return $stu_select;
        }


        function loadViewStudent($pdo)
        {
            $students = getStudents($pdo);
            /*
            foreach ($students as $studentobj) {
                var_dump($studentobj);
            }*/
            if (!isset($_GET['student']) && !isset($_GET['page'])) {
                require 'View/student.php';
            }
            if (isset($_GET['page']) && $_GET['page'] === 'student') {
                require 'View/student.php';
            }

            if (isset($_POST['student']) && $_POST['student'] === 'delete') {
                $handle = $pdo->prepare('DELETE FROM student WHERE id=:id');
                $handle->bindValue(':id', $_POST['id']);
                $handle->execute();
            }

        }


        function createNewStudent($pdo)
        {
            $getClass = getClasses($pdo);
            $students = getStudents($pdo);
            if (isset($_GET['student']) && $_GET['student'] === 'Create New') {
                if (isset($_POST['first_name'])) {
                    $handle = $pdo->prepare('INSERT INTO student (firstname, lastname, email, class ) VALUES (:firstname, :lastname, :email, :class )');
                    $handle->bindValue(':firstname', $_POST['first_name']);
                    $handle->bindValue(':lastname', $_POST['last_name']);
                    $handle->bindValue(':email', $_POST['email_address']);
                    $handle->bindValue(':class', $_POST['class']);
                    $handle->execute();
                }
                require 'View/student_signup.php';
            }

        }

        function updateStudent($pdo)
        {
            if (isset($_GET['student']) && $_GET['student'] === 'update') {
                $getClass = getClasses($pdo);
                $stu_select = getSelectedStudent($pdo);
                require 'View/student_update.php';

                if (isset($_POST['first_name']) && $_POST['button'] === 'submit') {
                    $handle = $pdo->prepare('UPDATE student SET id=:id, firstname=:firstname, lastname=:lastname, email=:email, class=:class  WHERE id = :id');
                    $handle->bindValue(':id', $stu_select[0]->getSId());
                    $handle->bindValue(':firstname', $_POST['first_name']);
                    $handle->bindValue(':lastname', $_POST['last_name']);
                    $handle->bindValue(':email', $_POST['email_address']);
                    $handle->bindValue(':class', $_POST['class']);
                    $handle->execute();
                }

                if (isset($_POST['first_name']) && $_POST['button'] === 'delete') {
                    $handle = $pdo->prepare('DELETE FROM student WHERE id=:id');
                    $handle->bindValue(':id', $stu_select[0]->getSId());
                    $handle->execute();
                }
            }
        }

        //Load views

            loadViewStudent($pdo);

        updateStudent($pdo);
        createNewStudent($pdo);
    }
}