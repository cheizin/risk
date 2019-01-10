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
        the selected quarter (<span class="text-info"><?php echo $select_quarter?></span>) and period (<span class="text-info"><?php echo $select_period?></span>)

      </td>

    </tr>

  </table>

  <?php
}
       ?>
</div>
