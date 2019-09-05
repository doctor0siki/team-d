<?php
use Model\Dao\Refrigerator;
use Slim\Http\Request;
use Slim\Http\Response;
// 商品一覧を出すコントローラです
$app->get('/refrigerator/list[/]', function (Request $request, Response $response) {
    $data=[];
    //アイテムDAOをインスタンス化します。
    $refrigerator = new refrigerator($this->db);
    //アイテム一覧を取得し、戻り値をresultに格納します
    $data["result"] = $refrigerator->getRefrigeratorList();
    // dd($data["result"]);
    // die();
    // // Render index view
    return $this->view->render($response, 'refrigerator/list.twig', $data);
});
