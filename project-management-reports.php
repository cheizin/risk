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
  <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

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
        <li class="active"><a href="project-management-reports.php"><i class="fa fa-dashboard"></i> <span>Reports</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Programmes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/programmes/add-programmes.php"><i class="fa fa-circle-o"></i> Add Programmes</a></li>
            <li><a href="pages/programmes/view-programmes.php"><i class="fa fa-circle-o"></i> View Programmes</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/projects/add-projects.php"><i class="fa fa-circle-o"></i>Add Projects</a></li>
            <li><a href="pages/projects/view-projects.php"><i class="fa fa-circle-o"></i> View Projects</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#" class="children">
            <i class="fa fa-laptop"></i>
            <span>Activities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/activities/add-activities.php" class="children"><i class="fa fa-circle-o"></i>Add Activities</a></li>
            <li><a href="pages/activities/view-activities.php" class="children"><i class="fa fa-circle-o"></i> View Activities</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#" class="children">
            <i class="fa fa-edit"></i> <span>Risks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/risks/add-risks.php" class="children"><i class="fa fa-circle-o"></i> Add Risks</a></li>
            <li><a href="pages/risks/view-risks.php" class="children"><i class="fa fa-circle-o"></i> View Risks</a></li>
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
    <section class="content-header">
      <h1>
        Reports
      </h1>
      <i class="center-text">Generate customized reports</i>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
              <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#programme_reports_tab" data-toggle="tab">Programme Reports</a></li>
                    <li><a href="#project_reports_tab" data-toggle="tab">Project Reports</a></li>
                    <li><a href="#activity_reports_tab" data-toggle="tab">Activity Reports</a></li>
                    <li><a href="#project_risk_reports_tab" data-toggle="tab">Project Risk Reports</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="programme_reports_tab">
                                             <!-- start row programme information -->
                                              <div class="row">
                                                <div class="col-xs-12">
                                                  <div class="box">
                                                    <div class="box-header">
                                                      <h3 class="box-title">Programme List</h3>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body table-responsive no-padding">
                                                      <?php
                                                      $sql_query = mysqli_query($dbc,"SELECT * FROM programmes WHERE changed='no' ORDER BY reference_no ASC");
                                                      $number = 1;
                                                      if($total_rows = mysqli_num_rows($sql_query) > 0)
                                                      {?>
                                                      <table class="table table-striped table-bordered table-hover" id="programme-reports-table" width="100%">
                                                        <thead>
                                                          <tr>
                                                            <td>NO</td>
                                                            <td>Ref No</td>
                                                            <td>Name</td>
                                                            <td>Description</td>
                                                            <td>Programme Start Date</td>
                                                            <td>Required End Date</td>
                                                            <td>Remaining Days</td>
                                                            <td>Linked Projects</td>
                                                            <td>Programme Status</td>
                                                            <td>Stakeholder</td>
                                                            <td>Last Update</td>
                                                          </tr>
                                                        </thead>
                                                        <?php
                                                        while($row = mysqli_fetch_array($sql_query))
                                                        {?>
                                                        <tr style="cursor: pointer;">
                                                          <td><?php echo $number++;?></td>
                                                          <td>
                                                            <form method="post" action="pages/programmes/programme.php">
                                                                <input type="hidden" name="reference_no" value="<?php echo $row['reference_no']; ?>">
                                                                <button type="submit" name="submit" class="btn btn-info"><?php echo $row['reference_no'];?></button>
                                                            </form>
                                                          </td>
                                                          <td><?php echo $row['programme_name'];?></td>
                                                          <td><?php echo $row['programme_description'];?></td>
                                                          <td><?php echo $row['programme_start_date'];?></td>
                                                          <td><?php echo $row['programme_end_date'];?></td>
                                                          <?php
                                                            $today = date("m/d/Y");
                                                            $date1=date_create($row['programme_end_date']);
                                                            $date2=date_create($today);
                                                            $diff=date_diff($date2,$date1);
                                                            //calculate remaining days - find todays date against programme end date
                                                            if($row['programme_status'] != 'Completed' && $diff->format("%R%a") <0 )
                                                            {
                                                              ?>
                                                              <td class="alert alert-danger">
                                                                <?php echo $diff->format("%R%a"); ?>
                                                              </td>
                                                              <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                              <td>
                                                                <?php echo $diff->format("%R%a");?>
                                                              </td>
                                                              <?php
                                                            }
                                                          ?>

                                                          <td>
                                                            <?php
                                                            $sql_projects_query =mysqli_query($dbc,"SELECT * FROM projects WHERE programme_reference_no='".$row['reference_no']."' && changed='no'");
                                                            while($projects_row = mysqli_fetch_array($sql_projects_query))
                                                            {
                                                              echo "<ul><li>" .$projects_row['project_name']. "</li></ul>";
                                                            }


                                                            ?>
                                                          </td>
                                                          <td><?php echo $row['programme_status'];?></td>
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
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Programme Start Date</th>
                                                                <th>Required End Date</th>
                                                                <th>Remaining Days</th>
                                                                <th>Linked Projects</th>
                                                                <th>Programme Status</th>
                                                                <th>Stakeholder</th>
                                                                <th>Last Update</th>
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
                                              <!-- /.end row programme information -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="project_reports_tab">
                                            <!-- start row programme information -->
                                              <div class="row">
                                                <div class="col-xs-12">
                                                  <div class="box">
                                                    <div class="box-header">
                                                      <h3 class="box-title">Project List</h3>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body table-responsive no-padding">
                                                      <?php
                                                      $sql_query = mysqli_query($dbc,"SELECT * FROM projects WHERE changed='no' ORDER BY reference_no ASC");
                                                      $number = 1;
                                                      if($total_rows = mysqli_num_rows($sql_query) > 0)
                                                      {?>
                                                      <table class="table table-striped table-bordered table-hover" id="project-reports-table" width="100%">
                                                        <thead>
                                                          <tr>
                                                            <td>NO</td>
                                                            <td>Ref No</td>
                                                            <td>Project Name</td>
                                                            <td>Linked Programme</td>
                                                            <td>Project Start Date</td>
                                                            <td>Project End Date</td>
                                                            <td>Remaining Days</td>
                                                            <td>Project Status</td>
                                                            <td>Internal Budget Line</td>
                                                            <td>External Budget Line</td>
                                                            <td>Funding  Agency</td>
                                                            <td>Linked Activities</td>
                                                            <td>Project Risks</td>
                                                            <td>Project Phase</td>
                                                            <td>Project Owner</td>
                                                            <td>Senior User</td>
                                                            <td>Senior Contractor</td>
                                                            <td>Project Advisor</td>
                                                            <td>Created By</td>
                                                            <td>Date Created</td>
                                                          </tr>
                                                        </thead>
                                                        <?php
                                                        while($row = mysqli_fetch_array($sql_query))
                                                        {?>
                                                        <tr style="cursor: pointer;">
                                                          <td><?php echo $number++;?></td>
                                                          <td>
                                                            <form method="post" action="pages/projects/project.php">
                                                                <input type="hidden" name="reference_no" value="<?php echo $row['reference_no']; ?>">
                                                                <button type="submit" name="submit" class="btn btn-info"><?php echo $row['reference_no'];?></button>
                                                            </form>
                                                          </td>
                                                          <td><?php echo $row['project_name'];?></td>
                                                         <td>
                                                            <?php
                                                            $sql_projects_query =mysqli_query($dbc,"SELECT * FROM programmes WHERE reference_no='".$row['programme_reference_no']."' && changed='no'");
                                                            $projects_row = mysqli_fetch_array($sql_projects_query);

                                                              echo $projects_row['programme_name'];



                                                            ?>
                                                          </td>
                                                          <td><?php echo $row['project_start_date'];?></td>
                                                          <td><?php echo $row['project_end_date'];?></td>
                                                          <?php
                                                            $today = date("m/d/Y");
                                                            $date1=date_create($row['project_end_date']);
                                                            $date2=date_create($today);
                                                            $diff=date_diff($date2,$date1);
                                                            ?>
                                                              <td>
                                                                <?php echo $diff->format("%R%a");?>
                                                              </td>

                                                          <td><?php echo $row['project_status'];?></td>
                                                          <td><?php echo $row['internal_budget_line'];?></td>
                                                          <td><?php echo $row['external_budget_line'];?></td>
                                                          <td><?php echo $row['funding_agency'];?></td>
                                                          <td>
                                                            <?php
                                                            $sql_projects_query =mysqli_query($dbc,"SELECT * FROM activities WHERE linked_project='".$row['reference_no']."' && changed='no'");
                                                            while($projects_row = mysqli_fetch_array($sql_projects_query))
                                                            {
                                                              echo "<ul><li>" .$projects_row['activity_name']. "</li></ul>";
                                                            }


                                                            ?>
                                                          </td>
                                                          <td>
                                                            <?php
                                                            $sql_projects_query =mysqli_query($dbc,"SELECT * FROM risks WHERE linked_project='".$row['reference_no']."' && changed='no'");
                                                            while($projects_row = mysqli_fetch_array($sql_projects_query))
                                                            {
                                                              echo "<ul><li>" .$projects_row['objective']. "</li></ul>";
                                                            }


                                                            ?>
                                                          </td>
                                                          <td><?php echo $row['project_phase'];?></td>
                                                          <td><?php echo $row['project_owner'];?></td>
                                                          <td><?php echo $row['senior_user'];?></td>
                                                          <td><?php echo $row['senior_contractor'];?></td>
                                                          <td><?php echo $row['project_advisor'];?></td>
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
                                                                <th>Project Name</th>
                                                                <th>Programme Reference No</th>
                                                                <th>Project Start Date</th>
                                                                <th>Project End Date</th>
                                                                <th>Remaining Days</th>
                                                                <th>Project Status</th>
                                                                <th>Internal Budget Line</th>
                                                                <th>External Budget Line</th>
                                                                <th>Funding  Agency</th>
                                                                <th>Project Phase</th>
                                                                <th>Project Owner</th>
                                                                <th>Senior User</th>
                                                                <th>Senior Contractor</th>
                                                                <th>Project Advisor</th>
                                                                <th>Created By</th>
                                                                <th>Date Recorded</th>
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
                                              <!-- /.end row programme information -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="activity_reports_tab">
                                             <!-- start row programme information -->
                                              <div class="row">
                                                <div class="col-xs-12">
                                                  <div class="box">
                                                    <div class="box-header">
                                                      <h3 class="box-title">Activity List</h3>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body table-responsive no-padding">
                                                      <?php
                                                      $sql_query = mysqli_query($dbc,"SELECT * FROM activities WHERE changed='no' ORDER BY reference_no ASC");
                                                      $number = 1;
                                                      if($total_rows = mysqli_num_rows($sql_query) > 0)
                                                      {?>
                                                      <table class="table table-striped table-bordered table-hover" id="activity-reports-table" width="100%">
                                                        <thead>
                                                          <tr>
                                                            <td>NO</td>
                                                            <td>Ref No</td>
                                                            <td>Activity Name</td>
                                                            <td>Linked Project</td>
                                                            <td>Activity Start Date</td>
                                                            <td>Activity End Date</td>
                                                            <td>Remaining Days</td>
                                                            <td>Activity Stakeholder</td>
                                                            <td>Initiatives</td>
                                                            <td>Status</td>
                                                            <td>Created by</td>
                                                            <td>Date Recorded</td>
                                                          </tr>
                                                        </thead>
                                                        <?php
                                                        while($row = mysqli_fetch_array($sql_query))
                                                        {?>
                                                        <tr style="cursor: pointer;">
                                                          <td><?php echo $number++;?></td>
                                                          <td>
                                                            <form method="post" action="pages/activities/activity.php">
                                                                <input type="hidden" name="reference_no" value="<?php echo $row['reference_no']; ?>">
                                                                <button type="submit" name="submit" class="btn btn-info"><?php echo $row['reference_no'];?></button>
                                                            </form>
                                                          </td>
                                                          <td><?php echo $row['activity_name'];?></td>
                                                         <td>
                                                            <?php
                                                            $sql_projects_query =mysqli_query($dbc,"SELECT * FROM projects WHERE reference_no='".$row['linked_project']."' && changed='no'");
                                                            $projects_row = mysqli_fetch_array($sql_projects_query);

                                                              echo $projects_row['project_name'];



                                                            ?>
                                                          </td>
                                                          <td><?php echo $row['activity_start_date'];?></td>
                                                          <td><?php echo $row['activity_end_date'];?></td>
                                                          <?php
                                                            $today = date("m/d/Y");
                                                            $date1=date_create($row['activity_end_date']);
                                                            $date2=date_create($today);
                                                            $diff=date_diff($date2,$date1);
                                                            ?>
                                                              <td>
                                                                <?php echo $diff->format("%R%a");?>
                                                              </td>

                                                          <td><?php echo $row['activity_stakeholder'];?></td>
                                                          <td><?php echo $row['initiatives'];?></td>
                                                          <td><?php echo $row['status'];?></td>
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
                                                                <th>Activity Name</th>
                                                                <th>Linked Project</th>
                                                                <th>Activity Start Date</th>
                                                                <th>Activity End Date</th>
                                                                <th>Remaining Days</th>
                                                                <th>Activity Stakeholder</th>
                                                                <th>Initiatives</td>
                                                                <th>Status</th>
                                                                <th>Created by</th>
                                                                <th>Date Recorded</th>
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
                                              <!-- /.end row programme information -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="project_risk_reports_tab">
                                            <!-- start row programme information -->
                                              <div class="row">
                                                <div class="col-xs-12">
                                                  <div class="box">
                                                    <div class="box-header">
                                                      <h3 class="box-title">Project Risk List</h3>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body table-responsive no-padding">
                                                      <?php
                                                      $sql_query = mysqli_query($dbc,"SELECT * FROM risks WHERE changed='no' ORDER BY reference_no ASC");
                                                      $number = 1;
                                                      if($total_rows = mysqli_num_rows($sql_query) > 0)
                                                      {?>
                                                      <table class="table table-striped table-bordered table-hover" id="project-risk-reports-table" width="100%">
                                                        <thead>
                                                          <tr>
                                                            <td>NO</td>
                                                            <td>Ref No</td>
                                                            <td>Risk Description</td>
                                                            <td>Linked Project</td>
                                                            <td>Objective</td>
                                                            <td>Key Risk Indicator</td>
                                                            <td>Risk Drivers</td>
                                                            <td>Curent KRI Level</td>
                                                            <td>Impact</td>
                                                            <td>Impact Score</td>
                                                            <td>Likelihood Score</td>
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
                                                          <td>
                                                            <form method="post" action="pages/risks/risk.php">
                                                                <input type="hidden" name="reference_no" value="<?php echo $row['reference_no']; ?>">
                                                                <button type="submit" name="submit" class="btn btn-info"><?php echo $row['reference_no'];?></button>
                                                            </form>
                                                          </td>
                                                          <td><?php echo $row['risk_description'];?></td>
                                                         <td>
                                                            <?php
                                                            $sql_projects_query =mysqli_query($dbc,"SELECT * FROM projects WHERE reference_no='".$row['linked_project']."' && changed='no'");
                                                            $projects_row = mysqli_fetch_array($sql_projects_query);

                                                              echo $projects_row['project_name'];

                                                            ?>
                                                          </td>
                                                          <td><?php echo $row['objective'];?></td>
                                                          <td><?php echo $row['key_risk_indicator'];?></td>
                                                          <td><?php echo $row['risk_drivers'];?></td>
                                                          <td><?php echo $row['current_kri_level'];?></td>
                                                          <td><?php echo $row['impact'];?></td>
                                                          <td><?php echo $row['impact_score'];?></td>
                                                          <td><?php echo $row['likelihood_score'];?></td>
                                                          <td><?php echo $row['overall_score'];?></td>
                                                          <td><?php echo $row['treatment_action'];?></td>
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
                                                                <th>Linked Project</th>
                                                                <th>Objective</th>
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
                                                      ?>
                                                    </div>
                                                    <!-- /.box-body -->
                                                  </div>
                                                  <!-- /.box -->
                                                </div>

                                              </div>
                                              <!-- /.end row programme information -->
                                        </div>
                                        <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
              </div>
              <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b>
    </div>
    <strong>Copyright &copy; </strong>
  </footer>

</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
<script src="functions/custom.js"></script>
</body>
</html>
