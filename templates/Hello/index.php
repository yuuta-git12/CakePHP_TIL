<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
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
</body>
</html>
