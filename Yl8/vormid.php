<?php
if (empty($_POST["usertext"])) {
    $name = "";
  } else {
    $name = $_POST["usertext"];
  }
  
$bgcol="#FF4040";
if(isset($_POST['bgcolor']) && $_POST['bgcolor']!="") {
    $bgcol=htmlspecialchars($_POST['bgcolor']);
}

$textcolor="#4bb64f";
if(isset($_POST['textcolor']) && $_POST['textcolor']!="") {
    $textcolor=htmlspecialchars($_POST['textcolor']);
}

$borderStyle="solid";
if(isset($_POST['borderStyle']) && $_POST['borderStyle']!="") {
    $borderStyle=htmlspecialchars($_POST['borderStyle']);
}

$borderColor="#4bb64f";
if(isset($_POST['borderColor']) && $_POST['borderColor']!="") {
    $borderColor=htmlspecialchars($_POST['borderColor']);
}

$borderWidth=2;
if(isset($_POST['borderWidth']) && $_POST['borderWidth']!="") {
    $borderWidth=htmlspecialchars($_POST['borderWidth']);
}

$borderRadius=5;
if(isset($_POST['borderRadius']) && $_POST['borderRadius']!="") {
    $borderRadius=htmlspecialchars($_POST['borderRadius']);
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>

#taust
{
	width:100px;
	height:30px;
	background-color: <?php echo $bgcol?>;
}


#tektstiala
{
	 background-color: <?php echo $bgcol?>;
	 color:<?php echo $textcolor?>;
	 border:<?php echo $textcolor?>px;
	 border-style: <?php echo $borderStyle?>;
   	 border-color: <?php echo $borderColor?>;
   	 border-radius: <?php echo $borderRadius?>px;
}

#tekst
{
	width:100px;
	height:30px;
	background-color: <?php echo $textcolor?>;
	position:absolute;
}

#borderColor
{
	width:100px;
	height:30px;
	background-color: <?php echo $borderColor?>;
}

</style>
</head>
<body>
<textarea id="tektstiala" rows="4" cols="50">
<?php echo $name?>
</textarea>
<hr>

<form action="vormid.php" name="usertext" method="POST">
<textarea cols="30" rows ="3" name="usertext"></textarea>
  <br>
  <br>
 <div>
<p style="font-size: 130%; line-spacing: 0em;"><b>Taustavärvus</b></p>
<select id="taust" name="bgcolor">
    <option value="#FF4040" style="background:red"></option>
    <option value="#FFFF00" style="background:yellow"></option>
    <option value="#551a8b" style="background:purple"></option>
    <option value="#3366CC" style="background:blue"></option>
    <option value="#4bb64f" style="background:green"></option>
    <option value="#FFFFFF" style="background:white"></option>
    <option value="#000000" style="background:black"></option>
</select>
</div>
<br>
<br>
<div style="position:relative">
<p style="font-size: 130%; position:relative"><b>Tekstivärvus</b></p>
<select id="tekst" name="textcolor">
	<option value="#4bb64f" style="background:green"></option>
	<option value="#000000" style="background:black"></option>
	<option value="#FFFFFF" style="background:white"></option>
    <option value="#FF4040" style="background:red"></option>
    <option value="#3366CC" style="background:blue"></option>
    <option value="#FFFF00" style="background:yellow"></option>
    <option value="#551a8b" style="background:purple"></option>
</select>
</div>
<br>
<br>
<p style="font-size: 130%; position:absolute"><b>Piirjoon</b></p>
<hr>
<br>
<br>
<p style="font-size: 130%; position:relative"><b>Piirjoone raadius</b></p>
<input type="text" name="borderRadius"><br>
<br>
<br>
<p style="font-size: 130%; position:relative"><b>Piirjoone stiil</b></p>
<select id="borderStyle" name="borderStyle">
	<option value="solid">solid </option>
	<option value="double">double</option>
	<option value="none">none</option>
    <option value="dotted">dotted</option>
    <option value="dashed">dashed</option>
    <option value="groove">groove</option>
</select>
<br>
<br>
<p style="font-size: 130%; position:relative"><b>Piirjoone värv</b></p>
<select id="borderColor" name="borderColor">
	<option value="#4bb64f" style="background:green"></option>
	<option value="#000000" style="background:black"></option>
	<option value="#FFFFFF" style="background:white"></option>
    <option value="#FF4040" style="background:red"></option>
    <option value="#3366CC" style="background:blue"></option>
    <option value="#FFFF00" style="background:yellow"></option>
    <option value="#551a8b" style="background:purple"></option>
</select>
<br>
<br>
<p style="font-size: 130%; position:relative"><b>Piirjoone laius</b></p>
<input type="text" name="borderWidth"><br>
<br>
<br>
<hr>
	<input type="submit" value="esita"/>
</form>

</body>
</html>