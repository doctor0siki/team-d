<?php

use Slim\Http\Request;
use Slim\Http\Response;

// TOPページのコントローラ
$app->get('/refrigerator[/]', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'refrigerator/index.twig', $data);
});
