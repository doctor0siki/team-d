<?php
use Model\Dao\Recipe;
use Slim\Http\Request;
use Slim\Http\Response;
/**
 * 商品一覧を出すコントローラです
 *
 * detail/1 = 1番の商品を
 * detail/13 = 13番の商品を
 * 表示する仕組みになっています。
 *
 * {item_id}の中身は$argsに入ります。
 * 取得する時は、$args["item_id"]で取得できます。
 */
$app->get('/recipe/detail/{recipe_id}', function (Request $request, Response $response, $args) {
    $data = [];
    //URLパラメータのitem_idを取得します。
    $recipe_id = $args["recipe_id"];
    // var_dump($recipe_id);die;
    //アイテムDAOをインスタンス化します。
    $recipe = new Recipe($this->db);
    //URLパラメータのitem_id部分を引数として渡し、戻り値をresultに格納します
    $data["result"] = $recipe->getRecipe($recipe_id);
    // var_dump($data);die;
    // Render index view
    return $this->view->render($response, 'recipe/detail.twig', $data);
});
