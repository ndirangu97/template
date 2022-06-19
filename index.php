<!DOCTYPE html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8' />
    <meta
      name='viewport'
      content='width=device-width, initial-scale=1, shrink-to-fit=no'
    />
    <title>Milimani</title>
    <!-- base:css -->
    <link rel='stylesheet' href='vendors/typicons/typicons.css' />
    <link rel='stylesheet' href='vendors/css/vendor.bundle.base.css' />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel='stylesheet' href='css/vertical-layout-light/style.css' />
    <!-- endinject -->
    <link rel='shortcut icon' href='images/favicon.png' />

    <style>
      .bodyWrapper {
        padding: 0 10px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        height: 600px;
        width: 100%;
        overflow-y: hidden;
      }
    </style>
  </head>
  <body>
    <?php include "./head.view.php" ?>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src='vendors/js/vendor.bundle.base.js'></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src='vendors/chart.js/Chart.min.js'></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src='js/off-canvas.js'></script>
    <script src='js/hoverable-collapse.js'></script>
    <script src='js/template.js'></script>
    <script src='js/settings.js'></script>
    <script src='js/todolist.js'></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src='js/dashboard.js'></script>
    <!-- End custom js for this page-->
  </body>
</html>
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<script type='text/javascript'>

  const counters=document.querySelectorAll('.counter')

  counters.forEach(counter => {
    counter.innerHTML='0'

    const updateCounter=()=>{
    const target=counter.getAttribute('data-target');
    const c= +counter.innerHTML;

    const increment=target / 200;

    if (c<target) {
      counter.innerHTML=`${Math.ceil(c + increment) }`;
      setTimeout( updateCounter,1) ;
    }else{
      counter.innerHTML=target;
    }
    
  }
   updateCounter() ;

  });

 


  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Work',     11],
      ['Eat',      2],
      ['Commute',  2],
      ['Watch TV', 34],
      ['Sleep',    7]
    ]);

    var options = {
      title: 'My Daily Activities'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Expenses', 'Book', 'Food'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Milimani Inventories',
            subtitle: 'Expenses, Book, Food and : 2017-2020',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
