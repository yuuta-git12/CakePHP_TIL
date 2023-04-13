<?php
namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController{

    public function index(){
        //PeopleControllerはPeopleモデルを扱うコントローラーなので、
        //テーブルと同じ名前ここではPeopleTableクラスのインスタンスが「People」という名前のプロパティと
        //して組み込まれている。

        if($this->request->is('post')){
            //POST送信時の処理

            //index.phpのフォーム'People.find'の値を変数に取り出し
            $find = $this->request->getData('People.find');

            //'conditions'を使って、nameの値が$findであるものかチェックする
            //「検索する項目名と、検索する値を連想配列にしたもの([項目名=>値])を用意すれば
            //その条件に合うものを検索できる。」
            $condition = ['conditions'=>['name'=>$find]];
            $data = $this->People->find('all',$condition);
        }else{
            //GET時の処理
            $data = $this->People->find('all');
        }


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

    public function edit(){
        $id = $this->request->getQuery('id');
        $entity = $this->People->get($id);
        $this->set('entity',$entity);
    }

    public function update(){
        if($this->request->is('post')){

            //①edit画面から送信されたフォームの値を取り出す
            $data = $this->request->getData('People');

            //②フォームの値のidの値を使い、編集するエンティティを取り出す
            //テーブルクラスのgetメソッドを対象のidのエンティティを取り出す。
            $entity = $this->People->get($data['id']);

            //③フォームの値($data)でエンティティを更新する
            //テーブルクラスの「pathchEntity」メソッドを使用
            //第一引数のエンティティの内容を第二引数の値で更新する。
            $this->People->patchEntity($entity,$data);

            //④テーブルクラスのsaveメソッドを使い、エンティティを保存
            //これでエンティティの内容がDBテーブルに送られ、レコードの値が変更される。
            $this->People->save($entity);
        }
        return $this->redirect(['action'=>'index']);
    }

    public function delete(){
        $id = $this->request->getQuery('id');
        $entity = $this->People->get($id);
        $this->set('entity',$entity);
    }

    public function destroy(){
        if($this->request->is('post')){
            //①delete画面から送信されたフォームの値を変数$dataに取り出す
            $data = $this->request->getData('People');

            //②フォームの値のidの値を使い、編集するエンティティを取り出す
            //テーブルクラスのgetメソッドを対象のidのエンティティを取り出す。
            $entity = $this->People->get($data['id']);

            //③テーブルクラスの「delete」でエンティティを削除する。
            //引数に指定したエンティティを削除するメソッド。
            //エンティティに対応するDBテーブル内のレコードが削除される。
            $this->People->delete($entity);
        }
        return $this->redirect(['action'=>'index']);
    }
}
