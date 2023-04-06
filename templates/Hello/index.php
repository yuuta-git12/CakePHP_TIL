<!DOCTYPE html>
<html>
<head>

    <title><?= $title ?></title>
        <?php echo $this->Html->css('form-radio');?>
        <style>
            h1 {font-size: 48pt;
                    margin: 0px 0px 10px 0px; padding: 0px 20px;color: whitte;
                    background: linear-gradient(to right,#aaa,#fff);}
            p {font-size :14pt; color:#666;}
        </style>
</head>
<body>
    <header class="row">
        <h1><?= $title ?></h1>
    </header>
    <div class="row">
        <p><?= $message ?></p>
        <p><?= $message2 ?></p>
        <p><?= $message3 ?></p>
        <p><?= $message4 ?></p>
        <table>
            <form method="post" action="/mycakephp/hello/form">
            <?=$this->Form->create(null,['url'=>['controller'=>'Hello','action'=>'form'],'type'=>'post'])?>
            <tr><th>name</th>
                <td><?=$this->Form->input('name')?></td>
            </tr>
            <tr><th>mail</th>
                <td><?=$this->Form->input('mail')?></td>
            </tr>
            <tr><th>age</th>
                <td><?=$this->Form->input('age')?></td>
            </tr>
            <tr><th></th>
                <td><?=$this->Form->submit('Click')?></td>
            </tr>
            <?=$this->Form->end()?>

        </table>
    </div>
    <br>
    <div class="radiobox">

        <?php
            //Formの作成
            echo $this->Form->create();

            //radioボタンの作成
            echo $this->Form->radio('radio', [
                ['text' => '男性','class'=>'radiobutton'],
                ['text' => '女性','class'=>'radiobutton'],
                ]);

                echo $this->Form->radio(
                    'favorite_color',
                    [
                        ['value' => 'r', 'text' => 'Red', 'style' => 'color:red;'],
                        ['value' => 'u', 'text' => 'Blue', 'style' => 'color:blue;'],
                        ['value' => 'g', 'text' => 'Green', 'style' => 'color:green;'],
                    ]
                );


            //フォームの終了
            echo $this->Form->end();
        ?>
        <br>
        <input id="radio1" class="radiobutton" name="hoge" type="radio" value="ラジオボタン1" />
            <label for="radio1">男性</label>
        <input id="radio2" class="radiobutton" name="hoge" type="radio" value="ラジオボタン2" />
            <label for="radio2">女性</label>
    </div>
</body>
</html>
