<?php
declare(strict_types=1);

class Student_Controller
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        //Requesting all the students
        function getStudents($pdo)
        {
            //get all students
            $studentloader = new StudentLoader($pdo);
            $getstudent = $studentloader->getStudents($pdo);
            $result = $studentloader->createStudents($getstudent);
            return $result;
        }

        //Requesting all the classes.
        function getClasses($pdo)
        {
            //get all classes
            $ClassLoader = new ClassLoader($pdo);
            $getClasses = $ClassLoader->getClasses($pdo);
            $result = $ClassLoader->createClasses($getClasses);
            return $result;
        }

        //Requesting correct student based on the getter ID.
        function getSelectedStudent($pdo)
        {
            //Get selected student
            $studentloader = new StudentLoader($pdo);
            $getStudentSelect = $studentloader->getStudentSelect($pdo);
            $result = $studentloader->createStudentSelect($getStudentSelect);
            return $result;
        }

        //Load the student view.
        function loadViewStudent($pdo)
        {
            $students = getStudents($pdo);

            //Little workaround for also displaying the student page immediately on the homepage.
            //I started working on the 3 pages, student, teacher and class, but the homepage itself was empty.
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

        //Load the create new student page
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

        //Loading the update student page
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

        //call in the functions to load the views and actions.
        loadViewStudent($pdo);
        updateStudent($pdo);
        createNewStudent($pdo);
    }
}