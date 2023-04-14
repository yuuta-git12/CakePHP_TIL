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

            //名前またはメールアドレスをキーワードに検索する
            // $data = $this->People->findByNameOrMail($find,$find);

            //クエリビルダーによる名前検索
            // $arr = explode(',',$find);
            // $data = $this->People->find()
            //     ->where(['age >=' => $arr[0]])
            //     ->andWhere(['age <=' => $arr[1]])
            //     ->order(['People.id'=>'asc']);

            //レコードを取り出す個数を3に設定$findにページ数を設定
            // $data = $this->People->find()
            //     ->order(['People.id'=>'asc'])
            //     ->order(['People.age'=>'asc'])
            //     ->limit(3)->page($find);

            //カスタムファインダーによる検索PeopleTable.phpの「findMe」の呼び出し
            //第一引数がメソッド名、第二引数がメソッドに渡す値
            $data = $this->People->find('Me',['me'=>$find]);
        }else{
            //GET時の処理
            // $data = $this->People->find('all');
            // $data = $this->People->find()
            //     ->order(['People.age'=>'asc'])  //年齢の昇順で並び替え
            //     ->order(['People.name'=>'asc']);//年齢が同じ場合は名前の昇順で並び替え

            //カスタムファインダーによる検索PeopleTable.phpの「findbyAge」の呼び出し
            $data = $this->People->find('byAge');
        }

        $this->set('data',$data);
    }

    public function add(){
        $msg = 'please type your personal data...';
        //古い書き方
        // $entity = $this->People->newEntity();
        //新しい書き方
        $entity = $this->People->newEmptyEntity();

        if($this->request->is('post')){
            $data = $this->request->getData('People');
            $entity = $this->People->newEntity($data);
            if($this->People->save($entity)){   //エンティティが保存されたらtrue、それ以外はfalseを返す
                return $this->redirect(['action'=>'index']);
            }
            //保存されなかった場合に表示されるエラーメッセージ
            $msg = 'Error was occurd...';
        }
        $this->set('msg',$msg);
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
