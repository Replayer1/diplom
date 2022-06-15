<?php
require_once '../connect.php';
session_start();

if (isset($_SESSION['user'])) {
  $id = $_POST['id'];
  $user_id = $_SESSION['user']['id'];

  $mark_check = mysqli_query($connect, "SELECT * FROM `marker` WHERE `user_id` = '$user_id' AND `product_id` = '$id'");
  $mark_check_f = mysqli_fetch_all($mark_check);
  if (count($mark_check_f) > 0) {
    echo 'NOWIN';
  } else {
    $productSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
    if (mysqli_num_rows($productSQL) > 0) {
      $product = mysqli_fetch_assoc($productSQL);
      $name = $product['name'];
      $img = $product['img'];

      if (mysqli_query($connect, "INSERT INTO `marker`(`id`, `user_id`, `product_id`, `product_name`, `product_img`) VALUES (NULL,'$user_id','$id','$name','$img')")) {
        echo 'Успешно добавленно в закладки';
      } else {
        echo 'ERR';
      }
    }
  };
} else {
  echo 'NOU';
}
