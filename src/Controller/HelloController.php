<?php
//「このファイル内のクラスはAppフォルダ内のControllerフォルダに配置している」ことを意味している。
namespace App\Controller;

//「このファイルでどんなクラスを使うか」を記したもの　これを書くことで名前空間を省略してクラス名だけでの呼び出しができる
use App\Controller\AppController;

//コントローラーのプログラム部分(実際に動作する部分)
class HelloController extends AppController {

    public function index() {
        // Ver3.4で非推奨　Ver4.0で削除されている
        // $this->viewBuilder()->autoLayout(false);

        //最新版での書き方は以下
        $this->viewBuilder()->disableAutoLayout();
        $this->set('title','Hello!');
        $this->set('message','This is message!');

        //配列を使って値を受け渡す書き方
        $values = [
            'message2' => 'メッセージ2',
            'message3' => 'メッセージ3',
            'message4' => 'メッセージ4',
        ];
        $this->set($values);


    }
}
