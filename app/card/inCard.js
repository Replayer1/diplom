function inCardProduct(id) {
  let obj = {
    id: id,
  };
  $("#btn-Card").addClass("button-on-white-load");
  $("#load-card").removeAttr("style");
  $.ajax({
    url: "../inc/card/inCard.php",
    type: "post",
    data: obj,
    success: function (data) {
      if (data == "NOU") {
        alert("Вам необходимо авторизироватся для совершения этого действия!");
        $("#btn-Card").removeClass("button-on-white-load");
        $("#load-card").attr("style", "display:none");
      } else {
        alert(data);
        $("#btn-Card").removeClass("button-on-white-load");
        $("#load-card").attr("style", "display:none");
      }
    },
    error: function () {
      alert("Ошибка отправки данных!");
      $("#btn-Card").removeClass("button-on-white-load");
      $("#load-card").attr("style", "display:none");
    },
  });
}
