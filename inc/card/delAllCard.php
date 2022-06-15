<?php
require_once '../connect.php';
session_start();

if (isset($_SESSION['user'])) {
  $user_id = $_SESSION['user']['id'];
  mysqli_query($connect, "DELETE FROM `card` WHERE `user_id` = '$user_id'");
  echo 'Удаление успешно!';
} else {
  echo 'Ошибка удаления!';
}
