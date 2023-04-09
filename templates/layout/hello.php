<!DOCTYPE html>
<html>
    <head>
        <?=$this->Html->charset() ?>    <!--キャクラクタセットの指定 UTF-8エンコードを設定している-->
        <title><?=$this->fetch('title') ?></title><!--タイトルタグの生成-->
        <?=$this->Html->css('hello') ?><!--スタイルシートの読み込み-->
        <?=$this->Html->script('hello') ?><!--スクリプトの読み込み-->
    </head>

    <body>
        <header class="head row">
            <!-- <h1><?=$this->fetch('title') ?></h1> -->
            <!-- <?=$this->element('header',['subtitle'=>'cakephp sample page'])?> -->
            <?=$this->element('header',$header)?>
        </header>
        <div class="content row">
            <?=$this->fetch('content') ?>
        </div>
        <footer class="foot row">
            <!-- <h5>copyright 2018 SYODA-Tuyano</h5> -->
            <!-- <?=$this->element('footer',['copyright'=>'YAMADA-TARO'])?> -->
            <?=$this->element('footer',$footer)?>
        </footer>
    </body>
</html>

