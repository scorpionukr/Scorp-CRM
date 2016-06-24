<?php

// Главный конфигурационный файл
//
// переменная дефолтного хоста
$httpHost="http://" . $_SERVER["HTTP_HOST"];
// текущая дата и время
$curDate=date("Y-m-d");
$curTime=date("H:i:s");
// MySQL servers
// connect to CRM MySQL
$host="localhost";
$user="";
$password="";
$dbName="crm";
$dbc = mysqli_connect($host, $user, $password, $dbName) or die("Error connect CRM MySQL server: " . mysqli_error($dbc)); 
// connect to Asterisk MySQL
$hostA="localhost";
$userA="";
$passwordA="";
$dbNameA="asteriskcdrdb";
$dbca = mysqli_connect($hostA, $userA, $passwordA, $dbNameA) or die("Error connect Asterisk MySQL server: " . mysqli_error($dbca)); 
// Автор
$metaAuthor="Scorpion";
