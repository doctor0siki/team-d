<?php
use Model\Dao\Refrigerator;
use Slim\Http\Request;
use Slim\Http\Response;
// 商品一覧を出すコントローラです
$app->get('/refrigerator/use/{refrigerator_id}[/]', function (Request $request, Response $response, $args) {
  $data=[];
  // var_dump($refrigerator_id);die;
  //URLパラメータのitem_idを取得します。
  $refrigerator_id = $args["refrigerator_id"];
  //アイテムDAOをインスタンス化します。
  $refrigerator = new Refrigerator($this->db);
  //アイテム一覧を取得し、戻り値をresultに格納します
  $data["result"] = $refrigerator->getRefrigerator($refrigerator_id);
  // dd($data["result"]);
  // die();
  // // Render index view
  return $this->view->render($response, 'refrigerator/use.twig', $data);
});