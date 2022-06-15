<?php
session_start();
require_once '../connect.php';

if (isset($_SESSION['user'])) {
  $user_id = $_SESSION['user']['id'];
} else {
  $user_id = NULL;
}

$email = $_POST['email'];
$name = $_POST['name'];
$msg = $_POST['msg'];


if (mysqli_query($connect, "INSERT INTO `massage`(`id`, `user_id`, `name`, `email`, `msg`) VALUES (NULL,'$user_id','$name','$email','$msg')")) {
  echo 'Сообщение отправленно!';
} else {
  echo 'Ошибка отправки сообщения!';
}
