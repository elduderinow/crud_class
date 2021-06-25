<?php
declare(strict_types=1);

class Teacher
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;

    public function __construct(int $id, string $firstname, string $lastname, string $email)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}

class TeacherSelect
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private int $classId;
    private string $className;
    private string $location;


    public function __construct(int $id, string $firstname, string $lastname, string $email, int $classId, string $className, string $location)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->classId = $classId;
        $this->className = $className;
        $this->location = $location;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
}

class StudentFromTeacher
{
    private int $s_id;
    private string $s_firstname;
    private string $s_lastname;


    public function __construct(int $s_id, string $s_firstname, string $s_lastname)
    {
        $this->s_id = $s_id;
        $this->s_firstname = $s_firstname;
        $this->s_lastname = $s_lastname;

    }

    public function getId(): int
    {
        return $this->s_id;
    }

    public function getFirstName(): string
    {
        return $this->s_firstname;
    }

    public function getLastName(): string
    {
        return $this->s_lastname;
    }
}


class TeacherLoader
{
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all teachers info
    public function getTeachers($pdo)
    {
        $handle = $pdo->prepare('SELECT * FROM teacher');
        $handle->execute();
        $result = $handle->fetchAll();
        return $result;
    }

    // Create teacher class
    public function createTeacher($getteacher)
    {
        foreach ($getteacher as $teacher) {
            $new_teacher = new Teacher((int)$teacher['id'], $teacher['firstname'], $teacher['lastname'], $teacher['email']);
            $result[] = $new_teacher;
        };
        return $result;
    }

    // Get selected Teacher by teacher id.
    public function getSelectedTeachers($pdo)
    {
        $handle = $pdo->prepare('SELECT teacher.id id, firstname, lastname, email,class.id classId, class.name, location FROM teacher LEFT JOIN class ON teacher.id = class.teacherId WHERE teacher.id = :id');
        $handle->bindValue(':id', $_GET['id']);
        $handle->execute();
        $result = $handle->fetchAll();
        return $result;
    }

    // Create Selected Teacher class
    public function createSelectedTeacher($getTeacherSelect)
    {
        foreach ($getTeacherSelect as $teacher) {
            $new_teacher = new TeacherSelect((int)$teacher['id'], $teacher['firstname'], $teacher['lastname'], $teacher['email'], (int)$teacher['classId'], $teacher['name'], $teacher['location']);
            $result[] = $new_teacher;
        };
        return $result;
    }

    // Get all students connected to 1 teacher by teacher id.
    public function getStudentsFromTeacher($pdo)
    {
        $handle = $pdo->prepare('SELECT student.id s_id, student.firstname s_firstname, student.lastname s_lastname FROM student LEFT JOIN class ON student.class = class.id LEFT JOIN teacher ON teacher.id = class.teacherId WHERE teacher.id = :id');
        $handle->bindValue(':id', $_GET['id']);
        $handle->execute();
        $result = $handle->fetchAll();
        return $result;
    }

    //Create the 'selected students from teacher id' class
    public function CreateStudentsFromTeacher($getStuTeacher)
    {
        foreach ($getStuTeacher as $stuteach_select) {
            $new_stuteacherSelect = new StudentFromTeacher((int)$stuteach_select['s_id'], $stuteach_select['s_firstname'], $stuteach_select['s_lastname']);
            $result[] = $new_stuteacherSelect;
        };
        return $result;
    }

}