<?php
session_start();
require_once '../../connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}

$select = $_POST['select'];
$serch = $_POST['serch'];

$userSQL = mysqli_query($connect, "SELECT * FROM `users` WHERE `$select` = '$serch'");
$users = mysqli_fetch_all($userSQL);

echo '<table id="load">';
echo '<tr>';
echo '  <th>Id</th>';
echo '  <th>Name</th>';
echo '  <th>Surname</th>';
echo '  <th>Secendname</th>';
echo '  <th>Email</th>';
echo '  <th>Phone</th>';
echo '  <th>Aderss</th>';
echo '  <th>Orders</th>';
echo '  <th>Status</th>';
echo '  <th>Img</th>';
echo '  <th>Img url</th>';
echo '  <th>Login</th>';
echo '  <th>Password</th>';
echo '  <th>Delete</th>';
echo '</tr>';
foreach ($users as $item) {
  echo '<tr>';
  echo '  <td>' . $item[0] . '</td>';
  echo '  <td>' . $item[1] . '</td>';
  echo '  <td>' . $item[2] . '</td>';
  echo '  <td>' . $item[3] . '</td>';
  echo '  <td>' . $item[4] . '</td>';
  echo '  <td>' . $item[5] . '</td>';
  echo '  <td>' . $item[6] . '</td>';
  echo '  <td>' . $item[7] . '</td>';
  echo '  <td>' . $item[8] . '</td>';
  echo '  <td><div><img src="../../../' . $item[9] . '" alt="img"></div></td>';
  echo '  <td>' . $item[9] . '</td>';
  echo '  <td>' . $item[10] . '</td>';
  echo '  <td>' . $item[11] . '</td>';
  echo '  <td><button onclick="delAcc(this.id)" id="' . $item[0] . '">X</button></td>';
  echo '</tr>';
}
echo '</table>';
