function nav(id) {
  $(".display").attr("style", "display: none");
  $("#product_" + id).removeAttr("style");
}

function load() {
  $("#product_list").load(
    "../inc/admin/product/product-list.php",
    "update=true"
  );
}

$("#file").change(function (e) {
  if (e.target.files[0].name.length > 28) {
    $("#file_name").html(e.target.files[0].name.split("", 28));
    $("#file_name").append(
      "..." + e.target.files[0].name.split(".").pop().toLowerCase()
    );
    $("#file_name").addClass("upload__file");
  } else {
    $("#file_name").html(e.target.files[0].name);
    $("#file_name").addClass("upload__file");
  }
});

$("form").submit(function () {
  event.preventDefault();
  let t = $(this);

  formData = new FormData(t.get(0));
  $("#load").attr("style", "display:block");
  $("#load_btn").addClass("load");
  $.ajax({
    url: "../inc/admin/product/createProduct.php",
    type: "post",
    contentType: false,
    processData: false,
    data: formData,
    success: function (data) {
      alert(data);
      load();
    },
    error: function () {
      alert("Ошибка отправки данных!");
    },
  });
});

function delProd(id) {
  let quest = confirm("Вы уверены что хотиту удалить " + id + " товар?");
  if (quest) {
    $("#product_list").html(
      '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    );
    let obj = {
      id: id,
    };
    $.ajax({
      url: "../inc/admin/product/deleteProduct.php",
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

$("#serch-product").submit(function () {
  event.preventDefault();
  let t = $(this);
  $("#serch-table").html(
    '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
  );
  $.ajax({
    url: "../inc/admin/product/serchProduct.php",
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

$(document).ready(function () {
  load();
});
