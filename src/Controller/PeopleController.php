<?php
namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController{

    public function index(){
        //PeopleControllerはPeopleモデルを扱うコントローラーなので、
        //テーブルと同じ名前ここではPeopleTableクラスのインスタンスが「People」という名前のプロパティと
        //して組み込まれている。
        $data = $this->People->find('all');

        //PeopleTableのsetDisplayFieldで指定した項目の値を取り出している
        //ここではnameの値
        // $data = $this->People->find('list')->toArray();

        //古い書き方(非推奨)
        // $id = $this->request->query['id'];

        // $id = $this->request->getQuery('id');   //クエリパラメータの値をidに格納し該当するidの値を$idに取り出している
        // $data = $this->People->get($id);//$idに該当するエンティティを取り出す
        $this->set('data',$data);
    }

    public function add(){
        //古い書き方
        // $entity = $this->People->newEntity();
        //新しい書き方
        $entity = $this->People->newEmptyEntity();
        $this->set('entity',$entity);
    }

    public function create(){
        if($this->request->is('post')){
            //①フォームの値の取り出し
            $data = $this->request->getData('People');

            //②新しいエンティティの作成　引数にそのエンティティに保管するデータを
            //連想配列にまとめたものを用意する。newEntityが「一括代入」を行っている部分
            $entity = $this->People->newEntity($data);

            //③エンティティの保存 saveメソッドで引数のエンティティがDBテーブルに保存される。
            $this->People->save($entity);
        }
        //リダイレクト 同じコントローラー内の別アクションに移動させる
        //この場合、indexに移動
        return $this->redirect(['action'=>'index']);
    }
}
