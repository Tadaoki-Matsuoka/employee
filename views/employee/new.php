<?php $this->setLayoutVar('title', '新規登録画面') ?>
<h2>新規登録</h2>
  <?php if(isset($errors) && count($errors) > 0): ?>
    <?php echo $this->render('errors', ['errors' => $errors]); ?>
  <?php endif; ?>
<form action="<?php echo $base_url; ?>/employee/new" method="post">
  <table>
    <tr>
        <th>名前</th>
        <td>
            <input type="text" name="name" value="<?php echo $this->escape($employee["name"]); ?>" />
        </td>
        </tr>
    <tr>
        <th>年齢</th>
        <td>
            <input type="text" name="age" value="<?php echo $this->escape($employee["age"]); ?>" />
        </td>
    </tr>
    <tr>
        <th>住所</th>
        <td>
            <input type="text" name="address" value="<?php echo $this->escape($employee["address"]); ?>" />
        </td>
    </tr>
    <tr>
        <th>部署</th>
        <td>
            <select name="dept_id">
            <?php foreach($department as $d): ?>
                <option value="<?php echo $d["dept_id"]; ?>">
                  <?php echo $d["dept_name"]; ?>
                </option>
            <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="登録" /></td>
    </tr>        
  </table>
</form>