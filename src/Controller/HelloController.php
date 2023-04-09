<?php
//「このファイル内のクラスはAppフォルダ内のControllerフォルダに配置している」ことを意味している。
namespace App\Controller;

//「このファイルでどんなクラスを使うか」を記したもの　これを書くことで名前空間を省略してクラス名だけでの呼び出しができる
use App\Controller\AppController;

//コントローラーのプログラム部分(実際に動作する部分)
class HelloController extends AppController {
    public function initialize():void{  //なんでvoidがないとエラーになるの？
        // parent::initialize();
        $this->viewBuilder()->setLayout('hello');

    }
    public function index() {
        // Ver3.4で非推奨　Ver4.0で削除されている
        // $this->viewBuilder()->autoLayout(false);
        // $value = [];
        // //最新版での書き方は以下
        // $this->viewBuilder()->disableAutoLayout();
        // $this->set('title','Hello!');
        // // $this->set('message','This is message!');
        // $value = ['one'=>1,
        //         'two'=>2,
        //         'three'=>3,
        //         'four'=>4,
        //         'five'=>5,
        //         'six'=>6];
        // $this->set('select_value',$value);
        // if($this->request->isPost()){   //POST送信をしていればTrueしていない場合はFalse
        //     $this->set('data',$this->request->getdata('Form1'));
        // }else{
        //     $this->set('data',[]);
        // }
        //配列を使って値を受け渡す書き方
        // $values = [
        //     'message2' => 'メッセージ2',
        //     'message3' => 'メッセージ3',
        //     'message4' => 'メッセージ4',
        // ];
        // $this->set('data',$values);
        $this->set('header',['subtitle'=>'from Controller with Love♡','subtitle2'=>'test']);//index.phpの$headerに['subtitle'=>'from Controller with Love♡']を格納
        $this->set('footer',['copyright'=>'名無しの権兵衛']);//index.phpの$footerに['copyright'=>'名無しの権兵衛']を格納

    }

    public function edit(){
        // Ver3.4で非推奨　Ver4.0で削除されている
        // $this->viewBuilder()->autoLayout(false);
        // $value = [];
        // //最新版での書き方は以下
        // $this->viewBuilder()->disableAutoLayout();
        $this->set('title','Hello!');
        $this->set('message','This is message!');
        $value = ['one'=>1,
                'two'=>2,
                'three'=>3,
                'four'=>4,
                'five'=>5,
                'six'=>6];
        $this->set('select_value',$value);
        if($this->request->isPost()){   //POST送信をしていればTrueしていない場合はFalse
            $this->set('data',$this->request->getdata('Form1'));
        }else{
            $this->set('data',[]);
        }
        //配列を使って値を受け渡す書き方
        // $values = [
        //     'message2' => 'メッセージ2',
        //     'message3' => 'メッセージ3',
        //     'message4' => 'メッセージ4',
        // ];
        // $this->set('data',$values);
        $this->set('header',['subtitle'=>'Edit','subtitle2'=>'form画面']);//index.phpの$headerに['subtitle'=>'from Controller with Love♡']を格納
        $this->set('footer',['copyright'=>'名無しの権兵衛']);//index.phpの$footerに['copyright'=>'名無しの権兵衛']を格納
    }

    public function form(){
        // $this->viewBuilder()->disableAutoLayout();
        $name = $this->request->getData('Form1.name');
        $mail = $this->request->getData('Form1.mail');
        $age  = $this->request->getData('Form1.age');
        $form = $this->request->getData('Form1');

        //cakephp4では使えない書き方
        // $name = $this->request->data['name'];
        // $mail = $this->request->data['mail'];
        // $age  = $this->request->data['age'];
        $res = 'こんにちは'.$form['name'].'('.$form['age'].')さん。メールアドレスは、'.$form['mail'].'ですね？';
        $values = [
            'title' => 'Result',
            'message' => $res,
            'test' => $form
        ];
        $this->set($values);
        $this->set('header',['subtitle'=>'Result','subtitle2'=>'result画面']);//index.phpの$headerに['subtitle'=>'from Controller with Love♡']を格納
        $this->set('footer',['copyright'=>'名無しの権兵衛']);//index.phpの$footerに['copyright'=>'名無しの権兵衛']を格納
    }
}
