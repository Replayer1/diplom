<?php

session_start();
require_once '../connect.php';
$user = $_SESSION['user']['id'];

$listSQL = mysqli_query($connect, "SELECT * FROM `card` WHERE `user_id` = '$user'");

if (mysqli_num_rows($listSQL) > 0) {
  $list = mysqli_fetch_all($listSQL);
  $price = 0;
  foreach ($list as $i) {
    $price = $price + $i[4];
  }
  $lehgt = count($list);
  echo '<ul>';
  echo '<li>В корзине: ' . $lehgt . ' предмета</li>';
  echo '<li>Общая цена: ' . number_format($price, 0, '.', ' ') . ' ₽</li>';
  echo '</ul>';
  echo '<div>';
  echo '<button class="btn-del" onclick="delAllCard()">Очистить корзину</button>';
  echo '<button class="btn-conf" id="buyAll" onclick="buyAllCard()">Купить</button>';
  echo '</div>';
} else {
  echo '<ul>';
  echo '<li>В корзине:</li>';
  echo '<li>Общая цена:</li>';
  echo '</ul>';
  echo '<div>';
  echo '<button class="btn-del" disabled>Очистить корзину</button>';
  echo '<button class="btn-conf" disabled>Купить</button>';
  echo '</div>';
}
