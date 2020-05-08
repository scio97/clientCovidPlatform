<?php
//////////MENU//////////
function menu(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=ultimo_aggiornamento");
    $ris = json_decode($file);
    echo"<ul class='menu'>";
    echo"<li class='titolo_menu'><strong>COVID-19<br>ITALIA</strong></li>";
    echo"<li><a href='index.php' class='collegamento_menu'>Home</a></li>";
    echo"<li><a href='andamento-nazionale.php' class='collegamento_menu'>Analisi nazionale</a></li>";
    echo"<li><a href='andamento-regionale.php' class='collegamento_menu'>Analisi regionale</a></li>";
    echo"<li><a href='andamento-provinciale.php' class='collegamento_menu'>Analisi provinciale</a></li>";
    echo"<li class='aggiornamento_menu'><em>Ultimo aggiornamento: <br>".$ris->ultimo_aggiornamento."</em></li>";
    echo"</ul>";
}
function box(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=box");
    $ris = json_decode($file);
    echo'<div class="box_totale_casi">
            <h3>TOTALE CASI</h3>
            <p>'.$ris->totale_casi.' ('.segno($ris->var_totale_casi).$ris->var_totale_casi.')</p>
        </div>
        <div class="box_guariti">
            <h3>GUARITI</h3>
            <p>'.$ris->dimessi_guariti.' ('.segno($ris->var_dimessi_guariti).$ris->var_dimessi_guariti.')</p>
        </div>
        <div class="box_deceduti">
            <h3>DECEDUTI</h3>
            <p>'.$ris->deceduti.' ('.segno($ris->var_deceduti).$ris->var_deceduti.')</p>
        </div>
        <div class="box_attualmente_positivi">
            <h3>ATTUALMENTE POSITIVI</h3>
            <p>'.$ris->totale_positivi.' ('.segno($ris->var_totale_positivi).$ris->var_totale_positivi.')</p>
        </div>';
}
function segno($n){
    if($n>-1){
        return "+";
    }
}
//////////HOME//////////
function grafico_regioni_key(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_regioni");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo '"'.$key.'",';
      }
}
function grafico_regioni_value(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_regioni");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo $value.",";
      }
}
function grafico_totale_casi_key(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_totale_casi");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo '"'.$key.'",';
      }
}
function grafico_totale_casi_value(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_totale_casi");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo $value.',';
      }
}
function grafico_nuovi_positivi_key(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_nuovi_positivi");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo '"'.$key.'",';
      }
}
function grafico_nuovi_positivi_value(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_nuovi_positivi");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo $value.',';
      }
}
function grafico_tamponi_key(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_tamponi");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo '"'.$key.'",';
      }
}
function grafico_tamponi_value(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_tamponi");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo $value.',';
      }
}
function grafico_comparativo_data(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_comparativo_data");
    $ris = json_decode($file);
    for($i=0; $i<count($ris); $i++){
        echo '"'.$ris[$i].'",';
    }
}
function grafico_comparativo_positivi(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_comparativo_positivi");
    $ris = json_decode($file);
    for($i=0; $i<count($ris); $i++){
        echo '"'.$ris[$i].'",';
    }
}
function grafico_comparativo_guariti(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_comparativo_guariti");
    $ris = json_decode($file);
    for($i=0; $i<count($ris); $i++){
        echo '"'.$ris[$i].'",';
    }
}
function grafico_comparativo_deceduti(){
    $file = file_get_contents("https://api--covid.herokuapp.com/?mod=grafico_comparativo_deceduti");
    $ris = json_decode($file);
    for($i=0; $i<count($ris); $i++){
        echo '"'.$ris[$i].'",';
    }
}
?>