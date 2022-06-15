function loadMarkers() {
  $("#markers").load("../inc/profile/markerList.php", "update=true");
}

function loadCard() {
  $("#card").load("../inc/profile/cardList.php", "update=true");
}

function loadCardInfo() {
  $("#card-info").load("../inc/profile/cardInfo.php", "update=true");
}

function loadOrders() {
  $("#orders").load("../inc/profile/orderList.php", "update=true");
}

function loadNoties() {
  $("#notices").load("../inc/profile/notiesList.php", "update=true");
}

function loadUpdata() {
  $("#update").load("../inc/profile/load.php", "update=true");
}

