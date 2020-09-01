<?php
require_once(__DIR__ .'/header.php');
$SingupCon= new Bbs\Controller\Signup();
$SingupCon->run();
?>
<div class="container">
  <form action="" method="post" id="signup" class="form">
    <div class="form-group">
      <label>メールアドレス</label>
      <input type="text" name="email" value="<?= isset($SingupCon->getValues()->email) ? h($SingupCon->getValues()->email): ''; ?>" class="form-control">
      <p class="err"><?= h($SingupCon->getErrors('email')); ?></p>
    </div>
    <div class="form-group">
      <label>ユーザー名</label>
      <input type="text" name="username" value="<?= isset($SingupCon->getValues()->username) ? h($SingupCon->getValues()->username): ''; ?>" class="form-control">
      <p class="err"><?= h($SingupCon->getErrors('username')); ?></p>
    </div>
    <div class="form-group">
      <label>パスワード</label>
      <input type="password" name="password" class="form-control">
      <p class="err"><?= h($SingupCon->getErrors('password')); ?></p>
    </div>
    <button class="btn btn-primary" onclick="document.getElementById('signup').submit();">登録</button>
    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
  </form>
  <p class="fs12"><a href="<?= SITE_URL; ?>/login.php">ログイン</a></p>
</div><!-- container -->
<?php require_once(__DIR__ .'/footer.php'); ?>
