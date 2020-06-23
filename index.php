<?php
session_start();
include("funzioni.php");
$reg=$_GET["reg"];
if (!isset($_GET["reg"])||$reg!="Abruzzo"&&$reg!="Basilicata"&&$reg!="P.A. Bolzano"&&$reg!="Calabria"&&$reg!="Campania"&&$reg!="Emilia-Romagna"&&$reg!="Friuli Venezia Giulia"&&$reg!="Lazio"&&$reg!="Liguria"&&$reg!="Lombardia"&&$reg!="Marche"&&$reg!="Molise"&&$reg!="Piemonte"&&$reg!="Puglia"&&$reg!="Sardegna"&&$reg!="Sicilia"&&$reg!="Toscana"&&$reg!="P.A. Trento"&&$reg!="Umbria"&&$reg!="Valle d'Aosta"&&$reg!="Veneto"){
    $reg="Italia";
}
if(isset($_GET["err"])){
    switch($_GET["err"]){
        case "user":
            echo '<script>alert("Utente non registrato!");</script>;';
        break;
        case "password":
            echo '<script>alert("Password errata!");</script>;';
        break;
        case "regok":
            echo '<script>alert("Utente registrato correttamente!");</script>;';
        break;
        case "regerr":
            echo '<script>alert("Nome utrente non disponibile!");</script>;';
        break;
    }
}
$date; $tabella; $totale_positivi; $dimessi_guariti; $deceduti; $ris;
grafico_date();
tabella(str_replace(' ', '-', $reg));
grafico_comparativo(str_replace(' ', '-', $reg));
?>
<html>
    <head>
        <title>Home - COVID19 ITALIA</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="pagina">
        <?php menu(); ?>
        <br><br><br>
        <ul class="menu_regioni">
            <li><a href="?reg=Italia">ITALIA</a></li>
            <li><a href="?reg=Abruzzo">Abruzzo</a></li>
            <li><a href="?reg=Basilicata">Basilicata</a></li>
            <li><a href="?reg=P.A. Bolzano">P.A. Bolzano</a></li>
            <li><a href="?reg=Calabria">Calabria</a></li>
            <li><a href="?reg=Campania">Campania</a></li>
            <li><a href="?reg=Emilia-Romagna">Emilia-Romagna</a></li>
            <li><a href="?reg=Friuli Venezia Giulia">Friuli Venezia Giulia</a></li>
            <li><a href="?reg=Lazio">Lazio</a></li>
            <li><a href="?reg=Liguria">Liguria</a></li>
            <li><a href="?reg=Lombardia">Lombardia</a></li>
            <li><a href="?reg=Marche">Marche</a></li>
            <li><a href="?reg=Molise">Molise</a></li>
            <li><a href="?reg=Piemonte">Piemonte</a></li>
            <li><a href="?reg=Puglia">Puglia</a></li>
            <li><a href="?reg=Sardegna">Sardegna</a></li>
            <li><a href="?reg=Sicilia">Sicilia</a></li>
            <li><a href="?reg=Toscana">Toscana</a></li>
            <li><a href="?reg=P.A. Trento">P.A. Trento</a></li>
            <li><a href="?reg=Umbria">Umbria</a></li>
            <li><a href="?reg=Valle d'Aosta">Valle d'Aosta</a></li>
            <li><a href="?reg=Veneto">Veneto</a></li>
        </ul>
        <h1 class="titolo"><img src="stemmi/<?php echo $reg?>.svg" width="30" height="30"><?php titolo($reg); ?></h1>
        <?php box(str_replace(' ', '-', $reg));?>

        <div class="grafico_totale_casi">
            <p class="titolo">Casi totali</p>
            <canvas id="CTNazione" ></canvas>
            <script>
                var ctx = document.getElementById('CTNazione').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'line',

                    data: {
                        labels: [<?php echo $date;?>],
                        datasets: [{
                            label: 'Casi totali',
                            borderColor: 'yellow',
                            fill: false,
                            data: [<?php grafico_totale_casi(str_replace(' ', '-', $reg));?>]
                        }]
                    },

                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        }
                    }
                });
            </script>
        </div>

        <div class="tabella_div">
            <p class="titolo">Tabella</p>
            <table class="table_dark2">
                <tr style="border-top:1px solid rgb(163, 163, 163)"><td>TAMPONI TOTALI</td><td><?php echo $tabella->tamponi;?></td></tr>
            </table>
            <table class="table_dark2">
                <tr><td></td><td>oggi</td><td>ieri</td><td>l'altro ieri</td></tr>
                <tr><td>TER. INTENSIVA</td><td><?php echo $tabella->terapia_intensiva0;?></td><td><?php echo $tabella->terapia_intensiva1;?></td><td><?php echo $tabella->terapia_intensiva2;?></td></tr>
                <tr><td>RICOVERATI</td><td class=><?php echo $tabella->ricoverati_con_sintomi0;?></td><td><?php echo $tabella->ricoverati_con_sintomi1;?></td><td><?php echo $tabella->ricoverati_con_sintomi2;?></td></tr>
                <tr><td>ISOLAMENTO</td><td><?php echo $tabella->isolamento_domiciliare0;?></td><td><?php echo $tabella->isolamento_domiciliare1;?></td><td><?php echo $tabella->isolamento_domiciliare2;?></td></tr>
            </table>
            <table class="table_dark2">
                <tr><td style="border-bottom:none; border-right:1px solid rgb(163, 163, 163)">TER. INTENSIVA</td><td style="border-bottom:none; border-right:1px solid rgb(163, 163, 163)">RICOVERO</td><td  style="border-bottom:none">ISOLAMENTO</td></tr>
                <tr><td style="border-right:1px solid rgb(163, 163, 163)"><?php echo $tabella->perc_terapia_intensiva."%";?></td><td style="border-right:1px solid rgb(163, 163, 163)"><?php echo $tabella->perc_ricoverati_con_sintomi."%";?></td><td><?php echo $tabella->perc_isolamento_domiciliare."%";?></td></tr>
            </table>
        </div>

        <div class="grafico_nuovi_positivi">
            <p class="titolo">Nuovi Positivi</p>
            <canvas id="nuoviPositivi" ></canvas>
            <script>
                var ctx = document.getElementById('nuoviPositivi').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'line',

                    data: {
                        labels: [<?php echo $date?>],
                        datasets: [{
                            label: 'Nuovi positivi',
                            borderColor: 'yellow',
                            fill: false,
                            data: [<?php grafico_nuovi_positivi(str_replace(' ', '-', $reg))?>]
                        }]
                    },

                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        }
                    }
                });
            </script>
        </div>

        <div class="grafico_comparativo">
            <br><br><br><br><p class="titolo">Attualmente positivi - Guariti - Deceduti</p>
            <canvas id="comparativo" ></canvas>
            <script>
                var ctx = document.getElementById('comparativo').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'line',

                    data: {
                        labels: [<?php echo $date?>],
                        datasets: [{
                            label: 'Casi positivi',
                            borderColor: 'yellow',
                            fill: false,
                            data: [<?php echo $totale_positivi;?>]
                        },{
                            label: 'Guariti',
                            borderColor: 'green',
                            fill: false,
                            data: [<?php echo $dimessi_guariti;?>]
                        
                        },{
                            label: 'Deceduti',
                            borderColor: 'red',
                            fill: false,
                            data: [<?php echo $deceduti;?>]
                        }]
                    },

                    options: {
                        maintainAspectRatio: false,
                    }
                });
            </script>
        </div>

        <?php
            if($reg=="Italia"){
                include("grafico-torta.php");
            }else{
                include("grafico-colonne.php");
            }
        ?>

        <div class="grafico_tamponi">
            <br><br><br><br><p class="titolo">Tamponi</p>
            <canvas id="tamponi" ></canvas>
            <script>
                var ctx = document.getElementById('tamponi').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'bar',

                    data: {
                        labels: [<?php echo $date?>],
                        datasets: [{
                            label: 'Tamponi',
                            backgroundColor: 'brown',
                            data: [<?php grafico_tamponi(str_replace(' ', '-', $reg))?>]
                        }]
                    },

                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        }
                    }
                });
            </script>
        </div>



        <!-- The Modal -->
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
            <form class="modal-content animate" action="login.php">

                <div class="container">
                    <label for="user"><b>User</b></label>
                    <input type="text" placeholder="Inserisci user" name="user" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Inserisci Password" name="password" required>

                    <button type="submit">Accedi</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annulla</button>
                    <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
                </div>
            </form>
        </div>

        <!-- The Modal -->
        <div id="id02" class="modal">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
            <form class="modal-content animate" action="registra.php">

                <div class="container">

                    <label for="user"><b>User</b></label>
                    <input type="text" placeholder="Inserisci user" name="user" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Inserisci Password" name="password" required>

                    <button type="submit">Registrati</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annulla</button>
                    <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
                </div>
            </form>
        </div>

    </body>
</html>