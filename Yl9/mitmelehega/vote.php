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
	?>
<h3>Vali oma lemmik :)</h3>
<form action="?mode=tulemus" method="POST">
	<?php foreach($pildid as $id=>$pilt):?>
		<p>
			<label for="p<?php echo $id;?>">
				<img src="<?php echo $pilt['link'];?>" alt="<?php echo $pilt['alt'];?>" height="100" />
			</label>
			<input type="radio" value="<?php echo $id;?>" id="p<?php echo $id;?>" name="pilt"/>
		</p>
	<?php endforeach; ?>
	<br/>
	<input type="submit" value="Valin!"/>
</form>
<?php 
	require_once("foot.html");
?>