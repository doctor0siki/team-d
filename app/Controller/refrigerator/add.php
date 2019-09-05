<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Refrigerator;


// 会員登録ページコントローラ
$app->get('/refrigerator/add[/]', function (Request $request, Response $response) {

    //GETされた内容を取得します。
    $data = $request->getQueryParams();

    // Render index view
    return $this->view->render($response, '/refrigerator/add.twig', $data);

});

// 会員登録処理コントローラ
$app->post('/refrigerator/add[/]', function (Request $request, Response $response) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();
    //ユーザーDAOをインスタンス化
    $refrigerator = new Refrigerator($this->db);
    // var_dump($refrigerator_id);die;
    //入力されたメールアドレスの会員が登録済みかどうかをチェックします
    if ($refrigerator->select(array("name" => $data["name"]), "", "", 1, false)) {

        //入力項目がマッチしない場合エラーを出す
        $data["error"] = "この食材は既に登録済みです";

        // 入力フォームを再度表示します
        return $this->view->render($response, '/refrigerator/add.twig', $data);

    }

    //DBに登録をする。戻り値は自動発番されたIDが返ってきます
    $id = $refrigerator->insert($data);

    //今登録された情報を発番されたIDで引き、会員情報を取得します（会員登録後の自動ログイン処理のため）
    $result = $refrigerator->select(array("id" => $id), "", "", 1, false);

    // //セッションにユーザー情報を登録（ログイン処理）
    // $this->session->set('user_info', $result);

    // 登録完了ページを表示します。
    return $this->view->render($response, '/refrigerator/add_done.twig', $data);

});
