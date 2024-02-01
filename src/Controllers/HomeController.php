<?php

namespace App\Controllers;

use Slim\Views\Twig;

class HomeController
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function home($request, $response, $args)
    {
        $data["name"] = "Petani Kode";
        $data["books"] = [
            "Tutorial Twig dan Slim untuk Pemula",
            "Belajar Slim Framework dari Nol",
            "Mastering Slim Framework"
        ];
        $data["isAdmin"] = false;

        return $this->view->render($response, 'index.html', $data);
    }
}
