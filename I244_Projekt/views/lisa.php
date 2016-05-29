<form action="?page=lisa_pilt" method="POST" enctype="multipart/form-data">
    Lisa pilt: <input type="file" name="pilt"/><br/>
    <input type="submit" value="Lisa"/> 
</form>
<?php if (isset($errors)):?>
<?php foreach($errors as $error):?>
<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
<?php endforeach;?>
<?php endif;?>