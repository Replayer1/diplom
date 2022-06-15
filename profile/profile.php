<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/global.css" />
  <link rel="stylesheet" href="../style/profile/profile.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
</head>

<body id="update">
  <h1>Информация о пользователе</h1>
  <form action="" id="form">
    <label for="name">Имя</label>
    <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>">
    <label for="surname">Фамилия</label>
    <input type="text" name="surname" value="<?= $_SESSION['user']['surname'] ?>">
    <label for="secendname">Отчество</label>
    <input type="text" name="secendname" value="<?= $_SESSION['user']['secendname'] ?>">
    <label for="email">email</label>
    <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>">
    <label for="phone">Номер телефона</label>
    <input type="tel" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
    <label for="adress">Адресс</label>
    <input type="text" name="adress" value="
      <?php
      if (isset($_SESSION['user']['adress'])) {
        echo ' ';
      } else {
        echo $_SESSION['user']['adress'];
      }
      ?>
    ">
    <label for="login">Логин</label>
    <input type="text" name="login" value="<?= $_SESSION['user']['login'] ?>">
    <input type="submit" value="Применить изменения">
  </form>
</body>


<script src="../app/jQuery v3.6.0.js"></script>
<script src="../app/profile/update.js"></script>
<script src="..app/profile/load.js"></script>

</html>