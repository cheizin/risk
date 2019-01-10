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
.treeview{
  list-style-type: none;
  margin-bottom: 10px;
  font-weight: bold;
  font-size: 14px;
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
    <section class="content-header">
      <h1>
        Reports
      </h1>
      <i class="center-text">Please select the report that you want to generate</i>
      <div id="loader"></div>
      <div id="error_fetching"></div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
              <div class="col-md-12">
                <ul class="menu" data-widget="tree">
                  <li class="treeview">
                    1.<a href="#">
                      <i class="fa fa-file"></i> <span> Risk/Opportunity Register Reports</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="new_risks_opportunities">
                           <button class="btn btn-link">New Risks/Opportunities</button>
                          </form>
                      </li>
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="closed_risks_opportunities">
                           <button class="btn btn-link">Closed Risks/Opportunities</button>
                          </form>
                      </li>
                    </ul>
                  </li>

                <li class="treeview">
                    2.<a href="#">
                      <i class="fa fa-file"></i> <span> Quarterly Updates Reports</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="all_risks_opportunities">
                           <button class="btn btn-link">All Risks/Opportunities</button>
                          </form>
                      </li>
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="static_risks_opportunities">
                           <button class="btn btn-link">Static Risks/Opportunities</button>
                          </form>
                      </li>
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="downgraded_risks_opportunities">
                           <button class="btn btn-link">Downgraded Risks/Opportunities</button>
                          </form>
                      </li>
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="upgraded_risks_opportunities">
                           <button class="btn btn-link">Upgraded Risks/Opportunities</button>
                          </form>
                      </li>
                    </ul>
                  </li>

                  <li class="treeview">
                    3.<a href="#">
                      <i class="fa fa-file"></i> <span> Heatmaps</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="risk_heatmap">
                           <button class="btn btn-link">Risk Hitmap</button>
                          </form>
                      </li>
                      <li>
                          <form method="post" action="view-report.php">
                            <input type="hidden" name="report_type" value="opportunity_heatmap">
                             <button class="btn btn-link">Opportunity Heatmap</button>
                          </form>
                      </li>
                    </ul>
                  </li>
                  <li class="treeview">
                    4.<a href="#">
                      <i class="fa fa-file"></i> <span> Emerging Trends & Lessons Learnt</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                          <form method="post" action="view-report.php">
                           <input type="hidden" name="report_type" value="emerging_trends">
                           <button class="btn btn-link">Emerging Trends</button>
                          </form>
                      </li>
                      <li>
                          <form method="post" action="view-report.php">
                           <input type="hidden" name="report_type" value="lessons_learnt">
                           <button class="btn btn-link">Lessons Learnt</button>
                          </form>
                      </li>
                    </ul>
                  </li>
                </ul>
              <!-- /.col -->
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
