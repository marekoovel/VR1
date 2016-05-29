
<form method="post" action="?page=tulemus">


  <input id="valin" type="submit" value="Valin!"/>
    <?php foreach (hinda() as $key => $rida):  // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast ?>
        <?php $nr = $key + 1; ?>
        <p>
            <div class="hinda" for="p<?php echo $nr; ?>">
                <img src="<?= $rida['pilt']; ?>" alt="<?= $rida['id']; ?>" height="100"/>
                <input type="hidden" name="action" value="hinda">                       
                <input type="radio" name="valitud" id="<?= $rida['id']; ?>" value="<?= $rida['pilt']; ?>" />
            </div>
        </p>


    <?php endforeach; ?>
    <br/>
    <br/>
    <br/>
</form>


