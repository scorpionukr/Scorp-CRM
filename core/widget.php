<?php
// widget.php
// родитель main.php
// подключаемый файл выбора виджетов пользователя CRM
$selWidgets = "SELECT `position`, `widget` FROM `users-widgets` WHERE `uid`='" . $_SESSION["id"] . "' AND (`module`='" . $_GET["vector"] . "' OR `module`='" . $_GET["module"] . "') AND `active`='1' ORDER BY `position` ASC LIMIT 10";
$resWidgets = $dbc->query($selWidgets) or die("Ошибка выборки данных о CRM в widget.php");
while ($rowWidgets = mysqli_fetch_array($resWidgets)) {
    $y = 0;
    $widget[$rowWidgets["position"]][$y] = $rowWidgets["position"];
    $widget[$rowWidgets["position"]][$y + 1] = $rowWidgets["widget"];
}