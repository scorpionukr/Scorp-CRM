<?php
// tabs.php
// родитель main.php
// подключаемый файл выбора вкладок пользователя CRM
$selTabs = "SELECT `tab`, `url` FROM `tabs` WHERE `uid`='" . $_SESSION["id"] . "' AND `active`='1' ORDER BY `tab` ASC";
$resTabs = $dbc->query($selTabs) or die("Ошибка выборки данных в tabs.php" . mysqli_error($dbc));
$group = "1";
while ($rowTabs = mysqli_fetch_array($resTabs)) {
    ?>
    <li><a href="<? echo $rowTabs["url"]; ?>"><? echo $rowTabs["tab"]; ?></a></li>
    <?
}