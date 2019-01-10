<?php
require_once('includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REPORTS | PRMIS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" href="dist/img/cma.PNG" sizes="16x16" type="image/png" media="all">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" media="all">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css" media="all">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css" media="all">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css" media="all">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin.cma.css" media="all">
  <link rel="stylesheet" href="dist/css/custom.css" media="all">
  <link href="dist/css/loader.css" rel="stylesheet" media="all">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css" media="all">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css" media="all">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" media="all">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css" media="all">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" media="all">
    <!--datatables -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" media="all">
  <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" media="all">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" media="all" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" media="all">
  <style>
  .medium, .high, .very_high, .low, .very_low
  {
    height: 100px;
    width: 100px;
    cursor: cell;
  }



  </style>
  <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="bootstrap_tooltip"]').tooltip();
});
</script>


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
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="active"><a href="reports.php"><i class="fa fa-dashboard"></i> <span>Reports</span></a></li>
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Incident Reporting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/risk-management/view-incident-reporting.php"><i class="fa fa-circle-o"></i> View Incident Report</a></li>
            <li><a href="pages/risk-management/add-incident-reporting.php"><i class="fa fa-circle-o"></i> Add Incident Reports</a></li>
          </ul>
        </li>
        <li><a href="home.php"><i class="fa fa-home"></i> <span>HOME</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
                  <?php
                  if(isset($_POST['report_type']) == '')
                  {
                    exit('
                        <p  class="text-warning"><i class="fa fa-info-circle"></i> Please select report type</p>
                        <a href="reports.php">Select Report</a>
                        <?php
                      ');

                  }
                      if($_POST['report_type'] == 'new_risks_opportunities')
                      {
                        ?>
                          <!-- start risk report -->
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">New Risks</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body table-responsive no-padding">
                                <?php
                                if($_SESSION['access_level'] == 'admin')
                                {
                                  $sql_query = mysqli_query($dbc,"SELECT * FROM risk_management WHERE changed='no' ORDER BY id DESC");
                                }
                                else
                                {
                                  $sql_query = mysqli_query($dbc,"SELECT * FROM risk_management WHERE department_code='".$_SESSION['department_code']."' && changed='no' ORDER BY id DESC");
                                }

                                $number = 1;
                                if($total_rows = mysqli_num_rows($sql_query) > 0)
                                {?>
                                <table class="table table-striped table-bordered table-hover" id="risk-management-risk-reports-new-risks-table" width="100%">
                                  <thead>
                                    <tr>
                                      <td>NO</td>
                                      <td>Department</td>
                                      <td>Strategic Objective</td>
                                      <td>Departmental Objective</td>
                                      <td>Departmental Sub Objective</td>
                                      <td>Ref No</td>
                                      <td>Risk Description</td>
                                      <td>Risk Drivers</td>
                                      <td>Key Risk Indicator</td>
                                      <td>Curent KRI Level</td>
                                      <td>Impact</td>
                                      <td>Likelihood Score</td>
                                      <td>Impact Score</td>
                                      <td>Overall Score</td>
                                      <td>Treatment Action</td>
                                      <td>Person Responsible</td>
                                      <td>Created By</td>
                                      <td>Date Recorded</td>
                                    </tr>
                                  </thead>
                                  <?php
                                  while($row = mysqli_fetch_array($sql_query))
                                  {?>
                                  <tr style="cursor: pointer;">
                                    <td><?php echo $number++;?></td>
                                    <td><?php echo $row['department'];?></td>
                                    <td><?php echo $row['strategic_objective'];?></td>
                                    <td><?php echo $row['departmental_objective'];?></td>
                                    <td><?php echo $row['departmental_sub_objective'];?></td>
                                    <td>
                                      <form method="post" action="pages/risk-management/risk.php">
                                          <input type="hidden" name="reference_no" value="<?php echo $row['risk_reference']; ?>">
                                          <button type="submit" name="submit" class="btn btn-info"><?php echo $row['risk_reference'];?></button>
                                      </form>
                                    </td>
                                    <td><?php echo $row['risk_description'];?></td>
                                    <td>
                                    <?php
                                    $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                    if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                       {
                                        while($risk_driver_row = mysqli_fetch_array($driver_query))
                                        {
                                          ?>
                                          <ul><li> <?php echo $risk_driver_row['risk_drivers'];?></li></ul>

                                          <?php
                                        }
                                       }

                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                    $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                    if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                       {
                                        while($risk_driver_row = mysqli_fetch_array($driver_query))
                                        {
                                          ?>
                                          <ul><li> <?php echo $risk_driver_row['key_risk_indicator'];?></li></ul>

                                          <?php
                                        }
                                       }

                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                    $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                    if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                       {
                                        while($risk_driver_row = mysqli_fetch_array($driver_query))
                                        {
                                          ?>
                                          <ul><li> <?php echo $risk_driver_row['current_kri_level'];?></li></ul>

                                          <?php
                                        }
                                       }

                                    ?>
                                    </td>
                                    <td><?php echo $row['impact'];?></td>
                                    <td><?php echo $row['likelihood_score'];?></td>
                                    <td><?php echo $row['impact_score'];?></td>

                                    <?php
                                      if($row['overall_score'] >0 && $row['overall_score'] < 3)
                                      {?>
                                      <td class="very_low" style="background-color: #006400;"><?php echo $row['overall_score'];?></td>
                                        <?php
                                      }
                                      if($row['overall_score'] >2 && $row['overall_score'] < 5)
                                      {?>
                                      <td class="low" style="background-color: #00FF00;"><?php echo $row['overall_score'];?></td>
                                        <?php
                                      }
                                      if($row['overall_score'] >4 && $row['overall_score'] < 10)
                                      {?>
                                      <td class="medium" style="background-color: #FFFF00;"><?php echo $row['overall_score'];?></td>
                                        <?php
                                      }
                                      if($row['overall_score'] >9 && $row['overall_score'] < 17)
                                      {?>
                                      <td class="high" style="background-color: #FFC200;"><?php echo $row['overall_score'];?></td>
                                       <?php
                                      }
                                      if($row['overall_score'] >19 && $row['overall_score'] < 26)
                                      {?>
                                        <td class="very_high" style="background-color: #FF0000;"><?php echo $row['overall_score'];?></td>
                                      <?php
                                      }
                                      ?>
                                    <td>
                                     <?php
                                    $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                    if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                       {
                                        while($risk_driver_row = mysqli_fetch_array($driver_query))
                                        {
                                          ?>
                                          <ul><li> <?php echo $risk_driver_row['treatment_action'];?></li></ul>

                                          <?php
                                        }
                                       }

                                    ?>
                                    </td>
                                    <td><?php echo $row['person_responsible'];?></td>
                                    <td><?php echo $row['created_by'];?></td>
                                    <td><?php echo $row['date_recorded'];?></td>
                                  </tr>
                                  <?php
                                  }
                                  ?>
                                  <tfoot>
                                      <tr>
                                          <th>NO</th>
                                          <th>Ref No</th>
                                          <th>Risk Description</th>
                                          <th>Strategic Objective</th>
                                          <th>Departmental</th>
                                          <th>Departmental Objective</th>
                                          <th>Departmental Sub Obective</th>
                                          <th>Key Risk Indicator</th>
                                          <th>Risk Drivers</th>
                                          <th>Curent KRI Level</th>
                                          <th>Impact</th>
                                          <th>Impact Score</th>
                                          <th>Likelihood Score</th>
                                          <th>Overall Score</th>
                                          <th>Treatment Action</th>
                                          <th>Person Responsible</th>
                                          <th>Created By</th>
                                          <th>Date Recorded</th>
                                      </tr>
                                  </tfoot>
                                </table>
                                <?php
                                }
                                else
                                 {
                                  echo "no risks available";
                                }
                                ?>
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                          </div>
                          <!-- end risk report -->
                        <?php
                      }
                      if($_POST['report_type'] == 'closed_risks_opportunities')
                      {
                        ?>
                        <div class="col-xs-12">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Closed Risks</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <?php
                              if($_SESSION['access_level'] == 'admin')
                              {
                                $sql_query = mysqli_query($dbc,"SELECT * FROM risk_management WHERE changed='no' && risk_status='closed' ORDER BY reference_no ASC");
                              }
                              else
                              {
                                $sql_query = mysqli_query($dbc,"SELECT * FROM risk_management WHERE department_code='".$_SESSION['department_code']."' && changed='no'&& risk_status='closed' ORDER BY reference_no ASC");
                              }

                              $number = 1;
                              if($total_rows = mysqli_num_rows($sql_query) > 0)
                              {?>
                              <table class="table table-striped table-bordered table-hover" id="risk-management-risk-reports-closed-risks-table" width="100%">
                                <thead>
                                  <tr>
                                    <td>NO</td>
                                    <td>Department</td>
                                    <td>Strategic Objective</td>
                                    <td>Departmental Objective</td>
                                    <td>Departmental Sub Objective</td>
                                    <td>Ref No</td>
                                    <td>Risk Description</td>
                                    <td>Risk Drivers</td>
                                    <td>Key Risk Indicator</td>
                                    <td>Curent KRI Level</td>
                                    <td>Impact</td>
                                    <td>Likelihood Score</td>
                                    <td>Impact Score</td>
                                    <td>Overall Score</td>
                                    <td>Treatment Action</td>
                                    <td>Person Responsible</td>
                                    <td>Created By</td>
                                    <td>Date Recorded</td>
                                  </tr>
                                </thead>
                                <?php
                                while($row = mysqli_fetch_array($sql_query))
                                {?>
                                <tr style="cursor: pointer;">
                                  <td><?php echo $number++;?></td>
                                  <td><?php echo $row['department'];?></td>
                                  <td><?php echo $row['strategic_objective'];?></td>
                                  <td><?php echo $row['departmental_objective'];?></td>
                                  <td><?php echo $row['departmental_sub_objective'];?></td>
                                  <td>
                                    <form method="post" action="pages/risk-management/risk.php">
                                        <input type="hidden" name="reference_no" value="<?php echo $row['risk_reference']; ?>">
                                        <button type="submit" name="submit" class="btn btn-info"><?php echo $row['risk_reference'];?></button>
                                    </form>
                                  </td>
                                  <td><?php echo $row['risk_description'];?></td>
                                  <td>
                                  <?php
                                  $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                  if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                     {
                                      while($risk_driver_row = mysqli_fetch_array($driver_query))
                                      {
                                        ?>
                                        <ul><li> <?php echo $risk_driver_row['risk_drivers'];?></li></ul>

                                        <?php
                                      }
                                     }

                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                  $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                  if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                     {
                                      while($risk_driver_row = mysqli_fetch_array($driver_query))
                                      {
                                        ?>
                                        <ul><li> <?php echo $risk_driver_row['key_risk_indicator'];?></li></ul>

                                        <?php
                                      }
                                     }

                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                  $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                  if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                     {
                                      while($risk_driver_row = mysqli_fetch_array($driver_query))
                                      {
                                        ?>
                                        <ul><li> <?php echo $risk_driver_row['current_kri_level'];?></li></ul>

                                        <?php
                                      }
                                     }

                                  ?>
                                  </td>
                                  <td><?php echo $row['impact'];?></td>
                                  <td><?php echo $row['likelihood_score'];?></td>
                                  <td><?php echo $row['impact_score'];?></td>

                                  <?php
                                    if($row['overall_score'] >0 && $row['overall_score'] < 3)
                                    {?>
                                    <td class="very_low" style="background-color: #006400;"><?php echo $row['overall_score'];?></td>
                                      <?php
                                    }
                                    if($row['overall_score'] >2 && $row['overall_score'] < 5)
                                    {?>
                                    <td class="low" style="background-color: #00FF00;"><?php echo $row['overall_score'];?></td>
                                      <?php
                                    }
                                    if($row['overall_score'] >4 && $row['overall_score'] < 10)
                                    {?>
                                    <td class="medium" style="background-color: #FFFF00;"><?php echo $row['overall_score'];?></td>
                                      <?php
                                    }
                                    if($row['overall_score'] >9 && $row['overall_score'] < 17)
                                    {?>
                                    <td class="high" style="background-color: #FFC200;"><?php echo $row['overall_score'];?></td>
                                     <?php
                                    }
                                    if($row['overall_score'] >19 && $row['overall_score'] < 26)
                                    {?>
                                      <td class="very_high" style="background-color: #FF0000;"><?php echo $row['overall_score'];?></td>
                                    <?php
                                    }
                                    ?>
                                  <td>
                                   <?php
                                  $sql_risk_drivers = "SELECT *  FROM risk_drivers WHERE risk_reference='".$row['risk_reference']."' && changed='no'";
                                  if($driver_query = mysqli_query($dbc,$sql_risk_drivers))
                                     {
                                      while($risk_driver_row = mysqli_fetch_array($driver_query))
                                      {
                                        ?>
                                        <ul><li> <?php echo $risk_driver_row['treatment_action'];?></li></ul>

                                        <?php
                                      }
                                     }

                                  ?>
                                  </td>
                                  <td><?php echo $row['person_responsible'];?></td>
                                  <td><?php echo $row['created_by'];?></td>
                                  <td><?php echo $row['date_recorded'];?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Ref No</th>
                                        <th>Risk Description</th>
                                        <th>Strategic Objective</th>
                                        <th>Departmental</th>
                                        <th>Departmental Objective</th>
                                        <th>Departmental Sub Obective</th>
                                        <th>Key Risk Indicator</th>
                                        <th>Risk Drivers</th>
                                        <th>Curent KRI Level</th>
                                        <th>Impact</th>
                                        <th>Impact Score</th>
                                        <th>Likelihood Score</th>
                                        <th>Overall Score</th>
                                        <th>Treatment Action</th>
                                        <th>Person Responsible</th>
                                        <th>Created By</th>
                                        <th>Date Recorded</th>
                                    </tr>
                                </tfoot>
                              </table>
                              <?php
                              }
                              else
                               {
                                echo "no closed risks available";
                              }
                              ?>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'all_risks_opportunities')
                      {
                        ?>
                        <div class="col-sm-12">
                        <div class="row">
                          <small class="text-muted">(filter All)</small>
                              <form id="quaterly_updates_select_period_and_quarter_for_all_risks_form">
                                  <div class="col-lg-3 col-xs-12 form-group">
                                      <label for="select_period"><span class="required">*</span> Period</label>
                                          <?php
                                              $result = mysqli_query($dbc, "SELECT * FROM years GROUP BY period");
                                                    echo '
                                                        <select name="select_period" class="form-control" required>
                                                              <option value="">Please select period</option>';
                                                                while($row = mysqli_fetch_array($result)) {
                                                             echo '<option value="'.$row['period'].'">'.$row['period']."</option>";
                                                                             }
                                                    echo '</select>';
                                            ?>
                                  </div>
                                  <div class="col-lg-3 col-xs-12 form-group">
                                        <label for="select_quarter"><span class="required">*</span>Quarter</label>
                                        <select class="form-control" name="select_quarter" required>
                                            <option value="">Please select quarter</option>
                                            <option value="July - September (Quarter 1)">July - September (Quarter 1)</option>
                                            <option value="October - December (Quarter 2)">October - December (Quarter 2)</option>
                                            <option value="January - March (Quarter 3)">January - March (Quarter 3)</option>
                                            <option value="April - June (Quarter 4)">April - June (Quarter 4)</option>
                                        </select>
                                    </div>
                                    <?php
                                        if($_SESSION['access_level'] == 'superuser' || $_SESSION['access_level'] == 'admin')
                                        {
                                          ?>
                                          <div class="col-lg-3 col-xs-12 form-group">
                                              <label for="select_department"><span class="required">*</span> Department</label>
                                                  <?php
                                                      $result = mysqli_query($dbc, "SELECT * FROM departments WHERE department_name!='' ORDER BY department_name ASC");
                                                            echo '
                                                                <select name="select_department" class="form-control" required>
                                                                      <option value="">Please select department</option>';
                                                                        while($row = mysqli_fetch_array($result)) {
                                                                     echo '<option value="'.$row['department_code'].'">'.$row['department_name']."</option>";
                                                                                     }
                                                            echo '</select>';
                                                    ?>
                                          </div>
                                          <?php
                                        }
                                     ?>
                                    <div class="col-lg-3 col-xs-12 form-group">
                                            <label></label><br/>
                                        <button class="btn btn-primary">Fetch</button>
                                    </div>
                              </form>
                        </div>
                        <div id="quarterly-updates-filtered-all-risks">

                        </div>
                      </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'static_risks_opportunities')
                      {
                        ?>
                        <div class="col-sm-12">
                          <div class="row">
                            <small class="text-muted">(filter Static)</small>
                                <form id="quaterly_updates_select_period_and_quarter_for_static_risks_form">
                                    <div class="col-lg-3 col-xs-12 form-group">
                                        <label for="select_period"><span class="required">*</span> Period</label>
                                            <?php
                                                $result = mysqli_query($dbc, "SELECT * FROM years GROUP BY period");
                                                      echo '
                                                          <select name="select_period" class="form-control" required>
                                                                <option value="">Please select period</option>';
                                                                  while($row = mysqli_fetch_array($result)) {
                                                               echo '<option value="'.$row['period'].'">'.$row['period']."</option>";
                                                                               }
                                                      echo '</select>';
                                              ?>
                                    </div>
                                    <div class="col-lg-3 col-xs-12 form-group">
                                          <label for="select_quarter"><span class="required">*</span>Quarter</label>
                                          <select class="form-control" name="select_quarter" required>
                                              <option value="">Please select quarter</option>
                                              <option value="July - September (Quarter 1)">July - September (Quarter 1)</option>
                                              <option value="October - December (Quarter 2)">October - December (Quarter 2)</option>
                                              <option value="January - March (Quarter 3)">January - March (Quarter 3)</option>
                                              <option value="April - June (Quarter 4)">April - June (Quarter 4)</option>
                                          </select>
                                      </div>
                                      <?php
                                          if($_SESSION['access_level'] == 'superuser' || $_SESSION['access_level'] == 'admin')
                                          {
                                            ?>
                                            <div class="col-lg-3 col-xs-12 form-group">
                                                <label for="select_department"><span class="required">*</span> Department</label>
                                                    <?php
                                                        $result = mysqli_query($dbc, "SELECT * FROM departments WHERE department_name!='' ORDER BY department_name ASC");
                                                              echo '
                                                                  <select name="select_department" class="form-control" required>
                                                                        <option value="">Please select department</option>';
                                                                          while($row = mysqli_fetch_array($result)) {
                                                                       echo '<option value="'.$row['department_code'].'">'.$row['department_name']."</option>";
                                                                                       }
                                                              echo '</select>';
                                                      ?>
                                            </div>
                                            <?php
                                          }
                                       ?>
                                      <div class="col-lg-3 col-xs-12 form-group">
                                              <label></label><br/>
                                          <button class="btn btn-primary">Fetch</button>
                                      </div>
                                </form>
                                <div id="quarterly-updates-filtered-static-risks">

                                </div>
                          </div>
                        </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'downgraded_risks_opportunities')
                      {
                        ?>
                        <div class="col-sm-12">
                        <div class="row">
                              <small class="text-muted">(filter Downgraded)</small>
                                  <form id="quaterly_updates_select_period_and_quarter_for_downgraded_risks_form">
                                      <div class="col-lg-3 col-xs-12 form-group">
                                          <label for="select_period"><span class="required">*</span> Period</label>
                                              <?php
                                                  $result = mysqli_query($dbc, "SELECT * FROM years GROUP BY period");
                                                        echo '
                                                            <select name="select_period" class="form-control" required>
                                                                  <option value="">Please select period</option>';
                                                                    while($row = mysqli_fetch_array($result)) {
                                                                 echo '<option value="'.$row['period'].'">'.$row['period']."</option>";
                                                                                 }
                                                        echo '</select>';
                                                ?>
                                      </div>
                                      <div class="col-lg-3 col-xs-12 form-group">
                                            <label for="select_quarter"><span class="required">*</span>Quarter</label>
                                            <select class="form-control" name="select_quarter" required>
                                                <option value="">Please select quarter</option>
                                                <option value="July - September (Quarter 1)">July - September (Quarter 1)</option>
                                                <option value="October - December (Quarter 2)">October - December (Quarter 2)</option>
                                                <option value="January - March (Quarter 3)">January - March (Quarter 3)</option>
                                                <option value="April - June (Quarter 4)">April - June (Quarter 4)</option>
                                            </select>
                                        </div>
                                        <?php
                                            if($_SESSION['access_level'] == 'superuser' || $_SESSION['access_level'] == 'admin')
                                            {
                                              ?>
                                              <div class="col-lg-3 col-xs-12 form-group">
                                                  <label for="select_department"><span class="required">*</span> Department</label>
                                                      <?php
                                                          $result = mysqli_query($dbc, "SELECT * FROM departments WHERE department_name!='' ORDER BY department_name ASC");
                                                                echo '
                                                                    <select name="select_department" class="form-control" required>
                                                                          <option value="">Please select department</option>';
                                                                            while($row = mysqli_fetch_array($result)) {
                                                                         echo '<option value="'.$row['department_code'].'">'.$row['department_name']."</option>";
                                                                                         }
                                                                echo '</select>';
                                                        ?>
                                              </div>
                                              <?php
                                            }
                                         ?>
                                        <div class="col-lg-3 col-xs-12 form-group">
                                                <label></label><br/>
                                            <button class="btn btn-primary">Fetch</button>
                                        </div>
                                  </form>
                            </div>
                            <div id="quarterly-updates-filtered-downgraded-risks">

                            </div>
                          </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'upgraded_risks_opportunities')
                      {
                        ?>
                        <div class="col-sm-12">
                        <div class="row">
                          <small class="text-muted">(filter Upgraded)</small>
                              <form id="quaterly_updates_select_period_and_quarter_for_upgraded_risks_form">
                                  <div class="col-lg-3 col-xs-12 form-group">
                                      <label for="select_period"><span class="required">*</span> Period</label>
                                          <?php
                                              $result = mysqli_query($dbc, "SELECT * FROM years GROUP BY period");
                                                    echo '
                                                        <select name="select_period" class="form-control" required>
                                                              <option value="">Please select period</option>';
                                                                while($row = mysqli_fetch_array($result)) {
                                                             echo '<option value="'.$row['period'].'">'.$row['period']."</option>";
                                                                             }
                                                    echo '</select>';
                                            ?>
                                  </div>
                                  <div class="col-lg-3 col-xs-12 form-group">
                                        <label for="select_quarter"><span class="required">*</span>Quarter</label>
                                        <select class="form-control" name="select_quarter" required>
                                            <option value="">Please select quarter</option>
                                            <option value="July - September (Quarter 1)">July - September (Quarter 1)</option>
                                            <option value="October - December (Quarter 2)">October - December (Quarter 2)</option>
                                            <option value="January - March (Quarter 3)">January - March (Quarter 3)</option>
                                            <option value="April - June (Quarter 4)">April - June (Quarter 4)</option>
                                        </select>
                                    </div>
                                    <?php
                                        if($_SESSION['access_level'] == 'superuser' || $_SESSION['access_level'] == 'admin')
                                        {
                                          ?>
                                          <div class="col-lg-3 col-xs-12 form-group">
                                              <label for="select_department"><span class="required">*</span> Department</label>
                                                  <?php
                                                      $result = mysqli_query($dbc, "SELECT * FROM departments WHERE department_name!='' ORDER BY department_name ASC");
                                                            echo '
                                                                <select name="select_department" class="form-control" required>
                                                                      <option value="">Please select department</option>';
                                                                        while($row = mysqli_fetch_array($result)) {
                                                                     echo '<option value="'.$row['department_code'].'">'.$row['department_name']."</option>";
                                                                                     }
                                                            echo '</select>';
                                                    ?>
                                          </div>
                                          <?php
                                        }
                                     ?>
                                    <div class="col-lg-3 col-xs-12 form-group">
                                            <label></label><br/>
                                        <button class="btn btn-primary">Fetch</button>
                                    </div>
                              </form>

                        </div>
                        <div id="quarterly-updates-filtered-upgraded-risks">

                        </div>
                      </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'risk_heatmap')
                      {
                        ?>
                        <div class="col-sm-12">
                        <div class="row">
                          <small class="text-muted">(filter Risk Heatmap)</small>
                          <form id="select_period_and_quarter_for_heatmap_form">
                              <div class="col-lg-3 col-xs-12 form-group">
                                       <label for="select_period"><span class="required">*</span> Period</label>
                                       <?php
                                         $result = mysqli_query($dbc, "SELECT * FROM years GROUP BY period");
                                           echo '
                                             <select name="select_period" class="form-control" required>
                                                  <option value="">Please select period</option>';
                                                  while($row = mysqli_fetch_array($result)) {
                                                      echo '<option value="'.$row['period'].'">'.$row['period']."</option>";
                                                  }
                                           echo '</select>';
                                       ?>
                               </div>
                               <div class="col-lg-3 col-xs-12 form-group">
                                          <label for="select_quarter"><span class="required">*</span>Quarter</label>
                                          <select class="form-control" name="select_quarter" required>
                                              <option value="">Please select quarter</option>
                                              <option value="July - September (Quarter 1)">July - September (Quarter 1)</option>
                                              <option value="October - December (Quarter 2)">October - December (Quarter 2)</option>
                                              <option value="January - March (Quarter 3)">January - March (Quarter 3)</option>
                                              <option value="April - June (Quarter 4)">April - June (Quarter 4)</option>
                                          </select>
                                  </div>
                                  <?php
                                      if($_SESSION['access_level'] == 'superuser' || $_SESSION['access_level'] == 'admin')
                                      {
                                        ?>
                                        <div class="col-lg-3 col-xs-12 form-group">
                                            <label for="select_department"><span class="required">*</span> Department</label>
                                                <?php
                                                    $result = mysqli_query($dbc, "SELECT * FROM departments WHERE department_name!='' ORDER BY department_name ASC");
                                                          echo '
                                                              <select name="select_department" class="form-control" required>
                                                                    <option value="">Please select department</option>';
                                                                      while($row = mysqli_fetch_array($result)) {
                                                                   echo '<option value="'.$row['department_code'].'">'.$row['department_name']."</option>";
                                                                                   }
                                                          echo '</select>';
                                                  ?>
                                        </div>
                                        <?php
                                      }
                                   ?>
                                  <div class="col-lg-3 col-xs-12 form-group">
                                            <label></label><br/>
                                            <button class="btn btn-primary">Fetch</button>
                                    </div>
                          </form>

                        </div>

                        <div id="filtered-heatmap-risks">


                        </div>
                      </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'opportunity_heatmap')
                      {
                        ?>
                        <div class="col-sm-12">
                        <div class="row">
                          <small class="text-muted">(filter Opportunity Heatmap)</small>
                          <form id="select_period_and_quarter_for_heatmap_opportunity_form">
                              <div class="col-lg-3 col-xs-12 form-group">
                                       <label for="select_period_opportunity"><span class="required">*</span>Period</label>
                                       <?php
                                         $result = mysqli_query($dbc, "SELECT * FROM years GROUP BY period");
                                           echo '
                                             <select name="select_period_opportunity" class="form-control" required>
                                                  <option value="">Please select period</option>';
                                                  while($row = mysqli_fetch_array($result)) {
                                                      echo '<option value="'.$row['period'].'">'.$row['period']."</option>";
                                                  }
                                           echo '</select>';
                                       ?>
                               </div>
                               <div class="col-lg-3 col-xs-12 form-group">
                                          <label for="select_quarter_opportunity"><span class="required">*</span>Quarter</label>
                                          <select class="form-control" name="select_quarter_opportunity" required>
                                              <option value="">Please select quarter</option>
                                              <option value="July - September (Quarter 1)">July - September (Quarter 1)</option>
                                              <option value="October - December (Quarter 2)">October - December (Quarter 2)</option>
                                              <option value="January - March (Quarter 3)">January - March (Quarter 3)</option>
                                              <option value="April - June (Quarter 4)">April - June (Quarter 4)</option>
                                          </select>
                                  </div>
                                  <?php
                                      if($_SESSION['access_level'] == 'superuser' || $_SESSION['access_level'] == 'admin')
                                      {
                                        ?>
                                        <div class="col-lg-3 col-xs-12 form-group">
                                            <label for="select_department"><span class="required">*</span> Department</label>
                                                <?php
                                                    $result = mysqli_query($dbc, "SELECT * FROM departments WHERE department_name!='' ORDER BY department_name ASC");
                                                          echo '
                                                              <select name="select_department" class="form-control" required>
                                                                    <option value="">Please select department</option>';
                                                                      while($row = mysqli_fetch_array($result)) {
                                                                   echo '<option value="'.$row['department_code'].'">'.$row['department_name']."</option>";
                                                                                   }
                                                          echo '</select>';
                                                  ?>
                                        </div>
                                        <?php
                                      }
                                   ?>
                                  <div class="col-lg-3 col-xs-12 form-group">
                                            <label></label><br/>
                                            <button class="btn btn-primary">Fetch</button>
                                    </div>
                          </form>

                        </div>
                        <div id="filtered-heatmap-opportunities">

                        </div>
                      </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'emerging_trends')
                      {
                        ?>
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Emerging Trends</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body table-responsive no-padding">
                                <?php
                                if($_SESSION['access_level'] == 'admin' || $_SESSION['access_level'] == 'superuser')
                                {
                                  $sql_query = mysqli_query($dbc,"SELECT * FROM emerging_trends WHERE changed='no'
                                               ORDER BY id ASC");
                                }
                                else
                                 {
                                   $sql_query = mysqli_query($dbc,"SELECT * FROM emerging_trends WHERE changed='no' && dep_code='".$_SESSION['department_code']."'
                                                ORDER BY id ASC");
                                }

                                $number = 1;
                                if($total_rows = mysqli_num_rows($sql_query) > 0)
                                {?>
                                <table class="table table-striped table-bordered table-hover" id="emerging-trends-table">
                                  <thead>
                                    <tr>
                                      <td>NO</td>
                                      <td>Factor</td>
                                      <td>External/Internal</td>
                                      <td>Related Risk Event</td>
                                      <td>Changes in Risk Profile</td>
                                      <td>Department</td>
                                      <td>Period</td>
                                      <td>Quarter</td>
                                    </tr>
                                  </thead>

                                  <?php
                                  while($row = mysqli_fetch_array($sql_query))
                                  {?>
                                  <tr style="cursor: pointer;">
                                    <td><?php echo $number++;?></td>
                                    <td><?php echo  htmlspecialchars_decode(stripslashes($row['factor']));?></td>
                                    <td><?php echo  htmlspecialchars_decode(stripslashes($row['external_internal']));?></td>
                                    <td><?php echo  htmlspecialchars_decode(stripslashes($row['related_risk_event']));?></td>
                                    <td><?php echo  htmlspecialchars_decode(stripslashes($row['changes_in_risk_profile']));?></td>
                                    <td><?php echo $row['dep_code'];?></td>
                                    <td><?php echo $row['period'];?></td>
                                    <td><?php echo $row['quarter'];?></td>
                                  </tr>
                                  <?php
                                  }
                                  ?>
                                  <tfoot>
                                      <tr>
                                        <th>NO</th>
                                        <th>Factor</th>
                                        <th>External/Internal</th>
                                        <th>Related Risk Event</th>
                                        <th>Changes in Risk Profile</th>
                                        <th>Department</th>
                                        <th>Period</th>
                                        <th>Quarter</th>
                                      </tr>
                                  </tfoot>
                                </table>
                                <?php
                                }
                                ?>
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                          </div>

                        </div>
                        <?php
                      }
                      if($_POST['report_type'] == 'lessons_learnt')
                      {
                        ?>
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Lessons Learnt</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body table-responsive no-padding">
                                <?php
                                if($_SESSION['access_level'] == 'admin' || $_SESSION['access_level'] == 'superuser')
                                {
                                  $sql_query = mysqli_query($dbc,"SELECT * FROM lessons_learnt WHERE changed='no'
                                               ORDER BY id DESC");
                                }
                                else
                                {
                                  $sql_query = mysqli_query($dbc,"SELECT * FROM lessons_learnt WHERE changed='no' && dep_code='".$_SESSION['department_code']."'
                                               ORDER BY id DESC");
                                }

                                $number = 1;
                                if($total_rows = mysqli_num_rows($sql_query) > 0)
                                {?>
                                <table class="table table-striped table-bordered table-hover" id="lessons-learnt-table">
                                  <thead>
                                    <tr>
                                      <td>NO</td>
                                      <td>Strategies That Worked Well</td>
                                      <td>Strategies That Did Not Work</td>
                                      <td>Near Misses</td>
                                      <td>Department</td>
                                      <td>Period</td>
                                      <td>Quarter</td>
                                    </tr>
                                  </thead>

                                  <?php
                                  while($row = mysqli_fetch_array($sql_query))
                                  {?>
                                  <tr style="cursor: pointer;">
                                    <td><?php echo $number++;?></td>
                                    <td><?php echo  htmlspecialchars_decode(stripslashes($row['strategies_that_worked_well']));?></td>
                                    <td><?php echo  htmlspecialchars_decode(stripslashes($row['strategies_that_did_not_work']));?></td>
                                    <td><?php echo  htmlspecialchars_decode(stripslashes($row['near_misses']));?></td>
                                    <td><?php echo $row['dep_code'];?></td>
                                    <td><?php echo $row['period'];?></td>
                                    <td><?php echo $row['quarter'];?></td>
                                  </tr>
                                  <?php
                                  }
                                  ?>
                                  <tfoot>
                                      <tr>
                                        <th>NO</th>
                                        <th>Strategies That Worked Well</th>
                                        <th>Strategies That Did Not Work</th>
                                        <th>Near Misses</th>
                                        <th>Department</th>
                                        <th>Period</th>
                                        <th>Quarter</th>
                                      </tr>
                                  </tfoot>
                                </table>
                                <?php
                                }
                                ?>
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                          </div>

                        </div>
                        <?php
                      }
                      ?>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- start footer -->
  <?php include("pages/layout/footer.php");?>
  <!-- end footer -->

</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
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
<script src="functions/select-change.js"></script>
<script src="functions/search-table.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<!--<script src="functions/custom.js"></script>-->
<script src="functions/lessons-learnt-table.js"></script>
<script src="functions/emerging-trends-table.js"></script>
<script src="functions/filter-reports.js"></script>
<script src="functions/heatmaps-table.js"></script>
<script src="functions/export-hitmap.js"></script>
<script src="dist/js/typed.js"></script>
<script src="functions/days_remaining.js"></script>
<script src="functions/closed-risks-table.js"></script>
<script src="functions/quarterly-updates-risks.js"></script>
<script src="functions/forms.js"></script>
<script>
function printContent(el){
  var risk_heatmap_period = $('#risk_heatmap_period').val();
  var risk_heatmap_quarter = $('#risk_heatmap_quarter').val();
  var risk_heatmap_department = $('#risk_heatmap_department').val();
  var headstr = "<html><head><title>Heatmap Report</title></head><h4>Heatmap Report for " +risk_heatmap_department+  " \n " +risk_heatmap_period+ ", " +risk_heatmap_quarter+ "</h4><body>";
  var footstr = "</body>";
  var newstr = document.all.item(el).innerHTML;
  var oldstr = document.body.innerHTML;
  document.body.innerHTML = headstr+newstr+footstr;
  window.print();
  document.body.innerHTML = oldstr;
  return false;
}
</script>
</body>
</html>
