<?php
require_once '../connect.php';
session_start();

if (isset($_SESSION['user'])) {
  $user_id = $_SESSION['user']['id'];
  $user_password = $_SESSION['user']['password'];
  $id = $_POST['id'];
  $quantity = $_POST['quantity'];
  $password = md5($_POST['password']);

  if ($password == $user_password) {
    $productSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
    $product = mysqli_fetch_assoc($productSQL);

    $product_name = $product['name'];
    $product_price = $product['price'];
    $product_price_viwe = $product['price-viwe'];
    $product_img = $product['img'];
    $date = date('d.m.Y H:i:s');

    $product_quantity = $product['quantity'];
    $product_buy_quantity = $product['buy-quantity'];

    if ($product_quantity > $quantity) {
      $product_quantity = $product_quantity - $quantity;
      $product_buy_quantity = $product_buy_quantity + $quantity;

      for ($i = 0; $i < $quantity; $i++) {
        $send = mysqli_query($connect, "INSERT INTO `orders`(`id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_price_viwe`, `product_img`, `quantity`, `status`, `date`) VALUES (NULL,'$user_id','$id','$product_name','$product_price','$product_price_viwe','$product_img ','1','buy','$date')");
      }
      if ($send) {
        echo 'Покупка успешно совершена!';
        mysqli_query($connect, "UPDATE `products` SET `quantity`='$product_quantity',`buy-quantity`='$product_buy_quantity' WHERE `id` = '$id'");
        $date1 = date('d.m.Y H:i');
        mysqli_query($connect, "INSERT INTO `noties`(`id`, `user_id`, `info`, `date`, `status`) VALUES (NULL,'$user_id','Спасибо за покупку $product_name. Убедитесь что вы заполнили поле адресс в разделе профиль иначе мы не сможем доставить вам вашу покупку!','$date1','new')");
      }
    } else {
      echo 'Извините но этого товара нет в наличии или вы заказали больше чем это возможно, попробуйте в другой раз!';
    }
  } else {
    echo 'Ваш пароль и пароль который вы ввели не совподают!';
  }
} else {
  echo 'NOU';
}
