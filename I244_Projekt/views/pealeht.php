<!--<h1 id="sisse">Siin on siissejuhatav text</h1>-->
<h1 id="top3">TOP 3</h1>

    <?php foreach (popim() as $key => $rida):  // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast ?>
       <?php $nr = $key+1 ;?>
        <p>
            <label>
                <h1 class="top"><?= $nr ?> - koht</h1>
                <img class="topPilt" src="<?= $rida['pilt']; ?>" alt="<?= $rida['pilt']; ?>"/>
                <br/>
				<p class="meeldimisi">
					MEELDIMISI: <?= $rida['count']; ?>  
				<p>
            </label>
        </p>


    <?php endforeach; ?>

<!-- <a href="?page=index" id="sisse">SISSEPÄÄS</a> -->

