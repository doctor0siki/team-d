<?php
namespace Model\Dao;
use Doctrine\DBAL\DBALException;
use PDO;
/**
 * Class Item
 *
 * Itemテーブルを扱う Classです
 * DAO.phpに用意したCRUD関数以外を実装するときに、記載をします。
 *
 * @copyright Ceres inc.
 * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
 * @since 2019/08/14
 * @package Model\Dao
 */
class Refrigerator extends Dao
{
    /**
     * getItemList Function
     *
     * Itemテーブルにあるアイテム一覧を取得するためのサンプルです。
     *
     * @return array $result 結果情報を連想配列で指定します。
     * @throws DBALException
     * @since 2019/08/14
     * @copyright Ceres inc.
     * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
     */
    public function getRefrigeratorList()
    {
        //全件取得するクエリを作成
        $sql = "select * from refrigerator";
        // SQLをプリペア
        $statement = $this->db->prepare($sql);
        //SQLを実行
        $statement->execute();
        //結果レコードを全件取得し、返送
        return $statement->fetchAll();
    }
    /**
     * getItem Function
     *
     * Itemテーブルから指定idのレコードを一件取得するクエリです。
     *
     * @param int $id 引数として、取得したい商品のアイテムIDを指定します。
     * @return array $result 結果情報を連想配列で指定します。
     * @throws DBALException
     * @copyright Ceres inc.
     * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
     * @since 2019/08/14
     */
    public function getRefrigerator($id)
    {
      // print $id;
        //全件取得するクエリを作成
        $sql = "select * from refrigerator where id =:id";
        // SQLをプリペア
        $statement = $this->db->prepare($sql);
        //idを指定します
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        //SQLを実行
        $statement->execute();
        // var_dump(
        //   $statement
        // );
        // //結果レコードを一件取得し、返送
        return $statement->fetch();
    }

    //
    // public function getRefrigeratorUse($id)
    // {
    //   $sql = "select * from refrigerator where id =:id";
    //   $sql = "UPDATE refrigerator SET num =:num+num WHERE id =:id";
    // }
    //
    public function updateRefrigeratorAdd($id, $num){
      // print $id;
        //全件取得するクエリを作成
        $sql = "UPDATE refrigerator SET num =:num WHERE id =:id";
        // SQLをプリペア
        $statement = $this->db->prepare($sql);
        //idを指定します
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->bindParam(":num", $num, PDO::PARAM_INT);
        //SQLを実行
        $statement->execute();
        // var_dump($statement);
        // //結果レコードを一件取得し、返送
        return;
    }
}
