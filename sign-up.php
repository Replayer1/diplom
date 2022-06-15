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
        <li><a class="main__color-hover" href="sign-in.php">Войти</a></li>
        <li>
          <a class="main__color" href="sign-up.php">Зарегистрироваться</a>
        </li>
      </ul>
    </div>
  </header>
  <main>
    <label class="h1" for="">Регистрация</label>
    <form id="form">
      <label for="">Ф.И.О</label>
      <input class="input" required type="text" placeholder="Иванов Иван Иванович" name="name" id="name" />
      <span id="error-text" style="display: none"></span>
      <label for="login">Логин</label>
      <input class="input" required type="text" placeholder="Ivan" name="login" id="login" />
      <label for="email">Email</label>
      <input class="input" required type="email" placeholder="youremail@mail.com" name="email" id="email" />
      <label for="tel">Номер телефона</label>
      <input class="input" type="tel" placeholder="+7 999 000 00 00" name="tel" id="tel" />
      <label for="password">Пароль</label>
      <input class="input" required type="password" placeholder="•••••••••••••" name="password" id="password" />
      <label for="conf_password">Повторите пароль</label>
      <input class="input" required type="password" placeholder="•••••••••••••" name="conf_password" id="conf_password" />
      <label for="file">Изображение профиля</label>
      <label class="input" for="file" id="file_name">Загрузить файл</label>
      <input type="file" id="file" name="file" style="display: none" />
      <button id="load_btn" class="input button-on-white">
        <div id="load" style="display: none;" class="refreshing-loader"></div> Зарегестрироватся
      </button>
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
  $("#file").change(function(e) {
    if (e.target.files[0].name.length > 28) {
      $("#file_name").html(e.target.files[0].name.split("", 28));
      $("#file_name").append(
        "..." + e.target.files[0].name.split(".").pop().toLowerCase()
      );
      $("#file_name").addClass("upload__file");
    } else {
      $("#file_name").html(e.target.files[0].name);
      $("#file_name").addClass("upload__file");
    }
  });

  $("form").submit(function() {
    event.preventDefault();
    let t = $(this);
    let nameA = [];

    function isCorrectFIO(fio) {
      if (!fio) {
        return false;
      }

      let fioA = fio.split(" ");
      console.log(fioA)
      if (fioA.length !== 3 && fioA[3] != "") {
        return false;
      }

      for (var i = 0; i < 3; i++) {
        if (/[^-А-ЯA-Z\x27а-яa-z]/.test(fioA[i])) {
          return false;
        }
      }
      nameA = fioA
      return true;
    }

    function isPassComf(pass, confPass) {
      if (pass === confPass) {
        return true
      } else {
        return false
      }
    }



    if (isCorrectFIO($("#name").val())) {
      if (isPassComf($("#password").val(), $("#conf_password").val())) {
        formData = new FormData(t.get(0));
        $('#load').attr('style', 'display:block')
        $('#load_btn').addClass('load')
        $.ajax({
          url: "inc/sign/sign-up.php",
          type: "post",
          contentType: false,
          processData: false,
          data: formData,
          success: function(data) {
            // console.log(data)
            $(location).attr("href", "sign-in.php");
          },
          error: function() {
            alert("Ошибка отправки данных!");
            $('#load').attr('style', 'display:none')
            $('#load_btn').removeClass('load')
          },
        });
      } else {
        alert("Пароли не совподают!");
        $('#load').attr('style', 'display:none')
        $('#load_btn').removeClass('load')
      }

    } else {
      $("#error-text").text("Данные введены не верно!");
      $("#error-text").attr("style", "display:block;");
      $("#name").attr("style", "border:1px solid #ff300c;");
      console.log("1qq");
    }

  });
</script>



</html>