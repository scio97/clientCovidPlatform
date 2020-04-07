<?php
//////////MENU//////////
function menu(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=ultimo_aggiornamento");
    $risposta = json_decode($file);
    echo"<ul class='menu'>";
    echo"<li class='titolo_menu'><strong>TITOLO (Logo)</strong></li>";
    echo"<li><a href='index.php' class='collegamento_menu'>Home</a></li>";
    echo"<li><a href='andamento-nazionale.php' class='collegamento_menu'>Analisi nazionale</a></li>";
    echo"<li><a href='andamento-regionale.php' class='collegamento_menu'>Analisi regionale</a></li>";
    echo"<li><a href='andamento-provinciale.php' class='collegamento_menu'>Analisi provinciale</a></li>";
    echo"<li class='aggiornamento_menu'><em>Ultimo aggiornamento: <br>".$risposta->ultimo_aggiornamento."</em></li>";
    echo"</ul>";
}
?>