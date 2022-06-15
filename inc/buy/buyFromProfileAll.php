<?php
require_once '../connect.php';
session_start();

$user_id = $_SESSION['user']['id'];
$password = $_POST['password'];

if (md5($password) == $_SESSION['user']['password']) {

  $listSQL = mysqli_query($connect, "SELECT * FROM `card` WHERE `user_id` = '$user_id'");
  $list = mysqli_fetch_all($listSQL);

  $check = false;
  $products = '';

  foreach ($list as $i) {
    $id = $i[0];
    $id_product = $i[2];
    $product_name = $i[3];
    $product_price = $i[4];
    $product_price_viwe = $i[5];
    $product_img = $i[6];
    $date = date('d.m.Y H:i:s');
    $products .= ', ' . $i[3];

    if (mysqli_query($connect, "INSERT INTO `orders`(`id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_price_viwe`, `product_img`, `quantity`, `status`, `date`) VALUES (NULL,'$user_id','$id_product','$product_name','$product_price','$product_price_viwe','$product_img ','1','buy','$date')")) {
      mysqli_query($connect, "DELETE FROM `card` WHERE `id` = '$id'");
      $check = true;
    }
  }
  if ($check) {
    echo 'Покупка успешно совершена!';
    $date = date('d.m.Y H:i:s');
    mysqli_query($connect, "INSERT INTO `noties`(`id`, `user_id`, `info`, `date`, `status`) VALUES (NULL,'$user_id','Спасибо за покупку $products. Убедитесь что вы заполнили поле 'адресс' в разделе профиль иначе мы не сможем доставить вам вашу покупку!','$date','new')");
  } else {
    echo 'Ошибка базы данных';
  }
} else {
  echo 'badpass';
}
