<?php
session_start();
require_once '../connect.php';

$login = $_POST['name'];
$password = md5($_POST['password']);


if ($userSQL = mysqli_query($connect, "SELECT `id`, `name`, `surname`, `secendname`, `email`, `phone`, `adress`, `orders`, `status`, `img`, `login`, `password` FROM `users` WHERE `login` = '$login' AND `password` = '$password'")) {
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
    echo $user['status'];
  } else {
    echo 'Undef-user';
  }
} else {
  echo '31';
}
