<?php

use App\Controllers\AkreditasiController;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\HomeController;
use App\Controllers\PengumumanController;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, array $args) use ($app) {
        $controller = new HomeController($app->getContainer()->get('view'));
        return $controller->home($request, $response, $args);
    });

    $app->get('/akreditasi', function (Request $request, Response $response, array $args) use ($app) {
        $controller = new AkreditasiController($app->getContainer()->get('view'));
        return $controller->listAkreditasi($request, $response, $args);
    });

    $app->get('/pengumuman-all', function (Request $request, Response $response, array $args) use ($app) {
        $controller = new PengumumanController($app->getContainer()->get('view'));
        return $controller->listPengumuman($request, $response, $args);
    });

    $app->get('/detail-pengumuman-{id}', function (Request $request, Response $response, array $args) use ($app) {
        $controller = new PengumumanController($app->getContainer()->get('view'));
        return $controller->detailPengumuman($request, $response, $args);
    });

    $app->get('/surat-keputusan', function (Request $request, Response $response, array $args) {
        return $this->view->render($response, 'surat-keputusan.html');
    });
};
