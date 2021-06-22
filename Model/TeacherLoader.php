<?php
declare(strict_types=1);

class Teacher {
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private int $class;

    public function __construct(int $id, string $firstname, string $lastname, string $email, int $class) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->class = $class;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->firstname;
    }

    public function getLastName(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getClass(): int {
        return $this->class;
    }
}



class TeacherLoader {
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all teacher
    public function getTeachers($pdo)
    {
        $handle = $pdo->prepare('SELECT * FROM teacher');
        $handle->execute();
        $teacher = $handle->fetchAll();
        return $teacher;
    }

    // Create teacher
    public function createTeacher($getteacher)
    {
        foreach ($getteacher as $teacher) {
            $new_teacher = new Teacher((int)$teacher['id'], $teacher['firstname'], $teacher['lastname'], $teacher['email'], (int)$teacher['class']);
            $result[] = $new_teacher;
        };
        return $result;
    }

}