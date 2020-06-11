<?php
function menu(){
    global $ris;
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=ultimo_aggiornamento");
    $ris = json_decode($file);
    echo"<ul class='menu'>";
    echo"<li class='titolo_menu'><strong>COVID-19<br>ITALIA</strong></li>";
    echo"<li><a href='index.php' class='collegamento_menu'>Home</a></li>";
    echo"<li class='aggiornamento_menu'><em>Ultimo aggiornamento: <br>".$ris->ultimo_aggiornamento."</em></li>";
    echo"<li>".menu_accesso()."</li>";
    if(isset($_SESSION["user"])){
        echo"<li><a href='logout.php' class='login_menu'>LOGOUT</a></li>";
    }else{
        echo "<li class='login_menu' onclick=\"document.getElementById('id02').style.display='block'\">REGISTRATI</li>";
    }
    echo"</ul>";
}
function menu_accesso(){
    if(isset($_SESSION["user"])){
        return "<a href='pannello.php' class='login_menu'>".$_SESSION["user"]."<a>";
    }else{
        return "<li class='login_menu' onclick=\"document.getElementById('id01').style.display='block'\">ACCEDI</li>";
    }
}

function box($reg){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=box&reg=".$reg);
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
        </div>
        <div class="box_mortalita">
            <h3>Mortalità</h3>
            <p>'.$ris->mortalita.' ('.segno($ris->var_mortalita).$ris->var_mortalita.')</p>
        </div>';
}
function segno($n){
    if($n>-0){
        return "+";
    }
}

function grafico_regioni(){
    global $nome_reg;
    global $valore_reg;
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=grafico_regioni");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        $nome_reg=$nome_reg.'"'.$key.'",';
        $valore_reg=$valore_reg.'"'.$value.'",';
    }
}

function grafico_date(){
    global $date;
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=grafico_date");
    $ris = json_decode($file);
    for($i=0; $i<count($ris); $i++){
        $date=$date.'"'.$ris[$i].'",';
    }
}
function grafico_totale_casi($reg){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=grafico_totale_casi&reg=$reg");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo $value.',';
      }
}
function grafico_nuovi_positivi($reg){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=grafico_nuovi_positivi&reg=$reg");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo $value.',';
      }
}
function grafico_tamponi($reg){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=grafico_tamponi&reg=$reg");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        echo $value.',';
      }
}
function grafico_comparativo($reg){
    global $totale_positivi;
    global $dimessi_guariti;
    global $deceduti;
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=grafico_comparativo&reg=$reg");
    $ris = json_decode($file);
    for($i=0; $i<count($ris); $i++){
        $totale_positivi=$totale_positivi.'"'.$ris[$i]->totale_positivi.'",';
        $dimessi_guariti=$dimessi_guariti.'"'.$ris[$i]->dimessi_guariti.'",';
        $deceduti=$deceduti.'"'.$ris[$i]->deceduti.'",';
    }
}

function tabella($reg){
    global $tabella;
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=tabella&reg=$reg");
    $tabella = json_decode($file);  
}

function grafico_provincie($reg){
    global $nome_prov;
    global $valore_prov;
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=grafico_provincie&reg=$reg");
    $ris = json_decode($file);
    foreach($ris as $key => $value) {
        $nome_prov=$nome_prov.'"'.$key.'",';
        $valore_prov=$valore_prov.'"'.$value.'",';
      }
}

function titolo($reg){
    if ($reg=="Abruzzo"||$reg=="Basilicata"||$reg=="Calabria"||$reg=="Campania"||$reg=="Emilia-Romagna"||$reg=="Lazio"||$reg=="Liguria"||$reg=="Lombardia"||$reg=="Marche"||$reg=="Molise"||$reg=="Piemonte"||$reg=="Puglia"||$reg=="Toscana"||$reg=="Umbria"||$reg=="Veneto"){
            echo "Regione ".$reg;
    }else if($reg=="Friuli Venezia Giulia"||$reg=="Sardegna"||$reg=="Sicilia"||$reg=="Valle d'Aosta"){
        echo "Regione Autonoma ".$reg;
    }else if($reg=="P.A. Bolzano"){
        echo "Provincia Autonoma di Bolzano";
    }else if($reg=="P.A. Trento"){
        echo "Provincia Autonoma di Trento";
    }else{
        echo "Repubblica Italiana";
    }
}

function login(){
    $user = $_GET["user"];
    $password = $_GET["password"];
    $url = "https://api--covid.herokuapp.com?mod=login&user=$user&password=$password";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    if($risposta->risultato=="ok"){
        $_SESSION["user"]=strtoupper($user);
        $_SESSION["tipo"]=$risposta->tipo;
        return 0;
    }else{
        if($risposta->risultato=="passworderr"){
            return 1;
        }else{
            return 2;
        }
    }
}

function registra(){
    $user = $_GET["user"];
    $password = $_GET["password"];
    $url = "https://api--covid.herokuapp.com?mod=registra&user=$user&password=$password";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    if($risposta->risultato==true){
        $_SESSION["user"]=strtoupper($user);
        $_SESSION["tipo"]="ospite";
        return 0;
    }else{
        return 1;
    }
}

function modifica_nazione($data, $chiave, $valore, $user){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=modifica_nazione&data=$data&chiave=$chiave&valore=$valore&user=$user");
}
function modifica_regione($reg, $data, $chiave, $valore, $user){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=modifica_regione&reg=$reg&data=$data&chiave=$chiave&valore=$valore&user=$user");
}
function modifica_provincia($prov, $data, $valore, $user){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=modifica_provincia&prov=$prov&data=$data&valore=$valore&user=$user");
}

function cronologia_modifiche(){
    global $rows;global $id;global $data_modifica;global $data;global $luogo;global $chiave;global $valore_vecchio;global $valore_nuovo;global $user_fk;
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=cronologia_modifiche");
    $ris = json_decode($file);
    $rows=$ris->rows;
    for($i=0; $i<$rows; $i++){
        $id[$i]=$ris->$i[0];
        $data_modifica[$i]=$ris->$i[1];
        $data[$i]=$ris->$i[2];
        $luogo[$i]=$ris->$i[3];
        $chiave[$i]=$ris->$i[4];
        $valore_vecchio[$i]=$ris->$i[5];
        $valore_nuovo[$i]=$ris->$i[6];
        $user_fk[$i]=$ris->$i[7];
    }
}

function elimina($id){
    $file = file_get_contents("https://api--covid.herokuapp.com?mod=elimina&id=$id");
}
?>