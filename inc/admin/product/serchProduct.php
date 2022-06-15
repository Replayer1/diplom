<?php
session_start();
require_once '../../connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}

$select = $_POST['select'];
$serch = $_POST['serch'];

$productsSQL = mysqli_query($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all($productsSQL);
echo '<table id="load">';
echo '<tr>';
echo '  <th>Id</th>';
echo '  <th>Name</th>';
echo '  <th>Info</th>';
echo '  <th>Price</th>';
echo '  <th>Price To Viwe</th>';
echo '  <th>Category</th>';
echo '  <th>Quantity</th>';
echo '  <th>Buy quantity</th>';
echo '  <th>Img url</th>';
echo '  <th>Img</th>';
echo '  <th>Delete</th>';
echo '</tr>';
foreach ($products as $item) {
  echo '<tr>';
  echo '  <td>' . $item[0] . '</td>';
  echo '  <td>' . $item[1] . '</td>';
  echo '  <td><textarea>' . $item[2] . '</textarea></td>';
  echo '  <td>' . $item[3] . '</td>';
  echo '  <td>' . $item[4] . '</td>';
  echo '  <td>' . $item[5] . '</td>';
  echo '  <td>' . $item[6] . '</td>';
  echo '  <td>' . $item[7] . '</td>';
  echo '  <td>' . $item[8] . '</td>';
  echo '  <td><div><img src="../../../' . $item[8] . '" alt="img"></div></td>';
  echo '  <td><button onclick="delProd(this.id)" id="' . $item[0] . '">X</button></td>';
  echo '</tr>';
}
echo '</table>';
