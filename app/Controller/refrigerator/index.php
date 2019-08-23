<?php

use Slim\Http\Request;
use Slim\Http\Response;

// TOPページのコントローラ
$app->get('/refrigerator/index', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'refrigerator/index.twig', $data);
});

$app->get('/refrigerator/add', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'refrigerator/add.twig', $data);
});

$app->get('/refrigerator/list', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'refrigerator/list.twig', $data);
});
