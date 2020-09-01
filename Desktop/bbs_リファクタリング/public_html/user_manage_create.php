<?php
require_once(__DIR__ . "/header.php");
$adminCon = new \Bbs\Controller\UserManageCreate();
$adminCon->run();
?>
  <div class="wrap">
    <h1 class="page__ttl">ユーザー新規登録画面</h1>
    <p>権限：1=一般ユーザー、99=管理者</p>
    <form action="" method="post">
      <table class="table">
        <tbody>
          <tr>
            <th>ユーザー名</th>
            <th>パスワード</th>
            <th>メールアドレス</th>
            <th>ユーザー画像</th>
            <th>権限</th>
            <th>削除フラグ</th>
          </tr>
          <tr>
            <td>
              <input type="text" name="username">
              <p class="err"><?= h($adminCon->getErrors('username')); ?></p>
            </td>
            <td>
              <input type="password" name="password">
              <p class="err"><?= h($adminCon->getErrors('password')); ?></p>
            </td>
            <td>
              <input type="text" name="email">
              <p class="err"><?= h($adminCon->getErrors('email')); ?></p>
            </td>
            <td>
              <input type="text" name="image">
            </td>
            <td>
              <input type="text" name="authority" value="1">
              <p class="err"><?= h($adminCon->getErrors('authority')); ?></p>
            </td>
            <td>
              <input type="text" name="delflag" value="0">
              <p class="err"><?= h($adminCon->getErrors('delflag')); ?></p>
            </td>
          </tr>
        </tbody>
      </table>
      <input type="submit" name="create" value="登録" class="btn-primary">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
    <a style="margin-top: 60px" href="./user_manage.php">戻る</a>
  </div>
<?php
require_once(__DIR__ . "/footer.php");
?>
