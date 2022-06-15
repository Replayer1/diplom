$("#form").submit(function () {
  event.preventDefault();
  console.log("qwe");
  const t = $(this);
  let conf = confirm("Вы действительно хотите изменить данные об акаунте?");
  if (conf) {
    $.ajax({
      url: "../inc/profile/updata.php",
      type: "post",
      data: t.serialize(),
      success: function (data) {
        console.log(data);
        alert("Данные успешно обнавленны");
        loadUpdata();
      },
      error: function () {
        alert("Ошибка отправки данных!");
      },
    });
  }
});
