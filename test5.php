<?php
session_start();
require_once('includes/connect.php');

//$sql_query_risk_position = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM update_risk_status WHERE dep_code='".$_SESSION['department_code']."' && changed='no' ORDER BY current_overall_score DESC LIMIT 10"));


?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .medium, .high, .very_high, .low, .very_low
  {
    height: 100px;
    width: 100px;
    cursor: cell;
  }


  </style>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" href="dist/img/cma.PNG" sizes="16x16" type="image/png">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin.cma.css">
  <link rel="stylesheet" href="dist/css/custom.css">
  <link href="dist/css/loader.css" rel="stylesheet">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!--datatables -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

<div class="container">
  <h2>Heat Map</h2>
  <div class="col-md-8">
      <div class="table-responsive">
      <table class="table table-bordered">

        <?php
           $sql_query = mysqli_query($dbc,"SELECT * FROM update_risk_status WHERE dep_code='".$_SESSION['department_code']."' && changed='no' ORDER BY current_overall_score DESC LIMIT 10");
           $sql_query_risk_position = mysqli_fetch_array($sql_query);
         ?>
        <tbody>
          <tr>
            <td rowspan="5" class="impact_rotate">Impact</td>
            <td>Catastrophic <br/><small class="text-primary">5</small></td>
            <td class="medium" style="background-color: #FFFF00;"  title="OVERALL SCORE: 5">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='1' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
               <br/>
            </td>
            <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 10">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='2' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 15">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='3' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="very_high" style="background-color: #FF0000;" title="OVERALL SCORE: 20">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='4' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="very_high" style="background-color: #FF0000;" title="OVERALL SCORE: 25">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='5' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
          </tr>
          <tr>
            <td>Major <br/><small class="text-primary">4</small></td>
                <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 4">
                  <?php
                     $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='1' && changed='no'
                                                ORDER BY current_overall_score DESC LIMIT 10 ");
                      if(mysqli_num_rows($sql) > 0)
                      {
                        while ($risk_position = mysqli_fetch_array($sql)) {
                          echo $risk_position['reference_no'] ."<br/>";
                        }
                      }

                   ?>
                </td>
                <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 8">
                  <?php
                     $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='2' && changed='no'
                                                ORDER BY current_overall_score DESC LIMIT 10 ");
                      if(mysqli_num_rows($sql) > 0)
                      {
                        while ($risk_position = mysqli_fetch_array($sql)) {
                          echo "<span class='bg-star'>".$risk_position['reference_no'] ."</span><br/>";
                        }
                      }

                   ?>
                </td>
                <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 12">
                  <?php
                     $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='3' && changed='no'
                                                ORDER BY current_overall_score DESC LIMIT 10 ");
                      if(mysqli_num_rows($sql) > 0)
                      {
                        while ($risk_position = mysqli_fetch_array($sql)) {
                          echo $risk_position['reference_no'] ."<br/>";
                        }
                      }

                   ?>
                </td>
                <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 16">
                  <?php
                     $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='4' && changed='no'
                                                ORDER BY current_overall_score DESC LIMIT 10 ");
                      if(mysqli_num_rows($sql) > 0)
                      {
                        while ($risk_position = mysqli_fetch_array($sql)) {
                          echo $risk_position['reference_no'] ."<br/>";

                        }
                      }

                   ?>
                </td>
                <td class="very_high" style="background-color: #FF0000;" title="OVERALL SCORE: 20">
                  <?php
                     $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='5' && changed='no'
                                                ORDER BY current_overall_score DESC LIMIT 10 ");
                      if(mysqli_num_rows($sql) > 0)
                      {
                        while ($risk_position = mysqli_fetch_array($sql)) {
                          echo $risk_position['reference_no'] ."<br/>";
                        }
                      }

                   ?>
                </td>

          </tr>
          <tr>
            <td>Moderate <br/><small class="text-primary">3</small></td>
            <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 3">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='1' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 6">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='2' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 9">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='3' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 12">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='4' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 15">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='5' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
          </tr>
          <tr>
            <td>Minor <br/><small class="text-primary">2</small></td>
            <td class="very_low" style="background-color: #006400;" title="OVERALL SCORE: 2">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='1' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 4">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='2' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 6">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='3' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 8">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='4' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td  class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 10">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='5' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
          </tr>
          <tr>
            <td>Insignificant <br/><small class="text-primary">1</small></td>
            <td class="very_low" style="background-color: #006400;" title="OVERALL SCORE: 1">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='1' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="very_low" style="background-color: #006400;" title="OVERALL SCORE: 2">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='2' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 3">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='3' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 4">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='4' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo $risk_position['reference_no'] ."<br/>";
                    }
                  }

               ?>
            </td>
            <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 5">
              <?php
                 $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                            WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='5' && changed='no'
                                            ORDER BY current_overall_score DESC LIMIT 10 ");
                  if(mysqli_num_rows($sql) > 0)
                  {
                    while ($risk_position = mysqli_fetch_array($sql)) {
                      echo "<span class='ref_no'>". $risk_position['reference_no'] ."</span><br/>";
                    }
                  }

               ?>
            </td>
          </tr>
          <tr>
            <td colspan="2" rowspan="2"><i class="fa fa-times fa-lg"></i></td>
            <td>Rare <br/><small class="text-primary">1</small></td>
            <td>Unlikely <br/><small class="text-primary">2</small></td>
            <td>Likely <br/><small class="text-primary">3</small></td>
            <td>Highly Likely <br/><small class="text-primary">4</small></td>
            <td>Almost Certain <br/><small class="text-primary">5</small></td>
          </td>
        </tr>
        <tr>
          <td colspan="5">Likelihood</td>
        </tr>
        </tbody>
      </table>
      </div>
</div>
<div class="col-md-4">
  <?php
    $sql_query = mysqli_query($dbc,"SELECT * FROM update_risk_status WHERE dep_code='".$_SESSION['department_code']."' && changed='no' ORDER BY current_overall_score DESC LIMIT 10");
    $number = 1;
    if($total_rows = mysqli_num_rows($sql_query) > 0)
    {?>
      <table class="table table-bordered table-striped table-hover" id="risks-heatmap-table">
          <thead>
            <tr>
              <td>No</td>
              <td>Risk</td>
              <td>Score</td>
              <td>Ref No</td>
            </tr>
          </thead>
          <?php
          while($row = mysqli_fetch_array($sql_query))
          {
           ?>
            <tr>
              <td><?php echo $number++ ;?></td>
              <td><?php echo $row['risk_description'];?></td>
              <td><?php echo $row['current_overall_score'];?></td>
              <td><?php echo $row['reference_no'];?></td>
            </tr>
          <?php
}
           ?>
        </table>

        <?php
}
         ?>
</div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="functions/heatmaps-table.js"></script>



</body>
</html>
