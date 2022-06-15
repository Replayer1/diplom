<?php
session_start();
require_once '../inc/connect.php';
if ($_SESSION['user']['status'] !== 'admin') {
  header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<!--  -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/global.css">
  <title>Document</title>
</head>
<style>
  nav {
    width: 100%;
    height: 30px;
    color: white;
    background: #34352f;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  label {
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
  }

  nav input[type='radio'] {
    display: none;
  }

  nav input[type='radio']:checked+label {
    background: #272822;
  }

  #user_list {
    width: 1920px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  table {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    border-collapse: collapse;
    color: #686461;
    width: 100%;
  }

  th {
    background: #34352f;
    border-bottom: 3px solid #B9B29F;
    color: white;
    padding: 10px;
    text-align: left;
  }

  td {
    padding: 10px;
    transition: .2s;
  }

  td div {
    width: 100px;
    height: 100px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }


  td div img {
    height: 100%;
  }

  tr {
    transition: .2s;
  }

  tr:nth-child(odd) {
    background: #34352f;
  }

  tr:nth-child(even) {
    background: #272822;
  }

  td:hover {
    color: #9c9692;
    transform: scale(1.05);
  }

  .lds-roller {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
  }

  .lds-roller div {
    animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    transform-origin: 40px 40px;
  }

  .lds-roller div:after {
    content: " ";
    display: block;
    position: absolute;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #fff;
    margin: -4px 0 0 -4px;
  }

  .lds-roller div:nth-child(1) {
    animation-delay: -0.036s;
  }

  .lds-roller div:nth-child(1):after {
    top: 63px;
    left: 63px;
  }

  .lds-roller div:nth-child(2) {
    animation-delay: -0.072s;
  }

  .lds-roller div:nth-child(2):after {
    top: 68px;
    left: 56px;
  }

  .lds-roller div:nth-child(3) {
    animation-delay: -0.108s;
  }

  .lds-roller div:nth-child(3):after {
    top: 71px;
    left: 48px;
  }

  .lds-roller div:nth-child(4) {
    animation-delay: -0.144s;
  }

  .lds-roller div:nth-child(4):after {
    top: 72px;
    left: 40px;
  }

  .lds-roller div:nth-child(5) {
    animation-delay: -0.18s;
  }

  .lds-roller div:nth-child(5):after {
    top: 71px;
    left: 32px;
  }

  .lds-roller div:nth-child(6) {
    animation-delay: -0.216s;
  }

  .lds-roller div:nth-child(6):after {
    top: 68px;
    left: 24px;
  }

  .lds-roller div:nth-child(7) {
    animation-delay: -0.252s;
  }

  .lds-roller div:nth-child(7):after {
    top: 63px;
    left: 17px;
  }

  .lds-roller div:nth-child(8) {
    animation-delay: -0.288s;
  }

  .lds-roller div:nth-child(8):after {
    top: 56px;
    left: 12px;
  }

  button:hover {
    /* color: #9c9692; */

    background: #9c9692;
  }

  @keyframes lds-roller {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  #product_serch {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
  }

  #product_serch label {
    width: 130px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
  }

  #product_serch input {
    padding: 6px;
    border-radius: 20px;
    color: black;
  }

  #product_serch button {
    margin-left: 8px;
  }

  #product_create {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
  }


  #product_create form {
    width: 15%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
  }


  #product_create form * {
    margin: 10px;
  }

  #product_create form input {
    border-radius: 20px;
    padding: 6px;
  }

  #file_name {
    width: 100%;
    border-radius: 20px;
    border: 1px solid white;
    color: white;
  }

  #product_create button {
    width: 100%;
    border-radius: 20px;
    border: 1px solid white;
    color: white;
  }
</style>

<body>
  <nav>
    <input onchange="nav(this.id)" type="radio" id="catygort" name="nav" checked><label for="catygort">Список товров</label>
  </nav>
  <div class="display" id="viwe-catygort">
    <form id="addCategory">
      <input type="text" name="Name-code" id="Name-code" placeholder="Name-code">
      <input type="text" name="Name-display" id="Name-display" placeholder="Name-display">
      <input type="submit">
    </form>
  </div>
</body>

<script src="../app/jQuery v3.6.0.js"></script>
<script src="../app/admin/more.js"></script>


</html>