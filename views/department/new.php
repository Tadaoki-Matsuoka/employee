<?php $this->setLayoutVar('title', '新規登録画面') ?>
<h2>新規登録</h2>
  <?php if(isset($errors) && count($errors) > 0): ?>
    <?php echo $this->render('errors', ['errors' => $errors]); ?>
  <?php endif; ?>
<form action="<?php echo $base_url; ?>/department/new" method="post">
  <table>
    <tr>
        <th>部署名</th>
        <td>
            <input type="text" name="dept_name" value="<?php echo $this->escape($department["dept_name"]); ?>"/>
        </td>
    <tr>
        <td colspan="2"><input type="submit" value="登録" /></td>
    </tr>        
  </table>
</form>