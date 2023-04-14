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

            //完全一致の名前検索を行う場合の設定
            // $condition = ['conditions'=>['name'=>$find]];

            //名前のあいまい検索を行う場合の設定
            // $condition = ['conditions'=>['name like'=>$find]];

            //決まった年齢以下の人だけ検索する。
            // $condition = ['conditions'=>['age <='=>$find]];

            //年齢の範囲を決めて検索する。
            // $arr = explode(',',$find);  //第一引数の値で第二引数の値を切り離す関数
            // $condition = ['conditions'=>[
            //     'and'=>[
            //         'age >=' => $arr[0],
            //         'age <=' => $arr[1]
            //     ]]];

            //name項目かmail項目で検索する設定
            // $condition = ['conditions'=>[
            //     'or'=>[
            //         'name like' => $find,
            //         'mail like' => $find
            //     ]]];

            //年齢に並び順をつけて検索する設定
            // $condition = [
            //     'conditions'=>['name like'=>$find],
            //     'order' =>['People.age'=>'desc']
            // ];

            //取り出すレコード数を設定
            $condition = ['limit' => 3, 'page'=>intval($find)];
            $data = $this->People->find('all',$condition);
        }else{
            //GET時の処理
            // $data = $this->People->find('all');
            $data = $this->People->find('all',['order' =>['People.age'=>'asc']]);
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
