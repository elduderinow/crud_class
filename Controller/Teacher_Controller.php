<?php
declare(strict_types=1);

class Teacher_Controller
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        //Requesting all the teachers
        function getTeachers($pdo)
        {
            //get all teachers
            $teacherloader = new TeacherLoader($pdo);
            $getteacher = $teacherloader->getTeachers($pdo);
            $result = $teacherloader->createTeacher($getteacher);
            return $result;
        }

        //Requesting all the classes
        function getClasses($pdo)
        {
            //get all classes
            $ClassLoader = new ClassLoader($pdo);
            $getClasses = $ClassLoader->getClasses($pdo);
            $result = $ClassLoader->createClasses($getClasses);
            return $result;
        }

        //Requesting the selected teachers info.
        function getSelectedTeachers($pdo)
        {
            $teacherloader = new TeacherLoader($pdo);
            $getTeacherSelect = $teacherloader->getSelectedTeachers($pdo);
            $result = $teacherloader->createSelectedTeacher($getTeacherSelect);
            return $result;
        }

        //Requesting all the students for a teacher based on the selected teachers ID from the getter.
        function getStudentsFromTeacher($pdo)
        {
            $StuTeachLoader = new TeacherLoader($pdo);
            $getStuTeacher = $StuTeachLoader->getStudentsFromTeacher($pdo);

            //If a teacher has no students, return a empty array because the teachers view expects an array to loop through.
            if(empty($getStuTeacher)) {
                return [];
            }
            $result = $StuTeachLoader->CreateStudentsFromTeacher($getStuTeacher);
            return $result;
        }

        //Requesting all the classes connected to a teacher.
        function getSelectedClasses($pdo)
        {
            $selectClassLoader = new ClassLoader($pdo);
            $getSelClass = $selectClassLoader->getSelectedClasses($pdo);

            //If a teacher has no assigned classes, return a empty array, bc the view expects and array.
            if(empty($getSelClass)) {
                return [];
            }
            $result = $selectClassLoader->createSelectedClasses($getSelClass);
            return $result;
        }

        //Load 'teacher' view
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

        //Load 'create new teacher' view
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

        //Load 'update teacher' view
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