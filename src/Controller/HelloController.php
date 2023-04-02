<?php
//「このファイル内のクラスはAppフォルダ内のControllerフォルダに配置している」ことを意味している。
namespace App\Controller;

//「このファイルでどんなクラスを使うか」を記したもの　これを書くことで名前空間を省略してクラス名だけでの呼び出しができる
use App\Controller\AppController;

//コントローラーのプログラム部分(実際に動作する部分)
class HelloController extends AppController {
    public $autoRender = false;
    private $data = [
        ['name'=>'taro', 'mail'=>'taro@yamada','tel'=>'090-999-999'],
        ['name'=>'hanako', 'mail'=>'hanako@flower','tel'=>'080-888-888'],
        ['name'=>'sachiko', 'mail'=>'sachico@happy','tel'=>'070-777-777'],
    ];

    public function index() {

        $id = 0;

        if(null !== $this->request->getQuery('id')){
            $id = $this->request->getQuery('id');
        }
        //引数の値をJSON形式のテキストに変換して表示する。
        echo json_encode($this->data[$id]);
    }
}
