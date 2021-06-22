<?php
declare(strict_types=1);

class Classes {
    private int $id;
    private string $name;
    private string $location;

    public function __construct(int $id, string $name, string $location) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
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
            $new_class = new Classes((int)$class['id'], $class['NAME'], $class['location']);
            $result[] = $new_class;
        };
        return $result;
    }

}