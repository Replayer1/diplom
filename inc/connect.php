<?php
$cleardb_url = parse_url("mysql://b6c97ef07dcccf:e2142b4c@eu-cdbr-west-02.cleardb.net/heroku_73bca2b9f7fe976?reconnect=true");
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
$connect = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
if (!$connect) {
  die('Error connect to DataBase');
}


