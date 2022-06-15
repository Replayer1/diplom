<?php
session_start();
require_once '../connect.php';

$nameArray = explode(" ", $_POST['name']);
$name = $nameArray[1];
$surname = $nameArray[0];
$secendname = $nameArray[2];
$login = $_POST['login'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$password = md5($_POST['password']);
$path = 'media/img/profile-pic/' . time() . $_FILES['file']['name'];

$data = [
    $nameArray,
    $name,
    $surname,
    $secendname,
    $login,
    $email,
    $tel,
    $password,
    $path
];



if (!move_uploaded_file($_FILES['file']['tmp_name'], '../../' . $path)) {
    echo 'Error inc/sign/sign-up 13 (error upload file)';
} else {
    if (mysqli_query($connect, "INSERT INTO `users`(`id`, `name`, `surname`, `secendname`, `email`, `phone`, `adress`, `orders`, `status`, `img`, `login`, `password`) VALUES (NULL,'$name','$surname','$secendname','$email','$tel','NULL','0','user','$path','$login','$password')")) {
        echo 'Регистрация успешна!';
        $userSQL = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `login` = '$login'");
        $user = mysqli_fetch_all($userSQL);
        $user_id = $user[0][0];
        $date = date('d.m.Y H:i:s');
        mysqli_query($connect, "INSERT INTO `noties`(`id`, `user_id`, `info`, `date`, `status`) VALUES (NULL,'$user_id','$name cпасибо за регистрацию на нашем сайте! Пожалуйста настройте свой аккаун в разделе профиль для того чтобы вы могли совершать покупки у нас в магазине.','$date','new')");
    } else {
        echo 'Регистрация не успешна!';
    }
}
