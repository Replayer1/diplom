<?php
session_start();
require_once '../../connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}

$id = $_POST['id'];

$userSQL = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$users = mysqli_fetch_all($userSQL);

if ($_POST['name'] != null) {
  $name = $_POST['name'];
} else {
  $name = $users[0][1];
}

if ($_POST['surname'] != null) {
  $surname = $_POST['surname'];
} else {
  $surname = $users[0][2];
}

if ($_POST['secendname'] != null) {
  $secendname = $_POST['secendname'];
} else {
  $secendname = $users[0][3];
}

if ($_POST['email'] != null) {
  $email = $_POST['email'];
} else {
  $email = $users[0][4];
}

if ($_POST['phone'] != null) {
  $phone = $_POST['phone'];
} else {
  $phone = $users[0][5];
}

if ($_POST['adress'] != null) {
  $adress = $_POST['adress'];
} else {
  $adress = $users[0][6];
}

if ($_POST['buy'] != null) {
  $buy = $_POST['buy'];
} else {
  $buy = $users[0][7];
}

if ($_POST['status'] != null) {
  $status = $_POST['status'];
} else {
  $status = $users[0][8];
}

if ($_POST['img'] != null) {
  $img = $_POST['img'];
} else {
  $img = $users[0][9];
}

if ($_POST['login'] != null) {
  $login = $_POST['login'];
} else {
  $login = $users[0][10];
}

if ($_POST['password'] != null) {
  $password = md5($_POST['password']);
} else {
  $password = $users[0][11];
}



if (mysqli_query($connect, "UPDATE `users` SET `name`='$name',`surname`='$surname',`secendname`='$secendname',`email`='$email',`phone`='$phone',`adress`='$adress',`orders`='$buy',`status`='$status',`img`='$img',`login`='$login',`password`='$password' WHERE `id` = '$id'")) {
  echo 'Изменения успешна!';
} else {
  echo 'Изменения не успешна!';
}
