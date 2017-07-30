<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Users</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <script type="text/javascript">
	function deleteUser(name)
	{
		
		var result=confirm("Do you really want to delete the user ?");
		if(result==true)

			{
			location.href="<?php echo base_url();?>Menus/delete_user/"+name;

			}
		else

			{
				return false;
			}
		return ;
	}
    </script>

</head>

<body class="no-skin-config">

    <div id="wrapper">

   
        <div id="page-wrapper" class="gray-bg">
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Users</h2>
                </div>
                <div class="col-lg-2">
				<h2><a class="btn btn-primary " href="<?php echo base_url();?>Menus/add_user" >Add User</a></h2>
                </div>
            </div>
           
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                  
                    <div class="ibox-content">

                    <table class="table table-bordered table-hover dataTables-example" >
                   
                   <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created On</th>
                        <th>Organization</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                   <?php foreach($results as $records){?>
                    <tr >
                        <td><div class="team-members"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/>&nbsp;<?php echo $records->fullname ;?></div></td>
                        <td><?php echo $records->username ;?>
                        </td>
                        <td><?php echo $records->user_role ;?></td>
                        <td class="center"><?php echo $records->created_date ;?></td>
                        <td class="center"><?php echo $records->organization ;?></td>
                        <td> 
                        
                        <a href="<?php echo base_url();?>Menus/view_user_by_username/<?php echo $records->username ;?>">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Edit" aria-label="Left Align">
  							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</button></a>

						<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="deleteUser('<?php echo $records->username ;?>');" aria-label="right Align">
 						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>
						
						</td>
                    </tr>
                  <?php }?>  
                    </tbody>
                    <tfoot>
                   
                    </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                   </div>
        <div class="footer">
            
            
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/js/SCRUM.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?php echo base_url();?>assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'http://agilescrumsolutions.com/example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
</body>
</html>
