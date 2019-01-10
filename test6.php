<?php

session_start();
require_once('includes/connect.php');


	/* Getting demo_viewer table data */
	$sql = "SELECT COUNT(id) AS risk_id FROM risk_management WHERE changed='no'
          && risk_opportunity='risk' && risk_status='open'
          ORDER BY id";
	$viewer = mysqli_query($dbc,$sql);
	$viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
	$viewer = json_encode(array_column($viewer, 'risk_id'),JSON_NUMERIC_CHECK);
  //$viewer = mysqli_num_rows($viewer);


	/* Getting demo_click table data */
	$sql = "SELECT COUNT(id) AS risk_id FROM risk_management WHERE changed='no'
          && risk_opportunity='opportunity' && risk_status='open'
          ORDER BY id";
	$click = mysqli_query($dbc,$sql);
	$click = mysqli_fetch_all($click,MYSQLI_ASSOC);
	$click = json_encode(array_column($click, 'risk_id'),JSON_NUMERIC_CHECK);

  /*fetch corporate risks and corporate opportunities */

  $sql = "SELECT COUNT(id) AS risk_id FROM update_risk_status WHERE changed='no' && current_overall_score>='20'
          && risk_opportunity='risk'
          ORDER BY id";
  $sql_query_risk = mysqli_query($dbc,$sql);
  $sql_query_fetch_risk = mysqli_fetch_all($sql_query_risk,MYSQLI_ASSOC);
  $corporate_risk = json_encode(array_column($sql_query_fetch_risk, 'risk_id'),JSON_NUMERIC_CHECK);

  $sql = "SELECT COUNT(id) AS risk_id FROM update_risk_status WHERE changed='no' && current_overall_score>='20'
          && risk_opportunity='opportunity'
          ORDER BY id";
  $sql_query_opportunity = mysqli_query($dbc,$sql);
  $sql_query_fetch_opportunity = mysqli_fetch_all($sql_query_opportunity,MYSQLI_ASSOC);
  $corporate_opportunity = json_encode(array_column($sql_query_fetch_opportunity, 'risk_id'),JSON_NUMERIC_CHECK);


    /*fetch corporate risks and corporate opportunities */


?>


<!DOCTYPE html>
<html>
<head>
	<title>HighChart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>


	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>


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
            text: 'Yearly Website Ratio'
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


<div class="container">
	<br/>
	<h2 class="text-center">Highcharts php mysql json example</h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
