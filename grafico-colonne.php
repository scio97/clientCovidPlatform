<?php
$nome_prov;
$valore_prov;
grafico_provincie(str_replace(' ', '-', $reg));
?>
<div class="grafico_colonne">
    <br><br><br><p>Casi totali per provincia</p>
    <canvas id="CTColonne" ></canvas>
    <script>
        var ctx = document.getElementById('CTColonne').getContext('2d');
        var chart = new Chart(ctx, {
            
            type: 'horizontalBar',

            data: {
                labels: [<?php echo $nome_prov;?>],
                datasets: [{
                    label: 'Casi totali',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php echo $valore_prov;?>]
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