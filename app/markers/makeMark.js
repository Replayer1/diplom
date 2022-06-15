function makeMark(id) {
  event.preventDefault();
  let obj = {
    id: id,
  };
  $("#" + id).attr(
    "style",
    "border-bottom: 1px solid #ff610c80; color: #ff610c80;"
  );
  $("#" + id).removeAttr("onclick");
  $.ajax({
    url: "../inc/markers/makeMark.php",
    type: "post",
    data: obj,
    success: function (data) {
      if (data == "NOU") {
        alert("Вам необходимо авторизироватся");
        $("#" + id).removeAttr("style");
        $("#" + id).attr("onclick", "makeMark(" + id + ")");
      } else if (data == "ERR") {
        console.log(data);
        $("#" + id).removeAttr("style");
        $("#" + id).attr("onclick", "makeMark(" + id + ")");
      } else if (data == "NOWIN") {
        if (
          confirm("Данный продукт уже в закладках, убрать его из закладок?")
        ) {
          $.ajax({
            url: "../inc/markers/delMark.php",
            type: "post",
            data: obj,
            success: function (data) {
              console.log(data);
              $("#" + id).removeAttr("style");
              $("#" + id).attr((onclick = "makeMark('+id+')"));
            },
            error: function () {
              alert("Ошибка отправки данных!");
              $("#" + id).removeAttr("style");
              $("#" + id).attr((onclick = "makeMark('+id+')"));
            },
          });
        } else {
          $("#" + id).removeAttr("style");
          $("#" + id).attr("onclick", "makeMark(" + id + ")");
        }
      } else {
        console.log(data);
        $("#" + id).removeAttr("style");
        $("#" + id).attr("onclick", "makeMark(" + id + ")");
      }
    },
    error: function () {
      alert("Ошибка отправки данных!");
    },
  });
}

function makeMarkInProduct(id, val) {
  let obj = {
    id: id,
  };
  
  if (val) {
    $("#bi").html('<i class="bi bi-suit-heart"></i>');
    $.ajax({
      url: "../inc/markers/delMark.php",
      type: "post",
      data: obj,
      success: function (data) {
        console.log(data);
      },
      error: function () {
        alert("Ошибка отправки данных!");
      },
    });
  } else {
    $("#bi").html('<i class="bi bi-suit-heart-fill"></i>');
    makeMark(id);
  }
}
