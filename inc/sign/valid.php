<?php
session_start();
require_once '../connect.php';

$users =  mysqli_query($connect, "SELECT * FROM `users`");
$data = mysqli_fetch_all($users);
echo json_encode($data);
