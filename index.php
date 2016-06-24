<?
// стартуем сессию
session_start();
// проверяем наличие переменной для входа
if (!isset($_SESSION["login"])) {
    $_SESSION["login"] = false;
    echo $_SESSION["login"];
    include_once("login.php");
} else {
    // екранируем переменную
    $sessLogin = mysql_escape_string($_SESSION["login"]);
    if($_SESSION["login"]==7) {;
	include_once("main.php");
    }
    else {
	include_once("login.php");
    }
}