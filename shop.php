<?php
session_start();
require_once 'inc/connect.php';

$catygoryesSQL = mysqli_query($connect, "SELECT * FROM `catygory`");
$catygoryes = mysqli_fetch_all($catygoryesSQL);


$productsSQL = mysqli_query($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all($productsSQL);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style/global.css" />
  <link rel="stylesheet" href="style/shop.css" />
  <title>MinderBoard</title>
</head>

<body>
  <header class="header__all">
    <div class="header__links">
      <ul>
        <li><a clas s="main__color-hover" href="index.php">Главная</a></li>
        <li><a class="main__color-hover" href="about-us.php">О нас</a></li>
        <li><a class="main__color" href="shop.php">Каталог</a></li>
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
    <section class="sort">
      <h2>Что вы хотите купить?</h2>
      <div class="sort-price">
        <div>
          <p>От</p>
          <input class="start" onkeyup="filter()" id="min" type="number" min="100" max="100000" maxlength="6" />₽
        </div>
        <div>
          <p>До</p>
          <input class="end" onkeyup="filter()" id="max" type="number" min="100" max="100000" maxlength="6" />₽
        </div>
      </div>

      <div class="sort-categories">
        <div><input type="radio" onchange="sort(this.id)" name="sort" id="all" checked /><label for="all">Все товары</label></div>
        <?php
        foreach ($catygoryes as $item) {
          echo '<div><input type="radio" onchange="sort(this.id)" name="sort" id="' . $item[1] . '" /><label for="' . $item[1] . '">' . $item[2] . '</label></div>';
        }
        ?>

      </div>
    </section>
    <section class="catalog" id="catalog">

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
<script src="app/markers/makeMark.js"></script>
<script src="inc/admin/more/test.js"></script>
<script src="app/app.js"></script>
<script>
  function load() {
    $("#catalog").load(
      "inc/catalog/productList.php",
      "update=true"
    );
  }
  load()

  let value = {
    min: '',
    max: '500000'
  }

  let sortID = 'all'

  function sort(id) {
    console.log(id)
    sortID = id
    console.log(sortID)
    $('[data-id]').each(function() {
      let idcat = $(this).data('id')
      let price = $(this).data('price')
      if (sortID == 'all' && price >= value.min && price <= value.max) {
        $(this).css("display", "flex");
      } else if (sortID == idcat && price >= value.min && price <= value.max) {
        $(this).css("display", "flex");
      } else {
        $(this).css("display", "none");
      }
    })
  }

  function filter() {
    value = {
      min: $('#min').val(),
      max: $('#max').val()
    }

    if (value.max > 100000) {
      value.max = 100000
      $('#max').val('100000')
    } else if (value.max == '') {
      value.max = 500000
    }

    if (value.min > 100000) {
      value.min = 100000
      $('#min').val('100000')
    }
    sort(sortID)
  }
</script>

</html>