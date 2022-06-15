<?php

session_start();
require_once '../connect.php';
$user = $_SESSION['user']['id'];

$listSQL = mysqli_query($connect, "SELECT * FROM `noties` WHERE `user_id` = '$user' ORDER BY `noties`.`date` DESC");
$list = mysqli_fetch_all($listSQL);



foreach ($list as $i) {
  if ($i[4] == 'new') {
    echo '<div class="notices-item">';
    echo '<div class="item-msg">';
    echo '<p>' . $i[2] . '</p>';
    echo '</div>';
    echo '<div class="item-info">';
    echo '<b class="noites">!</b>';
    echo '<p>' . $i[3] . '</p>';
    echo '</div>';
    echo '</div>';
  } else {
    echo '<div class="notices-item">';
    echo '<div class="item-msg">';
    echo '<p>' . $i[2] . '</p>';
    echo '</div>';
    echo '<div class="item-info">';
    echo '<p>' . $i[3] . '</p>';
    echo '</div>';
    echo '</div>';
  }
}

$listSQL = mysqli_query($connect, "UPDATE `noties` SET `status`='viwe' WHERE `user_id` = '$user'");
