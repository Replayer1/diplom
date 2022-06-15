function show() {
  $("#modalBuy").removeAttr("style");
  $("body").attr("style", "overflow:hidden");
}

function exit() {
  $("#modalBuy").attr("style", "display:none");
  $("body").removeAttr("style");
}

function math(a) {
  let namber = $("#number").val();
  if (a == 1) {
    if (namber > 1) {
      namber--;
      $("#number").val(namber);
    }
  }
  if (a == 2) {
    if (namber < 10) {
      namber++;
      $("#number").val(namber);
    }
  }
}

function valid() {
  let namber = $("#number").val();
  if (namber > 10) {
    $("#number").val(10);
  }
  if (namber < 1) {
    $("#number").val(1);
  }
}
