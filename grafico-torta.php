<?php
$nome_reg;
$valore_reg;
grafico_regioni();
?>
<div class="grafico_torta">
    <br><br><br><p>Casi totali per regione</p>
    <canvas id="CTTorta" ></canvas>
    <script>
        var ctx = document.getElementById('CTTorta').getContext('2d');
        var chart = new Chart(ctx, {
            
            type: 'pie',

            data: {
                labels: [<?php echo $nome_reg;?>],
                datasets: [{
                    label: 'Casi totali',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php echo $valore_reg;?>]
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