<?php $this->setLayoutVar('title', '一覧画面') ?>
<h2>一覧画面</h2>
<h3><a href="<?php echo $base_url; ?>/employee/new">新規追加</a></h3>
<?php if(isset($message)): ?>
<div id="message"><?php echo $message; ?></div>
<?php endif; ?>
<table>
    <tr>
        <th>社員ID</th>
        <th>名前</th>
        <th>年齢</th>
        <th>住所</th>
        <th>部署</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php foreach($employees as $employee): ?>
    <tr>
        <td><?php echo $employee["ID"]; ?></td>
        <td><?php echo $employee["name"]; ?></td>
        <td><?php echo $employee["age"]; ?></td>
        <td><?php echo $employee["address"]; ?></td>
        <td><?php echo $employee["dept_name"]; ?></td>
        <td>
            <a href="<?php echo $base_url; ?>/employee/edit?ID=<?php echo $employee["ID"]; ?>">編集</a>
        </td>
        <td>
            <a href="<?php echo $base_url; ?>/employee/delete?ID=<?php echo $employee["ID"]; ?>">削除</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>