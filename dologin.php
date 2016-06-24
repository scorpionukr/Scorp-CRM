<?php
// dologin.php
// родитель login.php
// если кто-то пытается войти
if (isset($_POST["name"]) && isset($_POST["password"])) {
    // подключаем библиотеку конфига
    include_once("configs/config.php");
    // подключаем библиотеку проверки пароля
    include_once("modules/security/check-pass.php");
    //екранируем переменные
    $uname = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $upasswd = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // проверяем наличие пользователя в БД
    $selUser = "SELECT `id`, `ulogin`, `upasswd`, `frst-name`, `lst-name`, `sip`, `role` FROM `users` WHERE `ulogin`='" . $uname . "' AND `enable`='1' LIMIT 1";
    $resUser = $dbc->query($selUser) or die("Ошибка выборки пользователя в dologin.php");
    $rowUser = mysqli_fetch_array($resUser);
    // если есть, разрешаем войти
    if(check_password($rowUser["upasswd"], $upasswd)) {
	// стартуем сессию
	session_start();
	// залогиниваем юзера
	$_SESSION["login"] = 7;
	$_SESSION["id"] = $rowUser["id"];
	$_SESSION["name"] = $rowUser["ulogin"];
	$_SESSION["frst-name"] = $rowUser["frst-name"];
	$_SESSION["lst-name"] = $rowUser["lst-name"];
	$_SESSION["sip"] = $rowUser["sip"];
	$_SESSION["role"] = $rowUser["role"];
	header("Location: index.php?module=welcome");
    }
    // иначе возвращаем на страницу для входа
    else {
	header("Location: index.php");
    }
}
// иначе возвращаем страницу для входа
else {
    header("Location: index.php");
}
