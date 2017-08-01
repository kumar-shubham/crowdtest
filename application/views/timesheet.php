<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Timesheet</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    
    
     <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
   <script type="text/javascript">
   // $(document).on("click", ".btn", function () {
     function test(title,username,issue_id,logged_estimate)
     {
         

         
         $(".modal-body #userid").val( username );
         $(".modal-body #title").val( title );
         $(".modal-body #issue_id").val( issue_id );
         $(".modal-body #logged_estimate").val( logged_estimate );
    
   
}
     </script>
</head>

<body class="no-skin-config">


    <div id="wrapper">

   

        <div id="page-wrapper" class="white-bg">
         <div class="row border-bottom ">
       
        <nav class="navbar " role="navigation">
            <div class="navbar-header">
               
				<h2>&nbsp;Timesheet</h2>

               
            </div>
            </nav>
        </div>
       
       
       <?php include 'projectmenu.php';?>
       
       
                <div class="col-lg-8 animated fadeInRight">
                <div class="ibox float-e-margins">
                  
                    <div class="ibox-content">

                    <table class="table table-bordered table-hover dataTables-example" >
                   
                   <thead>
                    <tr>
                        <th>Title</th>
                        
                        <th>Logged Hours</th>
                        <th>Assigned To</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Log Hours</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                   
                   
                   <?php foreach($results as $records){?>
                    <tr >
                        <td><a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>" ><?php echo $records->summary ;?></a></td>
                       
                        <td>
                       <?php echo $records->logged_estimate ;?>
                        <!-- <div class="progress progress-small">
							<div class="progress-bar" style="width: 50%;"> <small class="pull-right">73%</small></div>
						</div>-->
                        
                        <?php //echo $records->reported_by ;?>
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
                        
                       else {
                        	
                        ?>
                        <td class="center"><span class="badge badge-danger">Not Started</span></td>
                        
                        <?php }?>
                        <td>
                        <button class="btn btn-primary " type="button" onclick="test('<?php echo $records->summary; ?>','<?php echo $this->session->userdata('user_name');?>','<?php echo $records->issue_id ;?>','<?php echo $records->logged_estimate ;?>');" href="#modal-form" data-toggle="modal">
						<i class="fa fa-paste"></i>
						<span class="bold">Log Hours</span>
						</button>
                        <!-- <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Details" aria-label="Left Align">
  							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</button>

						<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Delete" aria-label="right Align">
 						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>
						 -->
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
           
        <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row ">
                                                <div class="col"><h3 class="m-t-none m-b border-bottom">Log Time</h3>

                                                   <br/>

                                                    <form role="form" method="POST" class="form-horizontal" action="<?php echo base_url();?>Scrum/save_timesheet">
                                                     <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                                        <div class="form-group">
														<label class="col-lg-3 control-label">User</label>
														<div class="col-lg-9">
														<input type="email" id="userid" name="userid" disabled="disabled" class="form-control">
														</div>
														</div>
														
														<input type="hidden" name="issue_id" id="issue_id"/>
														<input type="hidden" name="logged_estimate" id="logged_estimate"/>
														
                                                        
                                                        <div class="form-group">
															<label class="col-lg-3 control-label">Issue</label>
															<div class="col-lg-9">
															<input type="email" id="title" disabled="disabled" class="form-control">
															</div>
														</div>
														
														<div class="form-group" id="data_1">
															<label class="col-lg-3 control-label">Date</label>
															<div class="col-lg-9">
															<div class="input-group date">
                                   								<input type="text" id="logged_date" name="logged_date" class="form-control" value="">
                                   								 <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                							</div>
															</div>
														</div>
                                                        
                                                        <div class="form-group">
															<label class="col-lg-3 control-label">Worked</label>
															<div class="col-lg-9">
															<input type="text"  class="form-control" id="logged_hours" name="logged_hours">
															</div>
														</div>
														
														
														<div class="form-group">
															<label class="col-lg-3 control-label">Description</label>
															<div class="col-lg-9">
															<textarea id="description" name="description" rows="6" cols="25"></textarea> 
															</div>
														</div>
                                                        
                                                        <div>
                                                            <button class="btn btn-sm btn-primary pull-center m-t-n-xs" type="submit"><strong>Submit</strong></button>
                                                           
                                                        </div>
                                                    </form>
                                                </div>
                                               
                                        </div>
                                    </div>
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

   <!-- Data picker -->
   <script src="<?php echo base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
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

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
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
