<?php
session_start();
require_once '../../connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}

$name = $_POST['name'];
$info = $_POST['info'];
$price = $_POST['price'];
$priceViwe = $_POST['price-viwe'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$quantity_buy = $_POST['quantity_buy'];
$path = 'media/img/product/' . time() . $_FILES['file']['name'];



if (!move_uploaded_file($_FILES['file']['tmp_name'], '../../../' . $path)) {
  echo 'Error inc/sign/sign-up 13 (error upload file)';
} else {
  if (mysqli_query($connect, "INSERT INTO `products`(`id`, `name`, `info`, `price`, `price-viwe`, `category`, `quantity`, `buy-quantity`, `img`) VALUES (NULL,'$name','$info','$price','$priceViwe','$category','$quantity','$quantity_buy','$path')")) {
    echo 'Товар создан успешно!';
  } else {
    echo 'Товар создан не успешно!';
  }
}
