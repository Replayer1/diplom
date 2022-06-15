<?php
require_once '../connect.php';
session_start();

if (isset($_SESSION['user'])) {
  $id = $_POST['id'];
  $user_id = $_SESSION['user']['id'];

  mysqli_query($connect, "DELETE FROM `marker` WHERE `user_id` = '$user_id' AND `id` = '$id'");
  echo 'Удаление успешно!';
} else {
  echo 'Ошибка удаления!';
}
