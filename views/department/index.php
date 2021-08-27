<?php $this->setLayoutVar('title', '一覧画面') ?>
<h2>一覧画面</h2>
<h3><a href="<?php echo $base_url; ?>/department/new">新規追加</a></h3>
<?php if(isset($message)): ?>
<div id="message"><?php echo $message; ?></div>
<?php endif; ?>
<table>
    <tr>
        <th>部署ID</th>
        <th>部署名</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php foreach($departments as $department): ?>
    <tr>
        <td><?php echo $department["dept_id"]; ?></td>
        <td><?php echo $department["dept_name"]; ?></td>
        <td>
            <a href="<?php echo $base_url; ?>/department/edit?dept_id=<?php echo $department["dept_id"]; ?>">編集</a>
        </td>
        <td>
            <a href="<?php echo $base_url; ?>/department/delete?dept_id=<?php echo $department["dept_id"]; ?>">削除</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>