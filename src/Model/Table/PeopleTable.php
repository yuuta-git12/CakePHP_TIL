<?php
namespace App\Model\Table;  //テーブルクラスを配置する名前空間
use Cake\ORM\Table;
use Cake\ORM\Query; //Queryクラスを使用するための宣言

class PeopleTable extends Table {    //クラス名はテーブル名と同じ、最初だけ大文字、あとは小文字

    //クラスの初期化メソッド
    public function initialize(array $config):void {
        parent::initialize($config);//親クラスであるTableに用意されている初期化処理の実行

        $this->setTable('people');  //使用するデータベーステーブルの名前を設定
                                    //名前を変えれば他のデータベーステーブルにもアクセスできる
        $this->setDisplayField('mail');//各レコードのmailだけをまとめて取り出すための設定
        $this->setPrimaryKey('id');//プライマリキーの項目
    }

    public function findMe(Query $query,array $options){
        $me = $options['me'];
        //$this->テーブル名->find()の代わりに$queryと記述している
        return $query->where([
                'OR' => [['name like' =>'%'.$me.'%' ], ['mail like' => '%'.$me.'%']],
                ])
            ->order(['age'=>'asc']);
    }

    public function findByAge(Query $query,array $options){
        return $query->order(['age'=>'asc'])->order(['name'=>'asc']);
    }
}
