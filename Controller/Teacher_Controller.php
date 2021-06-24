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

        function getClasses($pdo)
        {
            //get all classes
            $ClassLoader = new ClassLoader($pdo);
            $getClasses = $ClassLoader->getClasses($pdo);
            $getClass = $ClassLoader->createClasses($getClasses);

            return $getClass;
        }

        function getSelectedTeachers($pdo)
        {
            $teacherloader = new TeacherLoader($pdo);
            $getTeacherSelect = $teacherloader->getSelectedTeachers($pdo);
            $result = $teacherloader->createSelectedTeacher($getTeacherSelect);
            return $result;
        }

        function getStudentsFromTeacher($pdo)
        {
            $StuTeachLoader = new TeacherLoader($pdo);
            $getStuTeacher = $StuTeachLoader->getStudentsFromTeacher($pdo);
            if(empty($getStuTeacher)) {
                return [];
            }
            $result = $StuTeachLoader->CreateStudentsFromTeacher($getStuTeacher);
            return $result;
        }

        function getSelectedClasses($pdo)
        {
            $selectClassLoader = new ClassLoader($pdo);
            $getSelClass = $selectClassLoader->getSelectedClasses($pdo);
            if(empty($getSelClass)) {
                return [];
            }
            $result = $selectClassLoader->createSelectedClasses($getSelClass);

            return $result;
        }

        //functions to load the teachers views
        function loadViewTeachers($pdo, $getTeachers)
        {
            if (isset($_GET['page']) && $_GET['page'] === 'teacher') {
                require 'View/teacher.php';
            }

            if (isset($_POST['teacher']) && $_POST['teacher'] === 'delete') {
                $handle = $pdo->prepare('DELETE FROM teacher WHERE id=:id');
                $handle->bindValue(':id', $_POST['id']);
                $handle->execute();
            }

        }

        function createNewTeacher($pdo, $getTeachers)
        {

            if (isset($_GET['teacher']) && $_GET['teacher'] === 'Create New') {
                $getClass = getClasses($pdo);
                require 'View/teacher_signup.php';

                if (isset($_GET['teacher']) && $_GET['teacher'] === 'Create New') {
                    if (isset($_POST['first_name'])) {
                        $handle = $pdo->prepare('INSERT INTO teacher (firstname, lastname, email) VALUES (:firstname, :lastname, :email)');
                        $handle->bindValue(':firstname', $_POST['first_name']);
                        $handle->bindValue(':lastname', $_POST['last_name']);
                        $handle->bindValue(':email', $_POST['email_address']);
                        $handle->execute();
                    }
                }
            }


        }


        function updateTeachers($pdo)
        {

            if (isset($_GET['teacher']) && $_GET['teacher'] === 'update') {
                $selectedTeacher = getSelectedTeachers($pdo);
                $stuteach = getStudentsFromTeacher($pdo);
                $getClass = getClasses($pdo);
                $selectedClass = getSelectedClasses($pdo);
                require 'View/teacher_update.php';


                if (isset($_POST['first_name']) && $_POST['button'] === 'submit') {
                    $handle = $pdo->prepare('UPDATE teacher SET id=:id, firstname=:firstname, lastname=:lastname, email=:email, class=:class  WHERE id = :id');
                    $handle->bindValue(':id', $selectedTeacher[0]->getId());
                    $handle->bindValue(':firstname', $_POST['first_name']);
                    $handle->bindValue(':lastname', $_POST['last_name']);
                    $handle->bindValue(':email', $_POST['email_address']);
                    $handle->bindValue(':class', $_POST['class']);
                    $handle->execute();
                }

                if (isset($_POST['first_name']) && $_POST['button'] === 'delete') {
                    $handle = $pdo->prepare('DELETE FROM teacher WHERE id=:id');
                    $handle->bindValue(':id', $selectedTeacher[0]->getId());
                    $handle->execute();
                }
            }
        }

        $getTeachers = getTeachers($pdo);

        //Load views
        loadViewTeachers($pdo, $getTeachers);
        createNewTeacher($pdo, $getTeachers);
        updateTeachers($pdo);


    }
}