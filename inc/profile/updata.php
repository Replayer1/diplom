<?php

session_start();
require_once '../connect.php';
$user = $_SESSION['user']['id'];

$val1 = $_POST['name'];
$val2 = $_POST['surname'];
$val3 = $_POST['secendname'];
$val4 = $_POST['email'];
$val5 = $_POST['phone'];
$val6 = $_POST['adress'];
$val7 = $_POST['login'];

if (mysqli_query($connect, "UPDATE `users` SET `name`='$val1',`surname`='$val2',`secendname`='$val3',`email`='$val4',`phone`='$val5',`adress`='$val6',`login`='$val7' WHERE `id` = '$user'")) {
  if ($userSQL = mysqli_query($connect, "SELECT `id`, `name`, `surname`, `secendname`, `email`, `phone`, `adress`, `orders`, `status`, `img`, `login`, `password` FROM `users` WHERE `id` = '$user'")) {
    if (mysqli_num_rows($userSQL) > 0) {
      $user = mysqli_fetch_assoc($userSQL);

      $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "surname" => $user['surname'],
        "secendname" => $user['secendname'],
        "email" => $user['email'],
        "phone" => $user['phone'],
        "adress" => $user['adress'],
        "orders" => $user['orders'],
        "status" => $user['status'],
        "img" => $user['img'],
        "login" => $user['login'],
        "password" => $user['password'],
      ];
      echo 'Данные успешно обнавленны';
    } else {
      echo 'Ошибка базы данных';
    }
  } else {
    echo 'Ошибка базы данных';
  }
} else {
  echo 'Ошибка базы данных';
}
