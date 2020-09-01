<?php
require_once(__DIR__ .'/../config/config.php');
if(isset($_POST['type'])) {
  $thread_id=$_POST['thread_id'];
  $commentCsvCon = new Bbs\Controller\CommentCsv();
  $commentCsvCon->outputCsv($thread_id);
  exit();
} else {
  header('Location: '. SITE_URL . '/thread_all.php');
  exit();
}
?>
