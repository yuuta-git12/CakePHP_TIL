<?php
//「このファイル内のクラスはAppフォルダ内のControllerフォルダに配置している」ことを意味している。
namespace App\Controller;

//「このファイルでどんなクラスを使うか」を記したもの　これを書くことで名前空間を省略してクラス名だけでの呼び出しができる
use App\Controller\AppController;

//コントローラーのプログラム部分(実際に動作する部分)
class HelloController extends AppController {
    public $autoRender = false;

    public function index() {
        //古いバージョン（cakePHP3 Ver3.5）での書き方
        // $id = $this->request->query['id'];
        // $pass = $this -> request -> query['pass'];

        //CakePHP4での書き方
        $id = 'no name';

        //テキストP58の書き方だとcakePHP4ではエラーになるので
        //下記の書き方で修正
        if(null !== $this->request->getQuery('id')){
            $id = $this->request->getQuery('id');
        }

        $pass = 'no passward';
        if(null !== $this->request->getQuery('pass')){
            $pass = $this->request->getQuery('pass');
        }

        echo "<html><body><h1>Hello!</h1>";
        echo '<ul><li>your id:'. $id .'</li>';
        echo '<li>password: '. $pass .'</li></ul>';
        echo "</body></html>";
    }
}
