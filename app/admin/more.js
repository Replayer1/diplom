function nav(id) {
  $(".display").attr("style", "display: none");
  $("#viwe-" + id).removeAttr("style");
}

$("#addCategory").submit(function () {
  event.preventDefault();
  let t = $(this);
  $.ajax({
    url: "../inc/admin/more/addCategory.php",
    type: "post",
    data: t.serialize(),
    success: function (data) {
      alert(data);
    },
    error: function () {
      alert("Ошибка отправки данных!");
    },
  });
});
