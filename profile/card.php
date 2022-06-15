<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/global.css">
  <link rel="stylesheet" href="../style/profile/card.css">
</head>

<body>
  <section class="main card" id="card">
    <div class="lds-spinner">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </section>
  <section class="all-info" id="card-info">
    <ul>
      <li>В корзине: </li>
      <li>Общая цена: </li>
    </ul>
    <div>
      <button class="btn-del" disabled>Очистить корзину</button>
      <button class="btn-conf" disabled>Купить</button>
    </div>
  </section>
</body>
<script src="../app/jQuery v3.6.0.js"></script>
<script src="../app/profile/load.js"></script>
<script src="../app/profile/del.js"></script>
<script src="../app/profile/buy.js"></script>
<script>
  loadCard()
  loadCardInfo()
</script>

</html>