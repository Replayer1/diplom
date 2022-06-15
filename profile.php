<?php
session_start();
require_once 'inc/connect.php';
if (!isset($_SESSION['user'])) {
  header('Location: sign-in.php');
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
  <link rel="stylesheet" href="style/profile.css" />

  <title>MinderBoard</title>
</head>

<body>
  <header>
    <div class="header__links">
      <ul>
        <li><a class="main__color" href="index.php">Главная</a></li>
        <li><a class="main__color-hover" href="about-us.php">О нас</a></li>
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
    <div class="profile__section-1">
      <div class="section-1-row">
        <div class="section-1-img">
          <?php
          if ($_SESSION['user']['img'] != NULL) {
            echo '<img src="' . $_SESSION['user']['img'] . '" alt=""/>';
          } else {
            echo '<img src="media/img/profile-pic/blank-profile-picture-973460__480.webp" alt=""/>';
          }
          ?>
        </div>
        <div class="section-1-info">


          <h3><?= $_SESSION['user']['name'] ?></h3>
          <h3><?= $_SESSION['user']['surname'] ?></h3>
          <h3><?= $_SESSION['user']['secendname'] ?></h3>
          <p class="main__color"><?= $_SESSION['user']['email'] ?></p>
        </div>
      </div>
      <div class="section-1-links">
        <a href="inc/sign/sign-out.php">Выход</a>
      </div>
    </div>
    <div class="profile__section-2">
      <div class="section-2__nav">
        <nav>
          <input onclick="changeFrame(this.id)" type="radio" name="pages" id="card" checked />
          <label for="card">Корзина</label>
          <input onclick="changeFrame(this.id)" type="radio" name="pages" id="markers" />
          <label for="markers">Закладки</label>
          <input onclick="changeFrame(this.id)" type="radio" name="pages" id="orders" />
          <label for="orders">Заказы</label>
          <input onclick="changeFrame(this.id)" type="radio" name="pages" id="notices" />
          <label for="notices">Уведомления</label>
          <input onclick="changeFrame(this.id)" type="radio" name="pages" id="profile" />
          <label for="profile">Профиль</label>
        </nav>
      </div>
      <div class="section-2__iframe">
        <iframe style="display: flex" id="iframecard" src="profile/card.php" frameborder="0"></iframe>
        <iframe style="display: none" id="iframemarkers" src="profile/markers.php" frameborder="0"></iframe>
        <iframe style="display: none" id="iframeorders" src="profile/orders.php" frameborder="0"></iframe>
        <iframe style="display: none" id="iframenotices" src="profile/notices.php" frameborder="0"></iframe>
        <iframe style="display: none" id="iframeprofile" src="profile/profile.php" frameborder="0"></iframe>
      </div>
    </div>
  </main>
</body>
<script src="app/jQuery v3.6.0.js"></script>
<script>
  function changeFrame(id) {
    $("#iframecard").attr('style', 'display:none')
    $("#iframemarkers").attr('style', 'display:none')
    $("#iframeorders").attr('style', 'display:none')
    $("#iframenotices").attr('style', 'display:none')
    $("#iframeprofile").attr('style', 'display:none')
    $('#iframe' + id).attr('style', 'display:flex');
  }
</script>

</html>