<?php
// crminfo.php
// родитель main.php
// подключаемый файл выбора данных о CRM
$selNameCrm = "SELECT `crm-name`, `crm-logo`, `crm-icon` FROM `config` LIMIT 1";
$resNameCrm = $dbc->query($selNameCrm) or die("Ошибка выборки данных о CRM в crminfo.php");
$rowNameCrm = mysqli_fetch_array($resNameCrm);
