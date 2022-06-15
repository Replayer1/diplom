<?php
session_start();
require_once '../inc/connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<!--  -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/global.css">
  <link rel="stylesheet" href="../style/admin/users.css">
  <title>Document</title>
</head>

<body>
  <nav>
    <input onchange="nav(this.id)" type="radio" id="list" name="nav" checked><label for="list">Список пользователей</label>
    <input onchange="nav(this.id)" type="radio" id="serch" name="nav"><label for="serch">Найти пользователей</label>
    <input onchange="nav(this.id)" type="radio" id="chenge" name="nav"><label for="chenge">Редактирование пользователей</label>
  </nav>
  <div class="display" id="user_list">
    <div class="lds-roller">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>


  <div class="display" id="user_serch" style="display: none;">
    <form id="serch-user">
      <label for="select">Найди по:</label>
      <select name="select" id="select">
        <option value="id">ID</option>
        <option value="name">Имя</option>
        <option value="surname">Фамилия</option>
        <option value="secendname">Отчество</option>
        <option value="login">Логин</option>
        <option value="email">Email</option>
        <option value="phone">Телефон</option>
      </select>
      <label for="serch">Найти:</label>
      <input type="text" id="serch" name="serch">
      <button>Найти</button>
    </form>
    <div id="serch-table"></div>
  </div>


  <div class="display" id="user_chenge" style="display: none;">
    <form id="chenge-user">
      <input type="text" id="id" name="id" placeholder="ID">
      <br>
      <input type="text" name="name" placeholder="Имя">
      <input type="text" name="surname" placeholder="Фамилия">
      <input type="text" name="secendname" placeholder="Отчество">
      <input type="text" name="email" placeholder="Email">
      <input type="text" name="phone" placeholder="Телефон">
      <input type="text" name="adress" placeholder="Адрес">
      <input type="text" name="buy" placeholder="Число заказов">
      <input type="text" name="status" placeholder="Статус">
      <input type="text" name="img" placeholder="img">
      <input type="text" name="login" placeholder="Логин">
      <input type="text" name="password" placeholder="Пароль">
      <button>Изменить</button>
    </form>
  </div>
</body>

<script src="../app/jQuery v3.6.0.js"></script>
<script src="../app/admin/users.js"></script>

</html>