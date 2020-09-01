<?php
require_once(__DIR__ .'/header.php');
$ThreadCreateCon = new Bbs\Controller\ThreadCreate();
$ThreadCreateCon->run();
?>
<h1 class="page__ttl">新規スレッド</h1>
<form action="" method="post" class="form-group new_thread" id="new_thread">
  <div class="form-group">
    <label>スレッド名</label>
    <input type="text" name="thread_name" class="form-control" value="<?= isset($ThreadCreateCon->getValues()->thread_name) ? h($ThreadCreateCon->getValues()->thread_name) : ''; ?>">
  </div>
  <div class="form-group">
    <label>最初のコメント</label>
    <textarea type="text" name="comment" class="form-control"><?= isset($ThreadCreateCon->getValues()->comment) ? h($ThreadCreateCon->getValues()->comment) : ''; ?></textarea>
    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    <input type="hidden" name="type" value="createthread">
    <p class="err"><?= h($ThreadCreateCon->getErrors('create_thread')); ?></p>
  </div>
  <div class="form-group btn btn-primary" onclick="document.getElementById('new_thread').submit();">作成</div>
</form>
<?php
require_once(__DIR__ .'/footer.php');
?>
