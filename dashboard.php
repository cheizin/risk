<?php
require_once('includes/connect.php');
require_once('functions/chart-dashboard.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DASHBOARD | PRMIS</title>
  <!-- Tell the browser to be responsive to screen width -->
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
  <link href="dist/css/custom.css" rel="stylesheet" />
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="dist/css/custom.css">
  <style>
  .medium, .high, .very_high, .low, .very_low
  {
    height: 100px;
    width: 100px;
    cursor: cell;
  }

  </style>

</head>
<body class="hold-transition skin-cma sidebar-mini">
<div class="wrapper">
  <?php include("pages/layout/main-header.php");?>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="reports.php"><i class="fa fa-dashboard"></i> <span>Reports</span></a></li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Objectives</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/objectives/view-objectives.php"><i class="fa fa-circle-o"></i> View Objectives</a></li>
            <li><a href="pages/objectives/add-objectives.php"><i class="fa fa-circle-o"></i> Add Objectives</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Risks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/risk-management/add-risks.php" class="children" ><i class="fa fa-circle-o"></i> Add Risks</a></li>
            <li><a href="pages/risk-management/add-opportunity.php" class="children"><i class="fa fa-circle-o"></i> Add Opportunity</a></li>
            <li><a href="pages/risk-management/view-risks.php" class="children"><i class="fa fa-circle-o"></i> View Risks</a></li>
          </ul>
        </li>
        <li><a href="pages/risk-management/add-emerging-trends-and-lessons-learnt.php"><i class="fa fa-circle-o"></i> <span>Emerging Trends<br/> & Lessons Learnt</span></a></li>
        <li><a href="home.php"><i class="fa fa-home"></i> <span>HOME</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
     <!-- start row programme information -->
     <?php
     $p = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM years ORDER BY id DESC LIMIT 1"));
     $select_period = $p['period'];
     $select_quarter = $p['quarter'];
      ?>
     <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-exclamation-triangle fa-lg"></i> Risks Heatmap</a></li>
      <li><a data-toggle="tab" href="#menu1"><i class="fa fa-lightbulb-o fa-lg"></i> Opportunities Heatmap</a></li>
    </ul>

    <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="row">
        <div class="col-md-8">
          <div class="box-header">
            <h3 class="box-title">Top 10 Departmental Risks</h3>
          </div>
            <div class="table-responsive">

            <table class="table table-bordered">

              <?php
                 $sql_query = mysqli_query($dbc,"SELECT * FROM update_risk_status WHERE dep_code='".$_SESSION['department_code']."' && risk_opportunity='risk' && changed='no'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10");
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
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                     <br/>
                  </td>
                  <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 10">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 15">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="very_high" style="background-color: #FF0000;" title="OVERALL SCORE: 20">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="very_high" style="background-color: #FF0000;" title="OVERALL SCORE: 25">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
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
                                                      && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                              }
                            }

                         ?>
                      </td>
                      <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 8">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='2' && changed='no'
                                                      && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                                ?>
                                <form method="post" action="pages/risk-management/update-risk-status.php">
                                  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
                                  <button class="btn btn-link" type="submit">
                                    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span><br/>";?>
                                  </button>
                                </form>
                                <?php

                              }
                            }

                         ?>
                      </td>
                      <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 12">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='3' && changed='no'
                                                      && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                              }
                            }

                         ?>
                      </td>
                      <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 16">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='4' && changed='no'
                                                      && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php

                              }
                            }

                         ?>
                      </td>
                      <td class="very_high" style="background-color: #FF0000;" title="OVERALL SCORE: 20">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='5' && changed='no'
                                                      && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
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
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 6">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 9">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 12">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 15">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
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
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 4">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 6">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 8">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td  class="high" style="background-color: #FFC200;" title="OVERALL SCORE: 10">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
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
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="very_low" style="background-color: #006400;" title="OVERALL SCORE: 2">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 3">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="low" style="background-color: #00FF00;" title="OVERALL SCORE: 4">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #FFFF00;" title="OVERALL SCORE: 5">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='risk'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
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
          $sql_query = mysqli_query($dbc,"SELECT * FROM update_risk_status WHERE dep_code='".$_SESSION['department_code']."' && risk_opportunity='risk' && changed='no'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10");
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
        else {
          ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-danger"><i class="fa fa-info-circle"></i> No Records Found</td>

              </tr>

            </thead>
            <tr>
              <td class="text-danger">Sorry, no records have been found for
                this quarter (<span class="text-info"><?php echo $select_quarter?></span>) and period (<span class="text-info"><?php echo $select_period?></span>)

              </td>

            </tr>

          </table>

          <?php
        }
               ?>
        </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="row">
        <div class="col-md-8">
          <div class="box-header">
            <h3 class="box-title">Top 10 Departmental Opportunities</h3>
          </div>
            <div class="table-responsive">
            <table class="table table-bordered">

              <?php
                 $sql_query = mysqli_query($dbc,"SELECT * FROM update_risk_status WHERE dep_code='".$_SESSION['department_code']."' && risk_opportunity='opportunity' && changed='no'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10");
                 $sql_query_risk_position = mysqli_fetch_array($sql_query);
               ?>
              <tbody>
                <tr>
                  <td rowspan="5" class="impact_rotate">Impact</td>
                  <td>Transformational <br/><small class="text-primary">5</small></td>
                  <td class="medium" style="background-color: #59b4e0;"  title="OVERALL SCORE: 5">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='1' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                     <br/>
                  </td>
                  <td class="high" style="background-color: #008dcf;" title="OVERALL SCORE: 10">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="high" style="background-color: #008dcf;" title="OVERALL SCORE: 15">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="very_high" style="background-color: #0272a6;" title="OVERALL SCORE: 20">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="very_high" style="background-color: #0272a6;" title="OVERALL SCORE: 25">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='5' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                </tr>
                <tr>
                  <td>Major <br/><small class="text-primary">4</small></td>
                      <td class="low" style="background-color: #99d1ec;" title="OVERALL SCORE: 4">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='1' && changed='no'
                                                      && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                              }
                            }

                         ?>
                      </td>
                      <td class="medium" style="background-color: #59b4e0;" title="OVERALL SCORE: 8">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='2' && changed='no'
                                                      && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                                ?>
      <form method="post" action="pages/risk-management/update-risk-status.php">
        <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
        <button class="btn btn-link" type="submit">
          <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
        </button>
      </form>
      <?php
                              }
                            }

                         ?>
                      </td>
                      <td class="high" style="background-color: #008dcf;" title="OVERALL SCORE: 12">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='3' && changed='no'
                                                      && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                              }
                            }

                         ?>
                      </td>
                      <td class="high" style="background-color: #008dcf;" title="OVERALL SCORE: 16">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='4' && changed='no'
                                                      && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php

                              }
                            }

                         ?>
                      </td>
                      <td class="very_high" style="background-color: #0272a6;" title="OVERALL SCORE: 20">
                        <?php
                           $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                      WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='4' && current_likelihood_score='5' && changed='no'
                                                      && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                            if(mysqli_num_rows($sql) > 0)
                            {
                              while ($risk_position = mysqli_fetch_array($sql)) {
                              ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                              }
                            }

                         ?>
                      </td>

                </tr>
                <tr>
                  <td>Moderate <br/><small class="text-primary">3</small></td>
                  <td class="low" style="background-color: #99d1ec;" title="OVERALL SCORE: 3">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='1' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #59b4e0;" title="OVERALL SCORE: 6">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #59b4e0;" title="OVERALL SCORE: 9">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="high" style="background-color: #008dcf;" title="OVERALL SCORE: 12">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="high" style="background-color: #008dcf;" title="OVERALL SCORE: 15">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='3' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                </tr>
                <tr>
                  <td>Minor <br/><small class="text-primary">2</small></td>
                  <td class="very_low" style="background-color: #d4ecf8;" title="OVERALL SCORE: 2">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='1' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="low" style="background-color: #99d1ec;" title="OVERALL SCORE: 4">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #59b4e0;" title="OVERALL SCORE: 6">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #59b4e0;" title="OVERALL SCORE: 8">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td  class="high" style="background-color: #008dcf;" title="OVERALL SCORE: 10">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='2' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                </tr>
                <tr>
                  <td>Insignificant <br/><small class="text-primary">1</small></td>
                  <td class="very_low" style="background-color: #d4ecf8;" title="OVERALL SCORE: 1">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='1' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="very_low" style="background-color: #d4ecf8;" title="OVERALL SCORE: 2">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='2' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="low" style="background-color: #99d1ec;" title="OVERALL SCORE: 3">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='3' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="low" style="background-color: #99d1ec;" title="OVERALL SCORE: 4">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='4' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
                        if(mysqli_num_rows($sql) > 0)
                        {
                          while ($risk_position = mysqli_fetch_array($sql)) {
                          ?>
<form method="post" action="pages/risk-management/update-risk-status.php">
  <input type="hidden" name="reference_no" value="<?php echo $risk_position['reference_no'];?>">
  <button class="btn btn-link" type="submit">
    <?php echo "<span class='hitmap_bubble' data-toggle='bootstrap_tooltip' title='".$risk_position['risk_description']."'>" .$risk_position['reference_no'] ."</span>";?>
  </button>
</form>
<?php
                          }
                        }

                     ?>
                  </td>
                  <td class="medium" style="background-color: #59b4e0;" title="OVERALL SCORE: 5">
                    <?php
                       $sql = mysqli_query($dbc,"SELECT * FROM update_risk_status
                                                  WHERE dep_code='".$_SESSION['department_code']."'&& current_impact_score='1' && current_likelihood_score='5' && changed='no'
                                                  && risk_opportunity='opportunity'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10 ");
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
          $sql_query = mysqli_query($dbc,"SELECT * FROM update_risk_status WHERE dep_code='".$_SESSION['department_code']."' && risk_opportunity='opportunity' && changed='no'  && period_from='".$select_period."' && quarter='".$select_quarter."' ORDER BY current_overall_score DESC LIMIT 10");
          $number = 1;
          if($total_rows = mysqli_num_rows($sql_query) > 0)
          {?>
            <table class="table table-bordered table-striped table-hover" id="risks-heatmap-opportunities-table">
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
        else {
          ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-danger"><i class="fa fa-info-circle"></i> No Records Found</td>

              </tr>

            </thead>
            <tr>
              <td class="text-danger">Sorry, no records have been found for
                this quarter (<span class="text-info"><?php echo $select_quarter?></span>)
                and period (<span class="text-info"><?php echo $select_period?></span>)

              </td>

            </tr>

          </table>

          <?php
        }
               ?>
        </div>

      </div>
    </div>
  </div>

      </div>
      <!-- end heatmap -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- start footer -->
  <?php include("pages/layout/footer.php");?>
  <!-- end footer -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- custom js -->
<script src="functions/forms.js"></script>
<script src="functions/select-change.js"></script>
<script src="functions/search-table.js"></script>
<script src="dist/js/typed.js"></script>
<script src="functions/days_remaining.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">


$(function () {


    var data_click = <?php echo $click; ?>;
    var data_viewer = <?php echo $viewer; ?>;

    var corporate_risk = <?php echo $corporate_risk; ?>;
    var corporate_opportunity = <?php echo $corporate_opportunity; ?>;


    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['']
        },
        yAxis: {
            title: {
                text: 'Total Number'
            }
        },
        series: [{
            name: 'Total Opportunities',
            data: data_click
        }, {
            name: 'Total Risks',
            data: data_viewer
        },{
            name: 'Corporate Risks',
            data: corporate_risk
        }, {
            name: 'Corporate Opportunity',
            data: corporate_opportunity
        }]
    });
});


</script>

</body>
</html>
