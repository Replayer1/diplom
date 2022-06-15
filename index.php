<?php

session_start();
require_once 'inc/connect.php';

$mainSQL = mysqli_query($connect, "SELECT * FROM `products` ORDER BY `products`.`buy-quantity` DESC LIMIT 1");
$main = mysqli_fetch_all($mainSQL);

$main2SQL = mysqli_query($connect, "SELECT * FROM `products` ORDER BY `products`.`buy-quantity` DESC LIMIT 5");
$main2 = mysqli_fetch_all($main2SQL);

$videocardsSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `category` = 'videocard' ORDER BY `products`.`buy-quantity` DESC LIMIT 4");
$videocards = mysqli_fetch_all($videocardsSQL);

$cpuSQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `category` = 'CPU' ORDER BY `products`.`buy-quantity` DESC LIMIT 4");
$cpu = mysqli_fetch_all($cpuSQL);


$memorySQL = mysqli_query($connect, "SELECT * FROM `products` WHERE `category` = 'memory' ORDER BY `products`.`buy-quantity` DESC LIMIT 4");
$memory = mysqli_fetch_all($memorySQL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style/global.css" />
  <link rel="stylesheet" href="style/index.css" />
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
  <main>
    <section class="main-1">


      <div class="main-1__div main-1__card">
        <div class="main-1-card__img">
          <img src="<?= $main[0][8] ?>" alt="" />
        </div>
        <div class="main-1-info">
          <div class="main-1__info-name">
            <p><?= $main[0][1] ?></p>
          </div>
          <div class="main-1__info-buttons">
            <p><?= $main[0][4] ?> ₽</p>
            <a href="product.php?back=index&id=<?= $main[0][0] ?>"><button>Подробнее</button></a>
          </div>
        </div>
      </div>


      <div class="main-1__div-plate">
        <div class="main-1__div-row">
          <div class="main-1__card-mini">
            <div class="main-1-card__img">
              <img src="<?= $main2[1][8] ?>" alt="" />
            </div>
            <div class="main-1-info">
              <div class="main-1__info-name">
                <p><?= $main2[1][1] ?></p>
              </div>
              <div class="main-1__info-buttons">
                <p><?= $main2[1][4] ?> ₽</p>
                <a href="product.php?back=index&id=<?= $main2[1][0] ?>"><button>Подробнее</button></a>
              </div>
            </div>
          </div>
          <div class="main-1__card-mini">
            <div class="main-1-card__img">
              <img src="<?= $main2[2][8] ?>" alt="" />
            </div>
            <div class="main-1-info">
              <div class="main-1__info-name">
                <p><?= $main2[2][1] ?></p>
              </div>
              <div class="main-1__info-buttons">
                <p><?= $main2[2][4] ?> ₽</p>
                <a href="product.php?back=index&id=<?= $main2[2][0] ?>"><button>Подробнее</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="main-1__div-row">
          <div class="main-1__card-mini">
            <div class="main-1-card__img">
              <img src="<?= $main2[3][8] ?>" alt="" />
            </div>
            <div class="main-1-info">
              <div class="main-1__info-name">
                <p><?= $main2[3][1] ?></p>
              </div>
              <div class="main-1__info-buttons">
                <p><?= $main2[3][4] ?> ₽</p>
                <a href="product.php?back=index&id=<?= $main2[3][0] ?>"><button>Подробнее</button></a>
              </div>
            </div>
          </div>
          <div class="main-1__card-mini">
            <div class="main-1-card__img">
              <img src="<?= $main2[4][8] ?>" alt="" />
            </div>
            <div class="main-1-info">
              <div class="main-1__info-name">
                <p><?= $main2[4][1] ?></p>
              </div>
              <div class="main-1__info-buttons">
                <p><?= $main2[4][4] ?> ₽</p>
                <a href="product.php?back=index&id=<?= $main2[4][0] ?>"><button>Подробнее</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="main-2">
      <h3>Видеокарты</h3>
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

      <h3>Поцессоры</h3>
      <div class="main-2__product-row">
        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $cpu[0][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $cpu[0][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $cpu[0][0] ?>">Подробнее</a></a><a id="<?= $cpu[0][0] ?>" onclick="makeMark(<?= $cpu[0][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $cpu[1][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $cpu[1][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $cpu[1][0] ?>">Подробнее</a><a id="<?= $cpu[1][0] ?>" onclick="makeMark(<?= $cpu[1][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $cpu[2][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $cpu[2][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $cpu[2][0] ?>">Подробнее</a><a id="<?= $cpu[2][0] ?>" onclick="makeMark(<?= $cpu[2][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $cpu[3][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $cpu[3][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $cpu[3][0] ?>">Подробнее</a><a id="<?= $cpu[3][0] ?>" onclick="makeMark(<?= $cpu[3][0] ?>)">В закладки</a>
          </div>
        </div>
      </div>

      <h3>Оперативная память</h3>
      <div class="main-2__product-row">
        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $memory[0][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $memory[0][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $memory[0][0] ?>">Подробнее</a><a id="<?= $memory[0][0] ?>" onclick="makeMark(<?= $memory[0][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $memory[1][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $memory[1][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $memory[1][0] ?>">Подробнее</a><a id="<?= $memory[1][0] ?>" onclick="makeMark(<?= $memory[1][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $memory[2][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $memory[2][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $memory[2][0] ?>">Подробнее</a><a id="<?= $memory[2][0] ?>" onclick="makeMark(<?= $memory[2][0] ?>)">В закладки</a>
          </div>
        </div>

        <div class="main-2__row-item">
          <div class="main-2__item-img">
            <img src="<?= $memory[3][8] ?>" alt="" />
          </div>
          <div class="main-2__item-info">
            <p><?= $memory[3][4] ?> ₽</p>
          </div>
          <div class="main-2__item-links">
            <a href="product.php?back=index&id=<?= $memory[3][0] ?>">Подробнее</a><a id="<?= $memory[3][0] ?>" onclick="makeMark(<?= $memory[3][0] ?>)">В закладки</a>
          </div>
        </div>
      </div>

    </section>
    <section class="main-3">
      <div class="main-3__img">
        <img src="media/img/svg/Group 11.svg" alt="" />
      </div>
      <div class="main-3__text">
        <h2>MinderBoard</h2>
        <hr />
        <a href="about-us.php">Узнайте о нас большее -></a>
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
<script src="app/markers/makeMark.js"></script>

</html>