<?php

session_start();
require_once 'inc/connect.php';

$id = $_GET['id'];
$link = $_GET['back'];
$user_id = $_SESSION['user']['id'];

$mainSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
$main = mysqli_fetch_all($mainSQL);

$cat = $main[0][5];

$videocardsSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `category` = '$cat' ORDER BY `products`.`buy-quantity` DESC LIMIT 4");
$videocards = mysqli_fetch_all($videocardsSQL);

$mark_check = mysqli_query($connect, "SELECT * FROM `marker` WHERE `user_id` = '$user_id' AND `product_id` = '$id'");
$mark_check_f = mysqli_fetch_all($mark_check);
if (count($mark_check_f) > 0) {
  $in_mark = true;
} else {
  $in_mark = false;
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
  <link rel="stylesheet" href="style/product.css" />
  <title>MinderBoard</title>
</head>

<body>
  <header class="header__all">
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
  <section class="modalWindow" id="modalBuy" style="display: none;">
    <div class="x"><i class="bi bi-x-lg" onclick="exit()"></i></div>
    <form id="form_buy">
      <label for="">Заказать: <br> <?= $main[0][1] ?></label>
      <input type="text" name="id" value="<?= $main[0][0] ?>" style="display: none;">
      <div class="input-number">
        <input type="number" onblur="valid()" id="number" name="quantity" placeholder="0" value="1" max='10' min='1'><span onclick="math(1)">−</span><span onclick="math(2)">+</span>
      </div>
      <input type="password" placeholder="Ваш пароль" name="password">
      <button class="" id="submit" type="submit">
        <div id="load-card-form" style="display: none;" class="refreshing-loader"></div>Заказать
      </button>
    </form>
  </section>
  <main>
    <section class="main-1">
      <a href="<?= $link ?>.php">
        🠐Назад</a>
      <div class="container">
        <div class="main-1__justify">
          <div class="product__img">
            <img src="<?= $main[0][8] ?>" alt="">
          </div>
          <div class="product__info">
            <div>
              <h3 class="info-name"><?= $main[0][1] ?></h3>
              <p class="info-info"><?= $main[0][2] ?></p>
            </div>
            <div>
              <p class="info-quantity">В наличии <span class="main__color"><?= $main[0][6] ?></span> шт.</p>
              <p class="info-price"><span class="main__color"><?= $main[0][4] ?></span> ₽</p>
            </div>
          </div>
        </div>
        <div class="product__links"><span onclick="makeMarkInProduct(<?= $id ?>, <?= $in_mark ?>)" id="bi">
            <?php
            if ($in_mark) {
              echo '<i class="bi bi-suit-heart-fill"></i>';
            } else {
              echo '<i class="bi bi-suit-heart"></i>';
            }
            ?>
          </span><button class="button-on-white" id="btn-Card" onclick="inCardProduct(<?= $id ?>)">
            <div id="load-card" style="display: none;" class="refreshing-loader"></div> В корзину
          </button><button class="button-on-white" onclick="show()">Купить</button></div>
      </div>
    </section>
    <section class="main-2">
      <h3>Похожее</h3>
      <div class="main-2__product-row">
        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $videocards[0][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $videocards[0][4] ?> ₽</p>

          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $videocards[0][0] ?>">Подробнее</a><a id="<?= $videocards[0][0] ?>" onclick="makeMark(<?= $videocards[0][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $videocards[1][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $videocards[1][4] ?> ₽</p>

          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $videocards[1][0] ?>">Подробнее</a></a><a id="<?= $videocards[1][0] ?>" onclick="makeMark(<?= $videocards[1][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $videocards[2][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $videocards[2][4] ?> ₽</p>

          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $videocards[2][0] ?>">Подробнее</a></a><a id="<?= $videocards[2][0] ?>" onclick="makeMark(<?= $videocards[2][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $videocards[3][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $videocards[3][4] ?> ₽</p>

          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $videocards[3][0] ?>">Подробнее</a></a><a id="<?= $videocards[3][0] ?>" onclick="makeMark(<?= $videocards[3][0] ?>)">В закладки</a>
          </div>
        </div>
      </div>
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
<script src="app/markers/makeMark.js"></script>
<script src="app/card/inCard.js"></script>
<script src="app/buy/modalWindow.js"></script>
<script src="app/buy/buyFromProduct.js"></script>


</html>