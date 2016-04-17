<?php
require_once("head.html");

$pildid = array(
		1=>array('link'=>"pildid/nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('link'=>"pildid/nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('link'=>"pildid/nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('link'=>"pildid/nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('link'=>"pildid/nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('link'=>"pildid/nameless6.jpg", 'alt'=>"nimetu 6"),
	);
	
	
$mode="pealeht";
if (isset($_GET['mode']) && $_GET['mode']!=""){
	$mode=htmlspecialchars($_GET['mode']);
}

switch($mode){
	case "galerii":
		include("galerii.html");
	break;
	
	case "vote":
		include("vote.html");
	break;
	
	case "tulemus":
		$id=false;
		if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']]))
			$id=htmlspecialchars($_POST['pilt']);
		include("tulemus.html");
	break;
	
	default:
	 include('pealeht.html');
	 break;
}


require_once("foot.html");
?>
