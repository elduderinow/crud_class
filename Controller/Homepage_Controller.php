<?php
declare(strict_types=1);

class Homepage_Controller
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        //load the view
        require 'View/homepage.php';

    }
}