<?php
use Model\Dao\Recipe;
use Slim\Http\Request;
use Slim\Http\Response;
// 商品一覧を出すコントローラです
$app->get('/recipe/list[/]', function (Request $request, Response $response) {
    $data=[];
    //アイテムDAOをインスタンス化します。
    $recipe = new recipe($this->db);
    //アイテム一覧を取得し、戻り値をresultに格納します
    $data["result"] = $recipe->getRecipeList();
    // dd($data["result"]);
    // die();
    // // Render index view
    return $this->view->render($response, 'recipe/list.twig', $data);
});
