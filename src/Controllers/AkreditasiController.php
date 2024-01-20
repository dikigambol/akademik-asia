<?php

namespace App\Controllers;

use Slim\Views\Twig;

class AkreditasiController
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function listAkreditasi($request, $response, $args)
    {
        return $this->view->render($response, 'akreditasi.html');
    }
}