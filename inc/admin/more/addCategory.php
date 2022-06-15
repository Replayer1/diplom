<?php
session_start();
require_once '../../connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}

$name = $_POST['Name-code'];
$nameDis = $_POST['Name-display'];

if (mysqli_query($connect, "INSERT INTO `catygory`(`id`, `name`, `nameToViwe`) VALUES (NULL,'$name','$nameDis')")) {
  echo 'Категория создана успешно!';
} else {
  echo 'Категория создана не успешно!';
}
