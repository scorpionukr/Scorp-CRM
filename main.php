<?php
// main.php
// родитель index.php
// подключаемый основной файл CRM
// в целях безопасности в нем не стартуется сессия.
if (!isset($_SESSION["login"]) || $_SESSION["login"] != 7) {
    $_SESSION["login"] = 0;
    exit();
} else {
    include_once("configs/config.php");
    // подключаем файл выборки данных о CRM
    include_once("core/crminfo.php");
    // подключаем файл определения списка виджетов для страницы
    include_once("core/widget.php");
    // подключаем файл вывода заголовков страницы
    include_once("header.php");
    // основной контент
    ?>
    <body class="bg-main" data-spy="scroll" data-target="#bs-example-navbar-collapse-1">
        <!-- HEAD DIV -->
        <nav class="navbar navbar-default navbar-fixed-top">
    	<div class="container-fluid">
    	    <!-- Brand and toggle get grouped for better mobile display -->
    	    <div class="navbar-header">
    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    		    <span class="sr-only">Toggle navigation</span>
    		    <span class="icon-bar"></span>
    		    <span class="icon-bar"></span>
    		    <span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand text-logo" href="<? echo $httpHost; ?>"><? echo $rowNameCrm["crm-name"]; ?></a>
    	    </div>
    	    <!-- Навигация -->
    	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    		<p class="navbar-text"></p>
    		<ul class="nav navbar-nav" role="tablist">
		    <?
		    // подключаем файл выбора вкладок пользователя
		    include_once("core/tabs.php");
		    ?>
    		    <li><a href="/modules/sip/call.htm">SIP Phone Page</a></li>
    		    <li><a href="#" onClick="showHide('sip-hidden');"><span class="glyphicon glyphicon-earphone"></span></a></li>
		    <?
		    if($_SESSION["role"]=="administrator") {
		    ?>
		    <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Администрирование <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			    <li><a href="/index.php?module=admin&vector=widgets">Виджеты</a></li>
			    <li><a href="/index.php?module=admin&vector=projects">Проэкты</a></li>
			    <li><a href="/index.php?module=admin&vector=users">Пользователи</a></li>
			</ul>
		    </li>
		    <?
		    }
		    ?>
    		</ul>
    		<form role="form" method="POST" action="/logout.php" class="navbar-form navbar-right">
    		    Привет, <? echo $_SESSION["lst-name"]. " " . $_SESSION["frst-name"]; ?>&nbsp;
    		    <input type="hidden" name="logout" value="1" />
    		    <button type="submit" name="exit" class="btn btn-danger">Выход <span class="glyphicon glyphicon-off"></span></button>
    		</form>
    	    </div>
    	</div>
        </nav>
        <!-- CONTENT -->
        <div class="content">
	    <?
	    if (!isset($_GET["module"])) {
		$_GET["module"] = "welcome";
		$_GET["vector"] = false;
	    }
	    elseif($_GET["module"] == "calls" && $_GET["vector"] == "incoming") {
		include_once("modules/incoming/incoming.php");
	    }
	    elseif ($_GET["module"] == "calls" && $_GET["vector"] == "outgoing") {
		include_once("modules/outgoing/outgoing.php");
	    }
	    elseif ($_GET["module"] == "statistics") {
		include_once("modules/statistics/statistics.php");
	    }
	    elseif ($_GET["module"] == "welcome") {
		include_once("modules/welcome/welcome.php");
	    }
	    else {
		echo "Такой модуль не существует";
	    }
	    ?>
        </div>
    </body>
    </html>
<?
    mysqli_close($dbc);
    mysqli_close($dbca);
}