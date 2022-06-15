function buyCard(id) {
  let t = $("#buy-" + id);
  t.html('<div id="load-card" class="refreshing-loader"></div>');

  let conf = confirm("Вы уверены что хотите купить этот товар?");

  if (conf) {
    let obj = { id: id };
    $.ajax({
      url: "../inc/buy/buyFromProfile.php",
      type: "post",
      data: obj,
      success: function (data) {
        alert(data);
        $("#" + id).css("display", "none");
        loadCardInfo();
      },
      error: function () {
        alert("Ошибка отправки данных!");
        t.html("Купить");
      },
    });
  }
}

function buyAllCard() {
  let t = $("#buyAll");
  t.html('<div id="load-card" class="refreshing-loader"></div>');

  let conf = confirm("Вы уверены что хотите купить все товары из карзины?");

  if (conf) {
    let promp = prompt("Укажите свой пароль что-бы совершить данное действие!");
    let obj = {
      password: promp,
    };
    $.ajax({
      url: "../inc/buy/buyFromProfileAll.php",
      type: "post",
      data: obj,
      success: function (data) {
        if (data == "badpass") {
          alert("Пароль который вы ввели и ваш пароль не совподают!");
          t.html('Купить');
        } else {
          alert(data);
          $("#card").html('Корзина пуста!');
          loadCardInfo();
        }
      },
      error: function () {
        alert("Ошибка отправки данных!");
        t.html("Купить");
      },
    });
  }
}
