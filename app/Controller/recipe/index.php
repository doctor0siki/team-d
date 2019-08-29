<?php

use Slim\Http\Request;
use Slim\Http\Response;

// TOPページのコントローラ
$app->get('/recipe[/]', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'recipe/index.twig', $data);
});

// $app->get('/recipe/add[/]', function (Request $request, Response $response) {
//
//     $data = [];
//
//     // Render index view
//     return $this->view->render($response, 'recipe/add.twig', $data);
// });
//
// $app->get('/recipe/list[/]', function (Request $request, Response $response) {
//
//     $data = [];
//
//     // Render index view
//     return $this->view->render($response, 'recipe/list.twig', $data);
// });
