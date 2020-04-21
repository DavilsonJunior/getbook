<?php 
extract($viewData);
function cutNameTitulo($titulo) {
    $titulo = explode(" ", $titulo);
    $lenght = sizeof($titulo);
    $nome = $titulo[0];
    for($count=1;$count<$lenght;$count++) {
        
      if($count <= 1) {
        $nome .= " ".$titulo[$count];
      }
  }
  
    echo $nome;
  }

?>
<h1 class="mb-3 text-muted">Gráficos dos livros mais votados</h1>
<script type="text/javascript" src="<?= BASE_URL; ?>assets/js/Chart.min.js"></script>
<div class="row justify-content-center w-100">
    <div class="col-lg-6 col-md-10 col-sm-11 col-12 mb-5 row justify-content-center">
        <h5>Gráfico de Pizza</h5>
        <canvas id="myChartNew"></canvas>
    </div> 
    <div class="col-lg-6 col-md-10 col-sm-11 col-12 mb-5 row justify-content-center">   
        <h5>Gráfico de Barra</h5>
        <canvas id="myChart"></canvas>
    </div>
</div>
<script>
window.onload = function(){
    setTimeout(() => {
        var ct = document.getElementById('myChartNew').getContext('2d');
        var chart = new Chart(ct, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: [
                '<?php cutNameTitulo($titulo[0]); ?>',
                '<?php cutNameTitulo($titulo[1]); ?>', 
                '<?php cutNameTitulo($titulo[2]); ?>', 
                '<?php cutNameTitulo($titulo[3]); ?>',
                '<?php cutNameTitulo($titulo[4]); ?>'
                ],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'               
                    ],
                borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                data: [<?= implode(',', $votos) ?>]
            }]
        },

    options: {}
});

    }, 800);
    
    setTimeout(function(){
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                '<?php cutNameTitulo($titulo[0]); ?>',
                '<?php cutNameTitulo($titulo[1]); ?>', 
                '<?php cutNameTitulo($titulo[2]); ?>', 
                '<?php cutNameTitulo($titulo[3]); ?>',
                '<?php cutNameTitulo($titulo[4]); ?>'
                ],
            datasets: [{
                label: 'Votos x Titulo',
                data: [<?= implode(',', $votos) ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 3,
                barPercentage: 0.7
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    }, 600);
    
}

</script>