<?php
declare(strict_types=1);

class Classes {
    private int $id;
    private string $name;
    private string $location;
    private int $teacherId;

    public function __construct(int $id, string $name, string $location, int $teacherId) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacherId = $teacherId;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function getTeacherId(): int {
        return $this->teacherId;
    }

}

class ClassesTeach {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $className;
    private string $location;

    public function __construct(int $id, string $firstName, string $lastName, string $className, string $location) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->className = $className;
        $this->location = $location;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getClassName(): string {
        return $this->className;
    }

    public function getLocation(): string {
        return $this->location;
    }

}

class ClassLoader {
    // Get all classes
    function getClasses($pdo)
    {
        $handle = $pdo->prepare('SELECT * FROM class');
        $handle->execute();
        $classes = $handle->fetchAll();
        return $classes;
    }

    // Create classes
    function createClasses($ClassLoader)
    {
        foreach ($ClassLoader as $class) {
            $new_class = new Classes((int)$class['id'], $class['NAME'], $class['location'], (int)$class['teacherId'],);
            $result[] = $new_class;
        };
        return $result;
    }

    function getSelectedClasses($pdo)
    {
        $handle = $pdo->prepare('SELECT * FROM class LEFT JOIN teacher ON class.teacherId = teacher.id WHERE teacher.id = :id');
        $handle->bindValue(':id', $_GET['id']);
        $handle->execute();
        $result = $handle->fetchAll();
        return $result;
    }


    function createSelectedClasses($getSelClass)
    {
        foreach ($getSelClass as $class) {
            $new_class = new Classes((int)$class['id'], $class['NAME'], $class['location'], (int)$class['teacherId'],);
            $result[] = $new_class;
        };
        return $result;
    }

    function getSelectedTeacher($pdo)
    {
        $handle = $pdo->prepare('SELECT teacher.id, teacher.firstname,teacher.lastname, class.name, class.location FROM teacher LEFT JOIN class ON teacher.id = class.teacherId WHERE class.id = :id');
        $handle->bindValue(':id', $_GET['id']);
        $handle->execute();
        $result = $handle->fetchAll();
        return $result;
    }

    function createSelectedTeachers($getClassteach)
    {
        foreach ($getClassteach as $classTeach) {
            $new_classTeach = new ClassesTeach((int)$classTeach['id'], $classTeach['firstname'], $classTeach['lastname'], $classTeach['name'],$classTeach['location'],);
            $result[] = $new_classTeach;
        };
        return $result;
    }

}