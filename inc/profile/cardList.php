<?php

session_start();
require_once '../connect.php';
$user = $_SESSION['user']['id'];

$listSQL = mysqli_query($connect, "SELECT * FROM `card` WHERE `user_id` = '$user'");

if (mysqli_num_rows($listSQL) > 0) {
  $list = mysqli_fetch_all($listSQL);
  foreach ($list as $i) {
    echo '<div class="card__item" id="' . $i[0] . '">';
    echo '<div class="card-item__info">';
    echo '<div class="card-item__img">';
    echo '<img src="../' . $i[6] . '" alt="' . $i[2] . '" />';
    echo '</div>';
    echo '<div class="card-item__info-text">';
    echo '<h3>' . $i[3] . '</h3>';
    echo '<h2>' . $i[5] . ' ₽</h2>';
    echo '<a target="_top" href="../product.php?back=profile&id=' . $i[2] . '">Подробнее</a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="card-item__btns">';
    echo '<button class="btn-conf" id="buy-' . $i[0] . '" onclick="buyCard(' . $i[0] . ')">Купить</buttos>';
    echo '<button class="btn-del" onclick="delCard(' . $i[0] . ')">Удалить</buttos>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo 'Корзина пуста!';
}
