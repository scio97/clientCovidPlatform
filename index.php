<?php include("funzioni.php"); ?>
<html>
    <head>
        <title>Titolo - Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <?php menu(); box();?>

        <div class="grafico_regioni">
            <p>Casi totali per regione</p>
            <canvas id="CTRegione" ></canvas>
            <script>
                var ctx = document.getElementById('CTRegione').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'horizontalBar',

                    data: {
                        labels: [<?php grafico_regioni_key()?>],
                        datasets: [{
                            label: 'Casi totali',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [<?php grafico_regioni_value();?>]
                        }],
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

        <div class="grafico_totale_casi">
            <p>Casi totali nazione</p>
            <canvas id="CTNazione" ></canvas>
            <script>
                var ctx = document.getElementById('CTNazione').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'line',

                    data: {
                        labels: [<?php grafico_totale_casi_key()?>],
                        datasets: [{
                            label: 'Casi totali',
                            borderColor: 'yellow',
                            fill: false,
                            data: [<?php grafico_totale_casi_value();?>]
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
            <p>Attualmente positivi - Guariti - Deceduti</p>
            <canvas id="comparativo" ></canvas>
            <script>
                var ctx = document.getElementById('comparativo').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'line',

                    data: {
                        labels: [<?php grafico_comparativo_data()?>],
                        datasets: [{
                            label: 'Casi positivi',
                            borderColor: 'yellow',
                            fill: false,
                            data: [<?php grafico_comparativo_positivi();?>]
                        },{
                            label: 'Guariti',
                            borderColor: 'green',
                            fill: false,
                            data: [<?php grafico_comparativo_guariti();?>]
                        
                        },{
                            label: 'Deceduti',
                            borderColor: 'red',
                            fill: false,
                            data: [<?php grafico_comparativo_deceduti();?>]
                        }]
                    },

                    options: {
                        maintainAspectRatio: false,
                    }
                });
            </script>
        </div>

        <div class="grafico_nuovi_positivi">
            <br><br><br><p>Nuovi Positivi</p>
            <canvas id="nuoviPositivi" ></canvas>
            <script>
                var ctx = document.getElementById('nuoviPositivi').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'line',

                    data: {
                        labels: [<?php grafico_nuovi_positivi_key()?>],
                        datasets: [{
                            label: 'Nuovi positivi',
                            borderColor: 'yellow',
                            fill: false,
                            data: [<?php grafico_nuovi_positivi_value()?>]
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

        <div class="grafico_tamponi">
            <br><br><br><p>Tamponi</p>
            <canvas id="tamponi" ></canvas>
            <script>
                var ctx = document.getElementById('tamponi').getContext('2d');
                var chart = new Chart(ctx, {
                    
                    type: 'bar',

                    data: {
                        labels: [<?php grafico_tamponi_key()?>],
                        datasets: [{
                            label: 'Tamponi',
                            backgroundColor: 'brown',
                            data: [<?php grafico_tamponi_value()?>]
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
    </body>
</html>