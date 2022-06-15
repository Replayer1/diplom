$("#form_buy").submit(function () {
  event.preventDefault();
  let t = $(this);
  $("#submit").addClass("button-load");
  $("#load-card-form").removeAttr("style");
  $.ajax({
    url: "../inc/buy/buyFromProduct.php",
    type: "post",
    data: t.serialize(),
    success: function (data) {
      if (data == "NOU") {
        alert("Вам необходимо авторизироватся для совершения этого действия!");
        $("#submit").removeClass("button-load");
        $("#load-card-form").attr("style", "display:none");
      } else {
        alert(data);
        $("#submit").removeClass("button-load");
        $("#load-card-form").attr("style", "display:none");
      }
    },
    error: function () {
      alert("Ошибка отправки данных!");
      $("#submit").removeClass("button-load");
      $("#load-card-form").attr("style", "display:none");
    },
  });
});
