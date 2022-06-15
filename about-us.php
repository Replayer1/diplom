<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style/global.css" />
  <link rel="stylesheet" href="style/about-us.css" />
  <title>MinderBoard</title>
</head>

<body>
  <header class="header__all">
    <div class="header__links">
      <ul>
        <li><a class="main__color-hover" href="index.php">Главная</a></li>
        <li><a class="main__color" href="about-us.php">О нас</a></li>
        <li><a class="main__color-hover" href="shop.php">Каталог</a></li>
      </ul>
    </div>
    <div class="header__logo">
      <a class="main__color textlogo" href="index.php">MinderBoard</a>
    </div>
    <div class="header__sign">
      <ul>
        <?php
        if (isset($_SESSION['user'])) {
          echo '<li><a class="main__color-hover" href="profile.php">Профиль</a></li>';
        } else {
          echo '<li><a class="main__color-hover" href="sign-in.php">Войти</a></li>';
          echo '<li>';
          echo '  <a class="main__color-hover" href="sign-up.php">Зарегистрироваться</a>';
          echo '</li>';
          echo $_SESSION['user'];
        }
        ?>
      </ul>
    </div>
  </header>
  <main>
    <section class="main-1">
      <div class="main-1__img">
        <img src="media/img/svg/grouo 12.svg" alt="" />
      </div>
      <div class="main-1__text">
        <h2>MinderBoard</h2>
        <hr />
        <p>Магазин компьютерной техники</p>
      </div>
    </section>
    <section class="main-2">
      <div class="main-2__title">
        <h3>Что мы можем рассказать о себе?</h3>
        <hr />
        <p>
          Мы предлагаем своим покупателям несколько сотен товаров для
          компютеров и аксесуаров.
        </p>
      </div>
      <div class="main-2__info">
        <div class="main-2__info-left">
          <p>
            Помимо эффективного формата розничной торговли и ориентированной
            на покупателя концепции магазина, компания предлагает клиентам
            высококлассную сервисную поддержку под брендом «М.Service»
          </p>
        </div>
        <div class="main-2__info-img">
          <img src="media/img/svg/Group 20.svg" alt="" />
        </div>
        <div class="main-2__info-right">
          <p>
            Первый интернет-магазин «МinderBoard» был открыт в 2022 году и
            начал внедрение омниканальной бизнес-модели. Концепция ONE RETAIL
            — следующий шаг в цифровой трансформации нашего бизнеса,
            заключающийся в создании единого опыта приобретения
            потребительской электроники во всех точках контакта Группы и
            клиента — на интернет-сайте.
          </p>
        </div>
      </div>
      <div class="main-2__title-2">
        <h1>Преимущества компании</h1>
      </div>
      <div class="main-2__plus">
        <div>
          <i class="bi bi-hand-thumbs-up main__color"></i>
          <p>
            Нашим приоритетом является создание лучшего и однородного
            клиентского опыта во всех каналах продаж.
          </p>
        </div>
        <div>
          <i class="bi bi-gem main__color"></i>
          <p>
            Наше отличие от других комспаний заключается в качестве ,
            продуктовой и ассортиментной политики
          </p>
        </div>
        <div>
          <i class="bi bi-award main__color"></i>
          <p>Большой ассортимент и низкие цены. Удобные способы оплаты</p>
        </div>
      </div>
    </section>
    <section class="main-3">
      <h3>Наши контакты</h3>
      <div class="main-3__container">
        <div class="main-3__info">
          <p>Телефон: <span class="main__color"> +88005553535 </span></p>
          <p>Почта:<span class="main__color">minderboard@mail.com</span></p>
        </div>
        <div class="main-3__form">
          <form id="sendMassage">
            <label for="email">Email</label>
            <input placeholder="youremail@mail.com" name="email" type="email" />
            <label for="name">Имя</label>
            <input placeholder="Иван Иванов Иванович" name="name" type="text" />
            <label for="msg">Сообщение</label>
            <textarea placeholder="Сообщение" name="msg" maxlength="600" style="width: 100%; height: 140px"></textarea>
            <button type="submit">Отправить</button>
          </form>
        </div>
      </div>
    </section>
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
  $("#sendMassage").submit(function() {
    event.preventDefault();
    let t = $(this)
    $.ajax({
      url: "inc/about-us/sendMessage.php",
      type: "post",
      data: t.serialize(),
      success: function(data) {
        alert(data);
      },
      error: function() {
        alert("Ошибка отправки данных!");
      },
    });
  })
</script>

</html>