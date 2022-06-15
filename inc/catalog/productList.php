<?php

session_start();
require_once '../connect.php';

$productsSQL = mysqli_query($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all($productsSQL);

// var_dump($products);

foreach ($products as $item) {
  echo '<div class="catalog-item" data-id="' . $item[5] . '" data-price="' . $item[3] . '" data-idcheck="' . $item[0] . '">';
  echo '<div class="item__img">';
  echo '<img src="' . $item[8] . '" alt="' . $item[0] . '">';
  echo '</div>';
  echo '<div class="item__info">';
  echo '<p>' . $item[1] . '</p>';
  echo '<br>';
  echo '<h4>' . $item[4] . ' ₽</h4>';
  echo '</div>';
  echo ' <div class="item__links">';
  echo '<a href="product.php?back=shop.php&id=' . $item[0] . '" class="main__color-hover">Подробнее</a>';
  echo '<a href="#" class="main__color-hover" id="' . $item[0] . '" onclick="makeMark(' . $item[0] . ')">В закладки</a>';
  echo '</div>';
  echo '</div>';
}
