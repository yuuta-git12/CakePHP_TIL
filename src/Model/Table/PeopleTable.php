<?php
namespace App\Model\Table;  //テーブルクラスを配置する名前空間
use Cake\ORM\Table;

class PeopleTable extends Table {    //クラス名はテーブル名と同じ、最初だけ大文字、あとは小文字

    //クラスの初期化メソッド
    public function initialize(array $config):void {
        parent::initialize($config);//親クラスであるTableに用意されている初期化処理の実行

        $this->setTable('people');  //使用するデータベーステーブルの名前を設定
                                    //名前を変えれば他のデータベーステーブルにもアクセスできる
        $this->setDisplayField('name');//各レコードのnameだけをまとめて取り出すための設定
        $this->setPrimaryKey('id');//プライマリキーの項目
    }
}
