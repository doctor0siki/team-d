<?php
use Model\Dao\Refrigerator;
use Slim\Http\Request;
use Slim\Http\Response;
// 商品一覧を出すコントローラです
$app->get('/refrigerator/buy/{refrigerator_id}[/]', function (Request $request, Response $response, $args) {
    $data=[];

    //URLパラメータのitem_idを取得します。
    $refrigerator_id = $args["refrigerator_id"];
    //アイテムDAOをインスタンス化します。
    $refrigerator = new Refrigerator($this->db);
    //アイテム一覧を取得し、戻り値をresultに格納します
    $data["result"] = $refrigerator->getRefrigerator($refrigerator_id);
    // var_dump($data);die;
    // dd($data["result"]);
    // die();
    // // Render index view
    // $date["result"] = print($data["refrigerator_num"]);
    // var_dump($data["result"]["num"]);die;
    return $this->view->render($response, 'refrigerator/buy.twig', $data);
});

// 会員登録処理コントローラ
$app->post('/refrigerator/buy_done[/]', function (Request $request, Response $response, $args) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();
    // var_dump($data);die;
    //ユーザーDAOをインスタンス化
    $refrigerator = new Refrigerator($this->db);

    //DBに登録をする。戻り値は自動発番されたIDが返ってきます
    $id = $refrigerator->update($data);
    // var_dump($data);die;

    //今登録された情報を発番されたIDで引き、会員情報を取得します（会員登録後の自動ログイン処理のため）
    $result = $refrigerator->select(array("id" => $id), "", "", 1, false);

    // //セッションにユーザー情報を登録（ログイン処理）
    // $this->session->set('user_info', $result);

    // 登録完了ページを表示します。
    return $this->view->render($response, '/refrigerator/buy_done.twig', $data);

});
