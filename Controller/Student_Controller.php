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



        //load the view
        if (isset($_GET['page']) && $_GET['page'] === 'student') {
            $students = getStudents($pdo);
            require 'View/student.php';
        }

        //load the Create New student view based on getter.
        if (isset($_GET['student']) && $_GET['student'] === 'Create New') {
            $students = getStudents($pdo);
            $getClass = getClasses($pdo);

            //assign the $_POST to a session so the input values get remembered.
            if (count($_POST) > 0) {
                $_SESSION['new-student']['fistname'] = $_POST['first_name'];
                $_SESSION['new-student']['lastname'] = $_POST['last_name'];
                $_SESSION['new-student']['email'] = $_POST['email_address'];
                $_SESSION['new-student']['class'] = $_POST['class'];
            }

            //writes data to the SQL server with the correct bindings.
            if (isset($_SESSION['new-student'])) {
                $handle = $pdo->prepare('INSERT INTO student (id, firstname, lastname, email, class ) VALUES (:id, :firstname, :lastname, :email, :class )');
                $handle->bindValue(':id', count($students) + 1);
                $handle->bindValue(':firstname', $_SESSION['new-student']['fistname']);
                $handle->bindValue(':lastname', $_SESSION['new-student']['lastname']);
                $handle->bindValue(':email', $_SESSION['new-student']['email']);
                $handle->bindValue(':class', $_SESSION['new-student']['class']);
                $handle->execute();
            }
            require 'View/student_signup.php';
        }

        //load the Detailed student page where the user can also update and delete the student.
        if (isset($_GET['student']) && $_GET['student'] === 'update') {
            $stu_select = getSelectedStudent($pdo);
            $getClass = getClasses($pdo);


            if (count($_POST) > 0) {
                $_SESSION['update-student']['fistname'] = $_POST['first_name'];
                $_SESSION['update-student']['lastname'] = $_POST['last_name'];
                $_SESSION['update-student']['email'] = $_POST['email_address'];
                $_SESSION['update-student']['class'] = $_POST['class'];
                $_SESSION['update-student']['button'] = $_POST['button'];
            }

            if (isset($_SESSION['update-student']) && $_SESSION['update-student']['button'] === 'submit') {
                $handle = $pdo->prepare('UPDATE student SET id=:id, firstname=:firstname, lastname=:lastname, email=:email, class=:class  WHERE id = :id');
                $handle->bindValue(':id', $stu_select[0]->getSId());
                $handle->bindValue(':firstname',  $_SESSION['update-student']['fistname']);
                $handle->bindValue(':lastname',  $_SESSION['update-student']['lastname']);
                $handle->bindValue(':email', $_SESSION['update-student']['email']);
                $handle->bindValue(':class', $_SESSION['update-student']['class']);
                $handle->execute();
            }

            if (isset($_SESSION['update-student']) && $_SESSION['update-student']['button'] === 'delete') {
                $handle = $pdo->prepare('DELETE FROM student WHERE id=:id');
                $handle->bindValue(':id', $stu_select[0]->getSId());
                $handle->execute();
            }


            require 'View/student_update.php';

        }

    }
}