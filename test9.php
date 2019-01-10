
<html>
<head>
  <title>LDAP USERS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script>
$(document).ready( function () {
  $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        initComplete: function () {
    this.api().columns().every( function () {
        var column = this;
        var select = $('<select><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column
                    .search( val ? '^'+val+'$' : '', true, false )
                    .draw();
            } );

        column.data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );
    } );
}
      } );
} );

</script>
</head>

<body>
<div class="wrapper">
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Risk List</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Department</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Department</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              	// Get vars from post
                $ldapdomain	= "Cma.local";
                $ldapip		= "ldap://10.0.70.1";
                $ldapport	= 389;
                $name = 'MAbdalla';
              	$username = 'CMAKE' . '\\' . $name;
              	$password = 'Diramo5979';
              	// Open the connection
              	$ad = ldap_connect($ldapdomain,$ldapport) or die("Couldn't connect to AD!"); // ldap://servername
              	ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION,3);
              	ldap_set_option($ad, LDAP_OPT_REFERRALS,0);
              	$bd = ldap_bind($ad,$username,$password) or die("Couldn't bind to AD!");
              	// Do stuff
              	// Create the DN
              	$dn = "DC=Cma,DC=local"; // CN=foo,OU=bar etc...

              // Create the filter from the search parameters
              $filter = "(&(&(&(objectCategory=person)(objectClass=user))))"; //Select all users

              $search = @ldap_search($ad, $dn, $filter) or die ("ldap search failed");

              $entries = ldap_get_entries($ad, $search);

              if ($entries["count"] > 0)
              	{
              		for ($i=0; $i<$entries["count"]; $i++)
              			{

               ?>
              <tr>
                <td>
                  <?php
                   if(isset($entries[$i]["displayname"][0]))
                      {
                        echo $entries[$i]["displayname"][0];
                      }
                       else
                       {
                         echo "Name not set";
                       }
                    ?>
                </td>
                <td>
                  <?php
                   if(isset($entries[$i]["samaccountname"][0]))
                      {
                        echo $entries[$i]["samaccountname"][0];
                      }
                       else
                       {
                         echo "Username not set";
                       }
                    ?>
                </td>
                <td>
                  <?php
                   if(isset($entries[$i]["mail"][0]))
                      {
                        echo $entries[$i]["mail"][0];
                      }
                       else
                       {
                         echo "Mail not set";
                       }
                    ?>
                </td>
                <td>
                  <?php
                   if(isset($entries[$i]["department"][0]))
                      {
                        echo $entries[$i]["department"][0];
                      }
                       else
                       {
                         echo "Department not set";
                       }
                    ?>
                </td>
              </tr>
              <?php
            }
          }
          else
          	{
          		echo "<p>No results found!</p>";
          	}
            	ldap_unbind($ad);
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

      </div>

    </div>


</body>
</html>
