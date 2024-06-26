<?php

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // twig view
    $container['view'] = function ($c) {
        $view = new \Slim\Views\Twig('../templates');

        // Instantiate and add Slim specific extension
        $router = $c->get('router');
        $uri = $c->get('request')->getUri();
        $basePath = rtrim(str_ireplace('index.php', '', $uri->getBasePath()), '/');
        $view->addExtension(new \Slim\Views\TwigExtension($router, $basePath));

        return $view;
    };
};
