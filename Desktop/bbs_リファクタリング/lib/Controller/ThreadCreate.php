<?php
namespace Bbs\Controller;

class ThreadCreate extends \Bbs\Controller {

  public function run() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_POST['type']  === 'createthread') {
        $this->createThread();
      }
    }
  }

  private function createThread(){
    try {
      $this->validate();
    } catch (\Bbs\Exception\EmptyPost $e) {
        $this->setErrors('create_thread', $e->getMessage());
    } catch (\Bbs\Exception\CharLength $e) {
        $this->setErrors('create_thread', $e->getMessage());
    }
    $this->setValues('thread_name', $_POST['thread_name']);
    $this->setValues('comment', $_POST['comment']);
    if ($this->hasError()){
      return;
    } else {
      $threadModel = new \Bbs\Model\Thread();
      $threadModel->createThread([
        'title' => $_POST['thread_name'],
        'comment' => $_POST['comment'],
        'user_id' => $_SESSION['me']->id
      ]);
      header('Location: '. SITE_URL . '/thread_all.php');
      exit();
    }
  }

  private function validate() {
    $validate = new \Bbs\Controller\Validate();
    $validate->tokenCheck($_POST['token']);
    $validate->unauthorizedCheck([$_POST['thread_name'],$_POST['comment']]);
    if($validate->emptyCheck([$_POST['thread_name'],$_POST['comment']])) {
      throw new \Bbs\Exception\EmptyPost("スレッド名または最初のコメントが入力されていません！");
    }
    if($validate->charLenghtCheck($_POST['thread_name'],20)) {
      throw new \Bbs\Exception\CharLength("スレッド名は20文字以内で入力してください。");
    }
    if($validate->charLenghtCheck($_POST['comment'],200)) {
      throw new \Bbs\Exception\CharLength("コメントは200文字以内で入力してください。");
    }
  }
}
