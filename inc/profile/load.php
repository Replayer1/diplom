<?php
session_start();

  echo '<h1>Информация о пользователе</h1>';
  echo '<form action="" id="form">';
  echo '  <label for="name">Имя</label>';
  echo '  <input type="text" name="name" value="'.$_SESSION['user']['name'] .'">';
  echo '  <label for="surname">Фамилия</label>';
  echo '  <input type="text" name="surname" value="'.$_SESSION['user']['surname'] .'">';
  echo '  <label for="secendname">Отчество</label>';
  echo '  <input type="text" name="secendname" value="'.$_SESSION['user']['secendname'] .'">';
  echo '  <label for="email">email</label>';
  echo '  <input type="email" name="email" value="'.$_SESSION['user']['email'] .'">';
  echo '  <label for="phone">Номер телефона</label>';
  echo '  <input type="tel" name="phone" value="'.$_SESSION['user']['phone'] .'">';
  echo '  <label for="adress">Адресс</label>';
  echo '  <input type="text" name="adress" value="';
  // if (isset($_SESSION['user']['adress'])) {
  //   echo '';
  // } else {
    echo $_SESSION['user']['adress'];
  // };
  echo '  ">';
  echo '  <label for="login">Логин</label>';
  echo '  <input type="text" name="login" value="'.$_SESSION['user']['login'] .'">';
  echo '  <input type="submit" value="Применить изменения">';
  echo '</form>';
