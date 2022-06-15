function load() {
  $("#user_list").load("../inc/admin/users/user-list.php", "update=true");
}

function delAcc(id) {
  let quest = confirm("Вы уверены что хотиту удалить " + id + " пользователя?");
  if (quest) {
    $("#user_list").html(
      '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    );
    let obj = {
      id: id,
    };
    $.ajax({
      url: "../inc/admin/users/deleteUser.php",
      type: "post",
      data: obj,
      success: function (data) {
        alert(data);
        load();
      },
      error: function () {
        alert("Ошибка отправки данных!");
        load();
      },
    });
  }
}

function nav(id) {
  $(".display").attr("style", "display: none");
  $("#user_" + id).removeAttr("style");
}

$("#serch-user").submit(function () {
  event.preventDefault();
  let t = $(this);
  $("#serch-table").html(
    '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
  );
  $.ajax({
    url: "../inc/admin/users/serchUser.php",
    type: "post",
    data: t.serialize(),
    success: function (data) {
      $("#serch-table").html(data);
    },
    error: function () {
      alert("Ошибка отправки данных!");
    },
  });
});

$("#chenge-user").submit(function () {
  event.preventDefault();
  let t = $(this);
  $.ajax({
    url: "../inc/admin/users/chengeUser.php",
    type: "post",
    data: t.serialize(),
    success: function (data) {
      alert(data);
      load();
    },
    error: function () {
      alert("Ошибка отправки данных!");
    },
  });
});

$(document).ready(function () {
  load();
});
