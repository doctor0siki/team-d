<?php

use Slim\Http\Request;
use Slim\Http\Response;

// TOPページのコントローラ
$app->get('/test', function (Request $request, Response $response) {

    $data = [];

    dd("みかわやです");
 
    // Render index view
    return $this->view->render($response, 'top/index.twig', $data);
});
