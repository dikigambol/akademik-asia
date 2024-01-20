<?php

namespace App\Controllers;

use Slim\Views\Twig;

class PengumumanController
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function listPengumuman($request, $response, $args)
    {
        return $this->view->render($response, 'list-pengumuman.html');
    }

    public function detailPengumuman($request, $response, $args)
    {
        $data["id"] = $args['id'];
        return $this->view->render($response, 'detail-pengumuman.html', $data);
    }
}