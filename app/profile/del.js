function delMarker(id) {
  $("#" + id).html(
    '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
  );
  let obj = {
    id: id,
  };
  $.ajax({
    url: "../inc/markers/delMark.php",
    type: "post",
    data: obj,
    success: function (data) {
      console.log(data);
      $("#" + id).css("display", "none");
    },
    error: function () {
      alert("Ошибка отправки данных!");
    },
  });
}

function delCard(id) {
  $("#" + id).html(
    '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
  );
  let obj = {
    id: id,
  };
  $.ajax({
    url: "../inc/card/delCard.php",
    type: "post",
    data: obj,
    success: function (data) {
      console.log(data);
      $("#" + id).css("display", "none");
      loadCardInfo();
    },
    error: function () {
      alert("Ошибка отправки данных!");
    },
  });
}

function delAllCard() {
  $("#card").html(
    '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
  );
  let conf = confirm("Вы действительно хотите очистить корзину?");
  if (conf) {
    $.ajax({
      url: "../inc/card/delAllCard.php",
      type: "post",
      success: function (data) {
        console.log(data);
        loadCard();
        loadCardInfo();
      },
      error: function () {
        alert("Ошибка отправки данных!");
      },
    });
  }
}
