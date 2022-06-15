<?php

session_start();
require_once '../connect.php';
$user = $_SESSION['user']['id'];

$listSQL = mysqli_query($connect, "SELECT * FROM `marker` WHERE `user_id` = '$user'");

if (mysqli_num_rows($listSQL) > 0) {
  $list = mysqli_fetch_all($listSQL);
  foreach ($list as $i) {

    echo '<div class="markers-item" id="' . $i[0] . '">';
    echo '<div class="item-info">';
    echo '<div class="item-img">';
    echo '<img src="../' . $i[4] . '" alt="' . $i[2] . '" />';
    echo '</div>';
    echo '<p>' . $i[3] . '</p>';
    echo '</div>';
    echo '<div class="item-links">';
    echo '<a target="_top" href="../product.php?back=profile&id=' . $i[2] . '">Подробнее</a><i class="bi bi-x-lg" onclick="delMarker(' . $i[0] . ')"></i>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo 'У вас нет закладок!';
}
