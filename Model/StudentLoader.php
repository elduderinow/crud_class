<?php
declare(strict_types=1);

class student
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private int $class;

    public function __construct(int $id, string $firstname, string $lastname, string $email, int $class)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->class = $class;
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

    public function getClass(): int
    {
        return $this->class;
    }
}

class studentSelect
{
    private int $s_id;
    private string $s_firstname;
    private string $s_lastname;
    private string $s_email;
    private int $classId;
    private string $className;
    private string $location;
    private int $t_id;
    private string $t_firstname;
    private string $t_lastname;


    public function __construct(int $s_id, string $s_firstname, string $s_lastname, string $s_email,int $classId, string $className, string $location, int $t_id, string $t_firstname, string $t_lastname)
    {
        $this->s_id = $s_id;
        $this->s_firstname = $s_firstname;
        $this->s_lastname = $s_lastname;
        $this->s_email = $s_email;
        $this->classId = $classId;
        $this->className = $className;
        $this->location = $location;
        $this->t_id = $t_id;
        $this->t_firstname = $t_firstname;
        $this->t_lastname = $t_lastname;
    }


    /**
     * @return int
     */
    public function getSId(): int
    {
        return $this->s_id;
    }

    /**
     * @return string
     */
    public function getSFirstname(): string
    {
        return $this->s_firstname;
    }

    /**
     * @return string
     */
    public function getSLastname(): string
    {
        return $this->s_lastname;
    }

    /**
     * @return string
     */
    public function getSEmail(): string
    {
        return $this->s_email;
    }

    /**
     * @return string
     */
    public function getClassId(): int
    {
        return $this->classId;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getTId(): int
    {
        return $this->t_id;
    }

    /**
     * @return string
     */
    public function getTFirstname(): string
    {
        return $this->t_firstname;
    }

    /**
     * @return string
     */
    public function getTLastname(): string
    {
        return $this->t_lastname;
    }
}

class StudentLoader
{
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all students from the SQL database
    public function getStudents($pdo)
    {
        $handle = $pdo->prepare('SELECT * FROM student');
        $handle->execute();
        $result = $handle->fetchAll();
        return $result;
    }

    // Create all students from the SQL database from the student class. (called in the controller)
    public function createStudents($getstudent)
    {
        foreach ($getstudent as $student) {
            $new_student = new student((int)$student['id'], $student['firstname'], $student['lastname'], $student['email'], (int)$student['class']);
            $result[] = $new_student;
        };
        return $result;
    }

    // Get detailed information for 1 student + class info + teacher info based on a students ID.
    public function getStudentSelect($pdo)
    {
        $handle = $pdo->prepare('SELECT student.id studentId, student.firstname,student.lastname,student.email email,class.id classId, class.name className, class.location classLocation,teacher.id t_id, teacher.firstname t_firstname, teacher.lastname t_lastname  FROM student LEFT JOIN class ON student.class = class.id LEFT JOIN teacher ON class.teacherId = teacher.id WHERE student.id = :id');
        $handle->bindValue(':id', $_GET['id']);
        $handle->execute();
        $result = $handle->fetchAll();
        return $result;
    }

    // Create studentsSelect called in the controller.
    public function createStudentSelect($getStudentSelect)
    {
        foreach ($getStudentSelect as $stu_select) {
            $new_studentSelect = new studentSelect((int)$stu_select['studentId'], $stu_select['firstname'], $stu_select['lastname'], $stu_select['email'], (int)$stu_select['classId'], $stu_select['className'], $stu_select['classLocation'], (int)$stu_select['t_id'], $stu_select['t_firstname'], $stu_select['t_lastname']);
            $result[] = $new_studentSelect;
        };
        return $result;
    }

}