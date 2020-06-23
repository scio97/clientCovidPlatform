<?php
$nome_reg;
$valore_reg;
grafico_regioni();
?>
<div class="grafico_torta">
    <br><br><br><br><p class="titolo">Casi totali per regione</p>
    <canvas id="CTTorta" ></canvas>
    <script>
        var ctx = document.getElementById('CTTorta').getContext('2d');
        var chart = new Chart(ctx, {
            
            type: 'doughnut',

            data: {
                datasets: [{
                    data: [<?php echo $valore_reg;?>],
                    backgroundColor: [
                        'pink',
                        'MediumVioletRed',
                        'lavender',
                        'indigo',
                        'LightSalmon',
                        'darkRed',
                        'orange',
                        'orangeRed',
                        'gold',
                        'darkKhaki',
                        'greenYellow',
                        'Teal',
                        'aqua',
                        'darkTurquoise',
                        'cadetBlue',
                        'midnightBlue',
                        'cornsilk',
                        'maroon',
                        'white',
                        'mistyRose',
                        'gainsboro',
                    ],
                    label: 'Casi totali'
                }],
                labels: [<?php echo $nome_reg;?>]
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