<?php
namespace App\Model\Entity; //エンティティクラスを配置する名前空間

use Cake\ORM\Entity;

class Person extends Entity{    //クラス名はテーブル名の単数形　ここではPeopleの単数形Person

    protected $_accessible = [
        'name' => true,
        'mail' => true,
        'age' => true
    ];
}
