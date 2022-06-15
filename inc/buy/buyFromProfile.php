<?php
require_once '../connect.php';
session_start();

$user_id = $_SESSION['user']['id'];
$id = $_POST['id'];

$listSQL = mysqli_query($connect, "SELECT * FROM `card` WHERE `id` = '$id'");
$list = mysqli_fetch_assoc($listSQL);

$id_product = $list['product_id'];

$productSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id_product'");
$product = mysqli_fetch_assoc($productSQL);

$product_name = $product['name'];
$product_price = $product['price'];
$product_price_viwe = $product['price-viwe'];
$product_img = $product['img'];
$date = date('d.m.Y H:i:s');

if (mysqli_query($connect, "INSERT INTO `orders`(`id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_price_viwe`, `product_img`, `quantity`, `status`, `date`) VALUES (NULL,'$user_id','$id_product','$product_name','$product_price','$product_price_viwe','$product_img ','1','buy','$date')")) {
  mysqli_query($connect, "DELETE FROM `card` WHERE `id` = '$id'");
  echo 'Покупка успешно совершена!';
  $date = date('d.m.Y H:i:s');
  mysqli_query($connect, "INSERT INTO `noties`(`id`, `user_id`, `info`, `date`, `status`) VALUES (NULL,'$user_id','Спасибо за покупку $product_name. Убедитесь что вы заполнили поле 'адресс' в разделе профиль иначе мы не сможем доставить вам вашу покупку!','$date','new')");
} else {
  echo 'Ошибка базы данных';
}
