<div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Grafik</li>
        </ol>

        <!-- Page Content -->
        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        <?php 
            $query = mysqli_query($db,"SELECT tbl_master_kategori.nama_kategori, COUNT(tbl_artikel.id_artikel) AS jumlah FROM tbl_artikel LEFT JOIN tbl_master_kategori ON tbl_master_kategori.id_kategori=tbl_artikel.kategori  GROUP BY tbl_artikel.kategori ");
            
                while ($row = mysqli_fetch_assoc($query)){
                    $arrayData[] = "["."'".$row['nama_kategori']."'".",".$row['jumlah']."]";
                }
            
         ?>
	</div>
</div>
<script src="js/highcharts/highcharts.js"></script>
<script src="js/highcharts/exporting.js"></script>
<script src="js/highcharts/export-data.js"></script>
<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase jumlah Artikel/Kategori'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [<?= join($arrayData,",")?>],
    }]
});
</script>
