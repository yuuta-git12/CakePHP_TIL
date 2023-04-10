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


        $this->set('data',$data);
    }
}
