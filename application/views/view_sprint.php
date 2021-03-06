<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Scrum| View Sprint</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    
    
     <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    

</head>

<body class="no-skin-config">

    <div id="wrapper">

   <div id="page-wrapper" class="white-bg">

         <div class="row border-bottom ">
       
        <nav class="navbar " role="navigation">
            <div class="navbar-header">
               
				<h2>&nbsp;Sprints</h2>

               
            </div>
            </nav>
        </div>
       
       <?php include 'projectmenu.php';?>
       
       
       
          
      <div class="">
<a class="btn btn-primary " href="<?php echo base_url();?>Menus/create_sprint" >Create Sprint</a>
</div>
       
                <?php if ($error_count==TRUE)
          {?>
            <div class="alert alert-danger">
Sprint already exists for the time frame

</div>
<?php }?>
                <div class="col-lg-8 animated fadeInRight">
                <div class="ibox float-e-margins">
                  
                    <div class="ibox-content">

                     <table class="table table-bordered table-hover " >
                   
                   <thead>
                    <tr>
                        <th>Sprint Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($sprintList as $records){?>
                    <tr >
                        <td><?php echo $records->sprint_title ;?></td>
                        <td><?php echo $records->start_date ;?>
                        </td>
                        <td><?php echo $records->end_date ;?></td>
                        
                        <td> 
                         <a href="<?php echo base_url();?>Menus/edit_sprint/<?php echo $records->sprint_id ;?>/"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Details" aria-label="Left Align">
  							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</button></a>

						<a href=""><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Delete" aria-label="right Align">
 						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button></a>
						</td>
                    </tr>
                  <?php }?> 
                    </tbody>
                    <tfoot>
                   
                    </tfoot>
                    </table>

					<br>
					<br>

						 <table class="table table-bordered table-hover dataTables-example" >
                   
                   <thead>
                    <tr>
                         <th>Summary</th>
                        <th>Reported By</th>
                        <th>Assigned To</th>
                        <th>Priority</th>
                        <th>Status</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($issueList as $records){?>
                    <tr >
                        <td><?php echo $records->summary ;?></td>
                        <td><?php echo $records->reported_by ;?>
                        </td>
                        <td><?php echo $records->assigned_to ;?></td>
                        <td class="center"><?php echo $records->priority ;?></td>
                       
                        
                         
                        <?php if( $records->status=='Progress') {?>
                        <td class="center"><span class="badge badge-warning">In Progress</span></td>
                         
                        <?php }
                        
                        else if( $records->status=='Resolved') {?>
                        <td class="center"><span class="badge badge-primary">Resolved</span></td>
                         
                        <?php }
                        
                        else if( $records->status=='Reopened') {?>
                        <td class="center"><span class="badge badge-info">Reopened</span></td>
                        
                        <?php }
                        
                        else if( $records->status=='Closed') {?>
                        <td class="center"><span class="badge badge-success">Closed</span></td>
                         
                        <?php } 
                        
                        else  {?>
                        	 <td class="center"><span class="badge badge-danger">Not Started</span></td>
                        
                        <?php } ?>
                        
                                                
                        <td> 
                        
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
           
        
   
    <!-- Mainly scripts -->
    
   <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
     <script src="<?php echo base_url();?>assets/js/SCRUM.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>
    
 <script src="<?php echo base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

   
    <!-- Peity -->
    <script src="<?php echo base_url();?>assets/js/plugins/iCheck/icheck.min.js"></script>
     <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
   
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
