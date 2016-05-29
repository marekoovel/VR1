<h3>Teie valik oli</h3>
<?php
if (empty($_POST) && empty($_SESSION["votet_nimetus"])) {
    echo "Jätsite valiku tegemata!";
} else {
    if ((isset($_POST['valitud']) && $_POST['valitud'] != "" && empty($_SESSION["votet_nimetus"]))) {
        $_SESSION["votet_nimetus"] = $_POST['valitud'];
        
        echo "Tänan valiku " . $_SESSION["votet_nimetus"] . " tegemise eest <br>";
        echo "Valitud pilt <br>";
        echo '<img src=' . $_SESSION["votet_nimetus"] . ' height="100" />'." <br/>";
        loenda($_SESSION["votet_nimetus"]);
        header("refresh:10; url=index.php?page=p");
        
    } else {
        
        echo "TEIST KORDA VALIDA EI SAA! <br> Teie valik oli nr " . $_SESSION["votet_nimetus"] . "<br>";
        echo '<img src=' . $_SESSION["votet_nimetus"] . ' height="100" />';
        // echo '<br/> <a href="?page=lopeta">LÕPETA SESSIOON!</a>';

    }
}
?>



