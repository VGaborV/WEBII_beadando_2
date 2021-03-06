<canvas id="gyartoDarab" width="400" height="400"></canvas>
<script>
const ctx = document.getElementById('gyartoDarab').getContext('2d');
const gyartoDarab = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode(array_map(function ($entry) { return $entry['gyarto']; }, $params['gyartoBejegyzesek'])); ?>,
    datasets: [{
      label: 'Gyártó eszköz bejegyzései a nyílvántartásban',
      data: <?php echo json_encode(array_map(function ($entry) { return $entry['bejegyzes']; }, $params['gyartoBejegyzesek'])); ?>,
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
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>