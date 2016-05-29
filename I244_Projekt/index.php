<?php

session_start();
require 'funk.php';

connect_db();

$page = "pealeht";
if (isset($_GET['page']) && $_GET['page'] != "") {
    $page = htmlspecialchars($_GET['page']);
}

include_once('views/head.html');

//echo $page;
switch ($page) {


    case "login":
        login();
        break;

    case "lisa_pilt":
        lisa();
        break;

    case "hinda":
        hinda();
		
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(), '', time()+10, '/');
			require("views/tulemus.php");
		}else{
			$_SESSION=array();
			require("views/hinda.php");
		}
        break;

    case "tulemus":
        require("views/tulemus.php");
        break;

    case "lopeta":
        lopeta();

        break;

    case "logout":
        logout();
        //print_r("$page");    
        break;

    default:
        include_once('views/pealeht.php');
		
        break;
}

include_once('views/foot.html');
?>