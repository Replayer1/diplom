<?php
require_once '../connect.php';
session_start();

if (isset($_SESSION['user'])) {
  $id = $_POST['id'];
  $user_id = $_SESSION['user']['id'];

  $productSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
  if (mysqli_num_rows($productSQL) > 0) {
    $product = mysqli_fetch_assoc($productSQL);
    $price = $product['price'];
    $price_v = $product['price-viwe'];
    $name = $product['name'];
    $img = $product['img'];

    if (mysqli_query($connect, "INSERT INTO `card`(`id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_price-to-viwe`, `product_img`) VALUES (NULL,'$user_id','$id','$name','$price','$price_v','$img')")) {
      echo 'Успешно добавленно в корзину';
    } else {
      echo 'ERR';
    }
  }
} else {
  echo 'NOU';
}
