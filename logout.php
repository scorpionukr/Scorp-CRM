<?php
// logout.php
// родитель main.php
// выход из CRM
if(isset($_POST["logout"]) && $_POST["logout"]=="1") {
    session_start();
    $_SESSION["login"]=false;
    header("Location: index.php");
}