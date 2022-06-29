<?php
require_once "./connection.php";
$DB = new Database();
$c= $_GET['class'];
$s= $_GET['stream'];
$tb="";
$i=0;

$sql=false;

$sql="SELECT * FROM students WHERE class='$c' and stream='$s'";
$res=$DB->read($sql,[]);
if (is_array($res)) {
    foreach ($res as $key ) {
        $i++;
        $tb.="
        <tr style='border-bottom: 1px solid black;'>

              <tr>
                <th rowspan='2'>$i</th>
                <th rowspan='2'>$key->name</th>
                <th rowspan='2'>$key->class $key->stream</th>
                <th rowspan='2'>$key->gender</th>
                <td >$key->gname</td>
                
                <td >$key->gno</td>
                <td >$key->grole</td>
              </tr>";
              if ($key->g2name!="") {
                $tb.="
                <tr>
                <td>$key->g2name</td>
                <td>$key->g2no</td>
                <td >$key->grole2</td>
              </tr>
                ";
              }

              $tb.="
              
              
              ";
              
           $tb.="</tr>
        
        ";
    }
}

$a="




<!DOCTYPE html>
<html lang='en'>

<head>
  <!-- Required meta tags -->
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
  <title>Ngeya</title>
  <!-- base:css -->
  <link rel='stylesheet' href='vendors/typicons/typicons.css' />
  <link rel='stylesheet' href='./css/bootstrap.min.css'>
  <script src='./js/bootstrap.min.js'></script>
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
      height: 540px;
      width: 100%;
      overflow-y: scroll;
    }
    
  ::-webkit-scrollbar {
    width: 7px;
    height: 10px;
    background: inherit;
  }

  ::-webkit-scrollbar-thumb {
    height: 10px;
    width: 7px;
    background: grey;
    border-radius: 4px;
  }
  .content-table {
    border-collapse: collapse;
    margin: 0;
    font-size: 0.9em;
    width: 100%;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    font-size: 16px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    min-height: 400px;
  }

  .content-table thead tr {
    background: #b1afaf;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
  }

  .content-table th,
  .content-table td {
    padding: 10px 15px;
    text-align: center;
  }

  .content-table tbody tr {
    border-bottom: 1px solid #f5f5f5  ;
    cursor: pointer;
  }




  ::-webkit-scrollbar-track {
    background: inherit;
    width: 5px;
    height: 10px;
  }
  </style>
</head>

<body>

  <div class='container-scroller' style='height: 100vh'>
    <!-- partial:partials/_navbar.html -->

    <!-- partial -->

    <div class='container-fluid page-body-wrapper'>

      <!-- partial -->
      <div  style='height:100vh;width:100%;overflow:auto;display:flex;flex-direction:column;align-items:center;'>
        <h3>NGEYA PRIMARY ACCOUNT ACTIVITY</h3>
        <div style='display:flex;justify-content:center;align-items:center;'>
          <h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
          
              <tr>
                <td>#</td>
                <td>Name</td>
                <td>Class</td>
                <td>Gender</td>
                <td>Guardian</td>
                <td>Phone</td>
                <td>Role</td>
              </tr>
            </thead>
            <tbody>
                $tb
           
           
            </tbody>
          </table>
          
        </div>
      </div>

    </div>

    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
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



";

require_once "./dompdf/autoload.inc.php";

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($a);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("$c"."$s"."pdf", array("Attachment" => false));