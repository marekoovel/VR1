<?php 
	require_once("head.html");
	?>
<h3>Tulemus</h3>
<?php if($id):?>
	<img src="<?php echo $pildid[$id]['link'];?>" alt="valitud"/></p>
<?php endif;?>
<?php 
	require_once("foot.html");
?>