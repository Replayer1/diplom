<?php
session_start();

if (isset($_SESSION['user'])) {
  header('Location: profile.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style/global.css" />
  <link rel="stylesheet" href="style/sign.css" />

  <title>MinderBoard</title>
</head>

<body>
  <header class="header__all">
    <div class="header__links">
      <ul>
        <li><a class="main__color-hover" href="index.php">Главная</a></li>
        <li><a class="main__color-hover" href="about-us.php">О нас</a></li>
        <li><a class="main__color-hover" href="shop.php">Каталог</a></li>
      </ul>
    </div>
    <div class="header__logo">
      <a class="main__color textlogo" href="index.php">MinderBoard</a>
    </div>
    <div class="header__sign">
      <ul>
        <li><a class="main__color" href="sign-in.php">Войти</a></li>
        <li>
          <a class="main__color-hover" href="sign-up.php">Зарегистрироваться</a>
        </li>
      </ul>
    </div>
  </header>
  <main>
    <label class="h1" for="">Авторизация</label>
    <form id="log-in">
      <label for="name">Логин</label>
      <input class="input" required type="text" placeholder="Ivan" name="name" />
      <label for="password">Пароль</label>
      <input class="input" required type="password" placeholder="•••••••••••••" name="password" id="" />
      <button id="load_btn" class="input button-on-white">
        <div id="load" style="display: none;" class="refreshing-loader"></div>Войти
      </button>
      <p></p>
    </form>
  </main>
  <footer>
    <div class="footer__links">
      <a href=""><i class="bi bi-twitter main__color"></i></a>
      <a href=""><i class="bi bi-telegram main__color"></i></a>
      <a href=""><i class="bi bi-facebook main__color"></i></a>
    </div>
    <div class="footer__logo">
      <a href="index.php"><img src="media/img/svg/Group 10.svg" alt="logo" /></a>
    </div>
    <div class="footer__email main__color">minderboard@mail.com</div>
  </footer>
</body>
<script src="app/jQuery v3.6.0.js"></script>
<script src="app/app.js"></script>
<script>
  $('#log-in').submit(function() {
    event.preventDefault();
    let t = $(this)
    $('#load').attr('style', 'display:block')
    $('#load_btn').addClass('load')
    $.ajax({
      url: "inc/sign/sign-in.php",
      type: "post",
      data: t.serialize(),
      success: function(data) {
        if (data == 'user') {
          $(location).attr("href", "profile.php");
        } else if (data == 'admin') {
          $(location).attr("href", "admin.php");
        } else {
          alert('Такого пользователя не существует!');
          $('#load').attr('style', 'display:none')
          $('#load_btn').removeClass('load')
        }
      },
      error: function() {
        alert("Ошибка отправки данных!");
        $('#load').attr('style', 'display:none')
        $('#load_btn').removeClass('load')
      },
    });
  })
</script>

</html>