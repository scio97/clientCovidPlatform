<?php 
    if(!isset($_SESSION["tipo"])||$_SESSION["tipo"]!=0){
        header("location: /index.php");
    }
    $rows;$id=array();$data_modifica=array();$data=array();$luogo=array();$chiave=array();$valore_vecchio=array();$valore_nuovo=array();$user_fk=array();
?>
<html>
    <head>
        <title>Pannello di controllo - COVID19 ITALIA</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            if (!isset($_GET["pan"])||$_GET["pan"]!="nazione"&&$_GET["pan"]|="regione"&&$_GET["pan"]!="provincia"&&$_GET["pan"]!="cronologia"){
                $pan="nazione";
            }else{
                $pan=$_GET["pan"];
            }
            $ris;
        ?>
    </head>
    <body class="pagina">
        <?php menu();?>
        <br><br><br>
        
        <button class="menu_modifica_admin" onclick="document.getElementById('id03').style.display='block'">Modifica andamento nazionale</button>
        <button class="menu_modifica_admin" onclick="document.getElementById('id04').style.display='block'">Modifica andamento regionale</button>
        <button class="menu_modifica_admin" onclick="document.getElementById('id05').style.display='block'">Modifica andamento provinciale</button>

        <!-- The Modal -->
        <div id="id03" class="modal">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
            <form class="modal-content animate" action="aggiorna.php">

                <div class="container">

                    <h1 style="text-align:center">Modifica andamento nazionale</h1>
                    <input type="hidden" name="mod" value="nazione">

                    <label for="data"><b>Data</b></label>
                    <input type="date" name="data" min="2020-02-24" max=<?php echo '"'.$ris->ultimo_aggiornamento.'"'?> required>

                    <label for="chiave"><b>Chiave</b></label>
                    <select name="chiave" required>
                        <option value="ricoverati_con_sintomi">Ricoverati con sintomi</option>
                        <option value="terapia_intensiva">Terapia intensiva</option>
                        <option value="totale_ospedalizzati">Totale ospedalizzati</option>
                        <option value="isolamento_domiciliale">Isolamento domiciliale</option>
                        <option value="totale_positivi">Totale positivi</option>
                        <option value="variazione_totale_positivi">Variazione totale positivi</option>
                        <option value="nuovi_positivi">Nuovi positivi</option>
                        <option value="dimessi_guariti">Dimessi guariti</option>
                        <option value="deceduti">Deceduti</option>
                        <option value="totale_casi">Totale casi</option>
                        <option value="tamponi">Tamponi</option>
                    </select>

                    <label for="valore"><b>Inserisci nuovo valore</b></label>
                    <input type="number" placeholder="Inserisci nuovo valore" name="valore" required>
                    <button type="submit">Aggiorna</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Annulla</button>
                    <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
                </div>
            </form>
        </div>

        <!-- The Modal -->
        <div id="id04" class="modal">
            <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
            <form class="modal-content animate" action="aggiorna.php">

                <div class="container">

                    <h1 style="text-align:center">Modifica andamento regionale</h1>
                    <input type="hidden" name="mod" value="regione">

                    <label for="regione"><b>Regione</b></label>
                    <select name="regione" required>
                        <option value="Abruzzo">Abruzzo</option>
                        <option value="Basilicata">Basilicata</option>
                        <option value="Campania">Campania</option>
                        <option value="Emilia-Romagna">Emilia-Romagna</option>
                        <option value="Friuli Venezia Giulia">Friuli Venezia Giulia</option>
                        <option value="Lazio">Lazio</option>
                        <option value="Liguria">Liguria</option>
                        <option value="Lombardia">Lombardia</option>
                        <option value="Marche">Marche</option>
                        <option value="Molise">Molise</option>
                        <option value="P.A. Bolzano">P.A. Bolzano</option>
                        <option value="P.A. Trento">P.A. Trento</option>
                        <option value="Piemonte">Piemonte</option>
                        <option value="Puglia">Puglia</option>
                        <option value="Sardegna">Sardegna</option>
                        <option value="Sicilia">Sicilia</option>
                        <option value="Toscana">Toscana</option>
                        <option value="Umbria">Umbria</option>
                        <option value="Valle d'Aosta">Valle d'Aosta</option>
                        <option value="Veneto">Veneto</option>
                    </select>

                    <label for="data"><b>Data</b></label>
                    <input type="date" name="data" min="2020-02-24" max=<?php echo '"'.$ris->ultimo_aggiornamento.'"'?> required>

                    <label for="chiave"><b>Chiave</b></label>
                    <select name="chiave" required>
                        <option value="ricoverati_con_sintomi">Ricoverati con sintomi</option>
                        <option value="terapia_intensiva">Terapia intensiva</option>
                        <option value="totale_ospedalizzati">Totale ospedalizzati</option>
                        <option value="isolamento_domiciliale">Isolamento domiciliale</option>
                        <option value="totale_positivi">Totale positivi</option>
                        <option value="variazione_totale_positivi">Variazione totale positivi</option>
                        <option value="nuovi_positivi">Nuovi positivi</option>
                        <option value="dimessi_guariti">Dimessi guariti</option>
                        <option value="deceduti">Deceduti</option>
                        <option value="totale_casi">Totale casi</option>
                        <option value="tamponi">Tamponi</option>
                    </select>

                    <label for="valore"><b>Inserisci nuovo valore</b></label>
                    <input type="number" placeholder="Inserisci nuovo valore" name="valore" required>

                    <button type="submit">Aggiorna</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Annulla</button>
                    <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
                </div>
            </form>
        </div>

        <!-- The Modal -->
        <div id="id05" class="modal">
            <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
            <form class="modal-content animate" action="aggiorna.php">

                <div class="container">

                    <h1 style="text-align:center">Modifica andamento provinciale</h1>
                    <input type="hidden" name="mod" value="provincia">
                    <label for="provincia"><b>Provincia</b></label>
                    <select name="provincia" required>
                        <option value="Agrigento">Agrigento</option>
                        <option value="Alessandria">Alessandria</option>
                        <option value="Ancona">Ancona</option>
                        <option value="Aosta">Aosta</option>
                        <option value="Arezzo">Arezzo</option>
                        <option value="Ascoli Piceno">Ascoli Piceno</option>
                        <option value="Asti">Asti</option>
                        <option value="Avellino">Avellino</option>
                        <option value="Bari">Bari</option>
                        <option value="Barletta-Andria-Trani">Barletta-Andria-Trani</option>
                        <option value="Belluno">Belluno</option>
                        <option value="Benevento">Benevento</option>
                        <option value="Bergamo">Bergamo</option>
                        <option value="Biella">Biella</option>
                        <option value="Bologna">Bologna</option>
                        <option value="Bolzano">Bolzano</option>
                        <option value="Brescia">Brescia</option>
                        <option value="Brindisi">Brindisi</option>
                        <option value="Cagliari">Cagliari</option>
                        <option value="Caltanissetta">Caltanissetta</option>
                        <option value="Campobasso">Campobasso</option>
                        <option value="Caserta">Caserta</option>
                        <option value="Catania">Catania</option>
                        <option value="Catanzaro">Catanzaro</option>
                        <option value="Chieti">Chieti</option>
                        <option value="Como">Como</option>
                        <option value="Cosenza">Cosenza</option>
                        <option value="Cremona">Cremona</option>
                        <option value="Cuneo">Cuneo</option>
                        <option value="Enna">Enna</option>
                        <option value="Fermo">Fermo</option>
                        <option value="Ferrara">Ferrara</option>
                        <option value="Firenze">Firenze</option>
                        <option value="Foggia">Foggia</option>
                        <option value="Forlì-Cesena">Forlì-Cesena</option>
                        <option value="Frosinone">Frosinone</option>
                        <option value="Genova">Genova</option>
                        <option value="Gorizia">Gorizia</option>
                        <option value="Grosseto">Grosseto</option>
                        <option value="Imperia">Imperia</option>
                        <option value="Isernia">Isernia</option>
                        <option value="L'Aquila">L'Aquila</option>
                        <option value="La Spezia">La Spezia</option>
                        <option value="Latina">Latina</option>
                        <option value="Lecce">Lecce</option>
                        <option value="Lecco">Lecco</option>
                        <option value="Livorno">Livorno</option>
                        <option value="Lodi">Lodi</option>
                        <option value="Lucca">Lucca</option>
                        <option value="Macerata">Macerata</option>
                        <option value="Mantova">Mantova</option>
                        <option value="Massa Carrara">Massa Carrara</option>
                        <option value="Matera">Matera</option>
                        <option value="Messina">Messina</option>
                        <option value="Milano">Milano</option>
                        <option value="Modena">Modena</option>
                        <option value="Monza e della Brianza">Monza e della Brianza</option>
                        <option value="Napoli">Napoli</option>
                        <option value="Novara">Novara</option>
                        <option value="Nuoro">Nuoro</option>
                        <option value="Oristano">Oristano</option>
                        <option value="Padova">Padova</option>
                        <option value="Palermo">Palermo</option>
                        <option value="Parma">Parma</option>
                        <option value="Pavia">Pavia</option>
                        <option value="Perugia">Perugia</option>
                        <option value="Pesaro e Urbino">Pesaro e Urbino</option>
                        <option value="Pescara">Pescara</option>
                        <option value="Piacenza">Piacenza</option>
                        <option value="Pisa">Pisa</option>
                        <option value="Pistoia">Pistoia</option>
                        <option value="Pordenone">Pordenone</option>
                        <option value="Potenza">Potenza</option>
                        <option value="Prato">Prato</option>
                        <option value="Ragusa">Ragusa</option>
                        <option value="Ravenna">Ravenna</option>
                        <option value="Reggio di Calabria">Reggio di Calabria</option>
                        <option value="Reggio nell'Emilia">Reggio nell'Emilia</option>
                        <option value="Rieti">Rieti</option>
                        <option value="Rimini">Rimini</option>
                        <option value="Roma">Roma</option>
                        <option value="Rovigo">Rovigo</option>
                        <option value="Salerno">Salerno</option>
                        <option value="Sassari">Sassari</option>
                        <option value="Savona">Savona</option>
                        <option value="Siena">Siena</option>
                        <option value="Siracusa">Siracusa</option>
                        <option value="Sondrio">Sondrio</option>
                        <option value="Sud Sardegna">Sud Sardegna</option>
                        <option value="Taranto">Taranto</option>
                        <option value="Teramo">Teramo</option>
                        <option value="Terni">Terni</option>
                        <option value="Torino">Torino</option>
                        <option value="Trapani">Trapani</option>
                        <option value="Trento">Trento</option>
                        <option value="Treviso">Treviso</option>
                        <option value="Trieste">Trieste</option>
                        <option value="Udine">Udine</option>
                        <option value="Varese">Varese</option>
                        <option value="Venezia">Venezia</option>
                        <option value="Verbano-Cusio-Ossola">Verbano-Cusio-Ossola</option>
                        <option value="Vercelli">Vercelli</option>
                        <option value="Verona">Verona</option>
                        <option value="Vibo Valentia">Vibo Valentia</option>
                        <option value="Vicenza">Vicenza</option>
                        <option value="Viterbo">Viterbo</option>
                    </select>

                    <label for="data"><b>Data</b></label>
                    <input type="date" name="data" min="2020-02-24" max=<?php echo '"'.$ris->ultimo_aggiornamento.'"'?> required>

                    <label for="totale_casi"><b>Inserisci nuovo valore di casi totali</b></label>
                    <input type="number" placeholder="Inserisci nuovo valore" name="valore" required>

                    <button type="submit">Aggiorna</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Annulla</button>
                    <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
                </div>
            </form>
        </div>
        <?PHP cronologia_modifiche(); ?>
        <table class="table_dark">
            <caption>Cronologia modifiche</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DATA MODIFICA</th>
                    <th>DATA</th>
                    <th>LUOGO</th>
                    <th>CHIAVE</th>
                    <th>VECCHIO VALORE</th>
                    <th>NUOVO VALORE</th>
                    <th>UTENTE</th>
                    <th></th>
                </tr>
            <thead>
            <tbody>
                    <?php
                        for($i=$rows-1; $i>=0; $i--){
                            echo "<tr>";
                            echo "<td>".$id[$i]."</td>";
                            echo "<td>".$data_modifica[$i]."</td>";
                            echo "<td>".$data[$i]."</td>";
                            echo "<td>".$luogo[$i]."</td>";
                            echo "<td>".$chiave[$i]."</td>";
                            echo "<td>".$valore_vecchio[$i]."</td>";
                            echo "<td>".$valore_nuovo[$i]."</td>";
                            echo "<td>".$user_fk[$i]."</td>";
                            //echo "<td><a href='https://clientcovid.herokuapp.com/elimina.php?id=".$id[$i]."'><img src='stemmi/elimina.svg' width='20' height='20'></td>";
                            echo "<td><a href='http://localhost:8000/elimina.php?id=".$id[$i]."'><img src='stemmi/elimina.svg' width='20' height='20'></td>";header("location: /index.php");
                            echo "</tr>";
                        }
                    ?>    
            </tbody> 
        </table>

    </body>
</html>