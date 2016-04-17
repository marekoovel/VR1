<?php
require_once("head.html");
?>

<?php
$pildid = array(
		1=>array('link'=>"pildid/nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('link'=>"pildid/nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('link'=>"pildid/nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('link'=>"pildid/nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('link'=>"pildid/nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('link'=>"pildid/nameless6.jpg", 'alt'=>"nimetu 6"),
	);
	
?>

	
<h3>Fotod</h3>
<div id="gallery">
	<?php foreach($pildid as $id=>$pilt):?>
		<img src="<?php echo $pilt['link'];?>" alt="<?php echo $pilt['alt'];?>"/>
	<?php endforeach; ?>
</div>


<?php
require_once("foot.html");
?>