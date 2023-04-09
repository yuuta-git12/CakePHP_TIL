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
        <pre><?php print_r($data);?><pre>
    </div>
    <div class="row">
        <table>
            <?=$this->Form->create(null,    //<form>タグの生成はcreateメソッドで行う。create([モデル],[連想配列]);
                ['type'=>'post',
                'url'=>['controller'=>'Hello',
                    'action'=>'form']])?>

            <tr><th>name</th>
                <td><?=$this->Form->text('Form1.name')?></td>
            </tr>
            <tr><th>mail</th>
                <td><?=$this->Form->text('Form1.mail')?></td>
            </tr>
            <tr><th>age</th>
                <td><?=$this->Form->text('Form1.age')?></td>
            </tr>
            <tr><th></th>
                <td><?=$this->Form->submit('送信')?></td>
            </tr>
            <tr><th>CheckBox</th>
                <td><?=$this->Form->checkbox('Form1.check',['id'=>'check1'])?>
                    <?=$this->Form->label('check1','check box')?></td>
            </tr>
            <tr><th>RadioBox</th>
                <td><?=$this->Form->radio('Form1.radio',[
                    ['text'=>'male','value'=>'男性','checked'=>'true'],
                    ['text'=>'female','value'=>'女性']
                    ])?></td>
            </tr>
            <br>
            <br>
            <tr><th>SelectBox</th>
                <td><?=$this->Form->select('Form1.select',[
                    $select_value
                ],['multiple'=>true,'size'=>6])?></td>    <!--multiple:trueで選択ボックスで複数選択が可能になる。sizeで表示できる行数を指定できる-->
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
