<?php

session_start();
require_once '../connect.php';
$user = $_SESSION['user']['id'];

$listSQL = mysqli_query($connect, "SELECT * FROM `orders` WHERE `user_id` = '$user'");

if (mysqli_num_rows($listSQL) > 0) {
  $list = mysqli_fetch_all($listSQL);
  foreach ($list as $i) {
    echo '<div class="orders-item" id="' . $i[0] . '">';
    echo '<div class="item-row">';
    echo '<div class="item-img"><img src="../' . $i[6] . '" alt="" /></div>';
    echo '<div class="item-info">';
    echo '<p>' . $i[3] . '</p>';
    echo '<h3>' . $i[5] . ' ₽</h3>';
    echo '<a href="">Статус: ';
    if ($i[8] == 'buy') {
      echo 'Куплено';
    } else if ($i[8] == 'ready') {
      echo 'Ожидает заполнения вашего адреса в настройках вашего профиля';
    } else if ($i[8] == 'send') {
      echo 'Отправленно';
    } else if ($i[8] == 'deliv') {
      echo 'Досталенно';
    } else if ($i[8] == 'end') {
      echo 'Закрыт';
    }
    echo '</a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="item-links" ><a target="_top" href="../product.php?back=profile&id=' . $i[2] . '">Страница товара</a></div>';
    echo '</div>';
  }
} else {
  echo 'Вы ничего не заказывали!';
}
