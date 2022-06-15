<?php
session_start();
require_once '../../connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}

$id = $_POST['id'];

if (mysqli_query($connect, "DELETE FROM `products` WHERE `id` = '$id'")) {
  echo 'Продукт успешно удален!';
} else {
  echo 'Ошибка удаления продукта!';
}
