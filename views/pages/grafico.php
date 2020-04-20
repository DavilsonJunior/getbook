<?php  $viewName ?>
<script type="text/javascript" src="<?= BASE_URL; ?>assets/js/Chart.min.js"></script>
<canvas id="myChart" class="col-lg-6 col-md-8 col-sm-12 col-12"></canvas>
<script>
window.onload = function(){
    setTimeout(function(){
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Harry Potter', 'Percy Jackson', 'Yellow', 'Green', 'Purple'],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',',$teste); ?>],
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
                borderWidth: 1
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