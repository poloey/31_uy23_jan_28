<?php
$con = new PDO('mysql:dbname=auth;host=localhost', 'root', '');

$con->query("
  create table users(
    id int(11) auto_increment primary key,
    name  varchar(30) not null,
    email varchar(30) not null,
    password varchar(140) not null
  );
 ");