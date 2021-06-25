<?php
declare(strict_types=1);

class Class_Controller
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        //Requesting all the classes.
        function getClasses($pdo)
        {

            $ClassLoader = new ClassLoader($pdo);
            $getClasses = $ClassLoader->getClasses($pdo);
            $result = $ClassLoader->createClasses($getClasses);
            return $result;
        }

        //Requesting all the teachers from the teacherloader to display the in the selection dropdown on the 'class update' and 'class signup' pages.
        function getTeachers($pdo)
        {
            //get all teachers
            $teacherloader = new TeacherLoader($pdo);
            $getteacher = $teacherloader->getTeachers($pdo);
            $result = $teacherloader->createTeacher($getteacher);
            return $result;
        }

        //Requesting the specific teacher by ID based on getter for the 'class update' page with a left join on class to also display this.
        function getSelectedTeachers($pdo)
        {
            $classTeachloader = new ClassLoader($pdo);
            $getClassteach = $classTeachloader->getSelectedTeacher($pdo);
            $result = $classTeachloader->createSelectedTeachers($getClassteach);
            return $result;
        }

        //functions to load the class views based on the getters parameters.
        function loadViewClass($pdo)
        {
            $getclass = getClasses($pdo);

            if (isset($_GET['page']) && $_GET['page'] === 'class') {
                require 'View/class.php';
            }

            //Delete functionality on the class overview page.
            if (isset($_POST['class']) && $_POST['class'] === 'delete') {
                $handle = $pdo->prepare('DELETE FROM class WHERE id=:id');
                $handle->bindValue(':id', $_POST['id']);
                $handle->execute();
            }
        }

        //functions to load the 'create new class' view based on the getters parameters.
        function createNewClass($pdo)
        {

            if (isset($_GET['class']) && $_GET['class'] === 'Create New') {
                $getTeachers = getTeachers($pdo);
                require 'View/class_signup.php';

                //create new info in the database, based on post method.
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

        //functions to load the 'update class' view based on the getters parameters.
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

        //run the view functions, and within these, load the correct get functions to create objects from the models.
        loadViewClass($pdo);
        createNewClass($pdo);
        updateClasses($pdo);

    }
}