<?php
declare(strict_types=1);

class Class_Controller {
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {
        $pdo = Connection::Open();

        $ClassLoader = new ClassLoader($pdo);
        $getClasses = $ClassLoader->getClasses($pdo);
        $getClass = $ClassLoader->createClasses($ClassLoader);

    }
}