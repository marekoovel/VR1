<?php
function connect_db(){
	global $connection;
	$host = "localhost";
        $user = 'test'; //test
        $pass = 't3st3r123'; //'t3st3r123'
        $db = 'test';
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function login(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['user']) && isset($_POST['pass'])) {
			if ($_POST['user'] == "" || $_POST['pass'] == "") {
					$errors[] = "Palun sisestage mõlemad, nii kasutajanimi kui ka parool";
			} else 
			{ $kasutajanimi = mysqli_real_escape_string($connection,htmlspecialchars($_POST['user']));
		      $salasona = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']));
			$query = mysqli_query($connection, "SELECT id FROM loomad__kylastajad WHERE username = '".$kasutajanimi."' AND passw = SHA1('".$salasona."')") or die("Päringut ei toimunud");

	if (mysqli_num_rows($query) >= 1) {
		$id = mysqli_fetch_assoc($query)['id'];
		$_SESSION['user'] = $id;
		$_SESSION['username'] = $kasutajanimi;
		header("Location: index.php");
			} else {
		$errors[] = "Vale parool või kasutajanimi"; }
	}
	}			

}
	include_once('views/login.html');
}

function logout(){
    
    echo 'logout';
    
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-42000, '/');
    }
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function lopeta(){
    
    echo 'lopeta';
    //        if (isset($_COOKIE[$_SESSION["votet_nimetus"]])) {
//            setcookie($_SESSION["votet_nimetus"], '', time() - 42000, '/');
//        }
        $_SESSION = array();
        //session_destroy("votet_nimetus");  // kustuta sessioon 
        header("Location: index.php?page=hinda");

}


function hinda(){
	// siia on vaja funktsionaalsust
//    if (!isset($_SESSION['user'])) {
//        header("Location: index.php?page=login");        
//    }
         
    global $connection;
        
        $query = 'SELECT Id, Pilt FROM loomad__asjad ORDER BY pilt ASC';
        $stmt = mysqli_prepare($connection, $query);
    if (mysqli_error($connection)) {
        echo mysqli_error($connection);
        exit;
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $pilt);

    $rows = array();
    while (mysqli_stmt_fetch($stmt)) {
        $rows[] = array(
            'id' => $id,
            'pilt' => $pilt,
        );
    }

    mysqli_stmt_close($stmt);

    return $rows;
	
}


function loenda($pilt) {
//    if (!isset($_SESSION['user'])) {
//        header("Location: index.php?page=login");
//    }

    global $connection;
    $sql = "SELECT Pilt, count FROM loomad__asjad WHERE Pilt = \"$pilt\"";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);


    if ($num == 0) {
        //Create a uniqe stats entry:
        $sql = "INSERT INTO loomad__asjad(Pilt, count) VALUES(\"$pilt\", 1)";
        //
        $result = mysqli_query($connection, $sql);
    } else {
        $sql = "UPDATE loomad__asjad SET count = count + 1 WHERE Pilt = \"$pilt\"";

        $result = mysqli_query($connection, $sql);

        $count = "SELECT count FROM loomad__asjad WHERE Pilt = \"$pilt\"";
        $result2 = mysqli_query($connection, $count);
        $tulemus = mysqli_fetch_assoc($result2);
        $tulemus2 = implode($tulemus);

        echo "Seda pilti " . $pilt . " on hinnatud " . $tulemus2 . " korda. <br/>";
    }
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	if(!empty($_SESSION["user"])){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			// postitus on tehtud
			if($_FILES["pilt"]["error"] > 0 ){
				$errors[] = "Mingi väli jäi postitamisel tühjaks või on faili üleslaadimisel tekkinud viga.";
				include_once('views/lisa.php');
			}else{
				// kõik ok, laeme faili üles ja teeme kirje tabelisse
				connect_db();
				upload("pilt");
				if (file_exists("pildid/" .$_FILES["pilt"]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
					echo $_FILES["pilt"]["name"] . " juba eksisteerib. ";
					//echo $_SESSION['notices'];
				} else {
        // kõik ok, aseta pilt
				$query = "INSERT INTO loomad__asjad (Pilt) VALUES ('pildid/".$_FILES["pilt"]["name"].
				$result = mysqli_query($GLOBALS['connection'], $query) or die("$query - ".mysqli_error($GLOBALS['connection']));
									"');";
				}
								
				//echo $_FILES["pilt"]["name"];
				header("refresh:3; url=index.php?page=hinda");
			}// if
		}else{
			include_once('views/lisa.php');
		}// if $_SERVER	
	}else{
		header("Location: index.php?page=login");
	}// if !empty
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$test = explode(".", $_FILES[$name]["name"]); 
	$extension = end($test);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>