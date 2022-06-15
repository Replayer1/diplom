<?php
session_start();
require_once 'inc/connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/global.css">
  <link rel="stylesheet" href="style/admin.css">
  <title>Admin Panel</title>
</head>

<body>
  <header>
    <h3><span class="main__color">Admin</span>Panel</h3>
  </header>
  <nav>
    <div class="nav">
      <ul>
        <input onchange="nav(this.id)" type="radio" name="iframe" id="users" checked>
        <label for="users">
          <li>Пользователи</li>
        </label>
        <input onchange="nav(this.id)" type="radio" name="iframe" id="orders">
        <label for="orders">
          <li>Заказы</li>
        </label>
        <input onchange="nav(this.id)" type="radio" name="iframe" id="product">
        <label for="product">
          <li>Товары</li>
        </label>
        <input onchange="nav(this.id)" type="radio" name="iframe" id="question">
        <label for="question">
          <li>Вопросы пользователей</li>
        </label>
        <input onchange="nav(this.id)" type="radio" name="iframe" id="more">
        <label for="more">
          <li>Ещё...</li>
        </label>
      </ul>
    </div>
  </nav>
  <main>
    <iframe class="display" id="iframe_users" src="admin/users.php" frameborder="0"></iframe>
    <iframe class="display" id="iframe_orders" src="" frameborder="0" style="display: none;"></iframe>
    <iframe class="display" id="iframe_product" src="admin/products.php" frameborder="0" style="display: none;"></iframe>
    <iframe class="display" id="iframe_question" src="" frameborder="0" style="display: none;"></iframe>
    <iframe class="display" id="iframe_more" src="admin/more.php" frameborder="0" style="display: none;"></iframe>
  </main>
</body>

<script src="app/jQuery v3.6.0.js"></script>
<script src="app/admin/app.js"></script>

</html>