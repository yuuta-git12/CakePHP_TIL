<p>This is People table records.</p>
<!-- <pre><?php print_r($data);?></pre>  Queryオブジェクトの中身を確認 -->
<!-- <pre><?php print_r($data->toArray()); ?></pre> -->
<table>
<thead><tr>
    <th>id</th><th>name</th><th>mail</th><th>age</th>
</tr></thead>
<?php foreach($data->toArray() as $obj): ?>
<tr>
    <td><?=h($obj->id) ?></td>
    <!-- editアクションへのリンクを追加 -->
    <td><a href="<?=$this->Url->build(['controller'=>'People',
    'action'=>'edit']); ?>?id=<?=$obj->id ?>">
        <?=h($obj->name) ?></td>
    <td><?=h($obj->mail) ?></td>
    <td><?=h($obj->age) ?></td>
    <!-- deleteアクションへのリンクを追加 -->
    <td><a href="<?=$this->Url->build(['controller'=>'People',
    'action'=>'delete']); ?>?id=<?=$obj->id ?>">delete</a><td>
</tr>
<?php endforeach; ?>
</table>
