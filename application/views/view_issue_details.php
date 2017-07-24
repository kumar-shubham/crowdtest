<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | View Issue Details</title>

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
     function test(title,username,issue_id,logged_estimate,sprint_id)
     {
         

         
         $(".modal-body #userid").val( username );
         $(".modal-body #title").val( title );
         $(".modal-body #issue_id").val( issue_id );
         $(".modal-body #logged_estimate").val( logged_estimate );
         $(".modal-body #sprint_id").val( sprint_id );
         
     
     
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
}
     </script>    

</head>

<body class="no-skin-config">

    <div id="wrapper">

   

        <div id="page-wrapper" class="white-bg">
        <div class="row border-bottom ">
       <div class="col-lg-10">
					<h2>View Details</h2>
				</div>
        <nav class="navbar " role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
               
            </div>
            
        </div>
<?php include 'projectmenu.php';?>
       
       
       
  <?php 
  $issue_title="";
 
  foreach($results as $records){?>        
      <div class="">
<a class="btn  btn-warning" href="<?php echo base_url();?>Scrum/set_status/<?php echo $records->issue_id?>/Progress/" >In Progress</a>
<a class="btn btn-primary" href="<?php echo base_url();?>Scrum/set_status/<?php echo $records->issue_id?>/Resolved/" >Resolved</a>
<a class="btn  btn-info" href="<?php echo base_url();?>Scrum/set_status/<?php echo $records->issue_id?>/Reopened/" >Reopened</a>
<a class="btn  btn-success" href="<?php echo base_url();?>Scrum/set_status/<?php echo $records->issue_id?>/Closed/" >Closed</a>
<!-- <a class="btn  btn-warning" href="<?php //echo base_url();?>Menus/SubMenu/<?php //echo $this->session->userdata('project_id')?>/timesheet" >Log Work</a>-->
<a class="btn  btn-warning" onclick="test('<?php echo $records->summary; ?>','<?php echo $this->session->userdata('user_name');?>','<?php echo $records->issue_id ;?>','<?php echo $records->logged_estimate ;?>','<?php echo $records->sprint_id ;?>');" href="#modal-form" data-toggle="modal" >Log Work</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a class="btn btn-primary" href="<?php echo base_url();?>Scrum/edit_issues/<?php echo $records->issue_id?>/" >Edit</a>
<a class="btn btn-danger" href="<?php echo base_url();?>Scrum/delete_issues/<?php echo $records->issue_id?>/" >Delete</a>

</div>
       
                <div class="col-lg-10 animated fadeInRight">
                <div class="ibox float-e-margins">
                  
                    <div class="ibox-content">

                  
                     <div class="form-group">
                       <div class="col-lg-6">
                        
                        <ul class="" style="padding: 0">
                         <li class="list-group-item"> Issue Title <span class="label pull-right"><?php $issue_title=$records->summary; echo($records->summary);?></span> </a></li>
                    	</ul>
                    
                    <ul class="" style="padding: 0">
                         <li class="list-group-item"> Issue Type <span class="label pull-right"><?php if($records->issue_type_id=='1') {echo 'Bug';} elseif($records->issue_type_id=='2') {echo 'Story';} elseif($records->issue_type_id=='3') {echo 'Epic';} else {echo 'Change Request';}?></span> </a></li>
                    	</ul>
                    
                    <ul class="" style="padding: 0">
                         <li class="list-group-item"> Priority <span class="label pull-right"><?php echo($records->priority);?></span> </a></li>
                    	</ul>
                    
                       <ul class="" style="padding: 0;">
                         <li style="padding: 0;height: 77" class="list-group-item"><span style="margin-bottom: 10px"> Description</span> <div class="label pull-right" style="white-space:pre-wrap;display:block;margin:-21 -9 -55 114"><textarea cols="31" rows="4" readonly="readonly" style="border: 0"><?php echo($records->description);?></textarea></div> </a></li>
                    	</ul>  
                    	
                    	 <ul class="" style="padding: 0">
                         <li class="list-group-item"> Attachment <span class="label pull-right"><a href="<?php echo base_url();?>Scrum/download_file/<?php echo($records->filename);?>"><?php echo($records->filename);?></a></span> </a></li>
                    	</ul>
                    
                     <?php if( $records->status=='Progress') {?>
                        <ul class="" style="padding: 0">
                         <li class="list-group-item"> Status <span class="badge badge-warning pull-right">In Progress</span> </a></li>
                    	</ul>
                    <?php }?>
                    
                     <?php if( $records->status=='Resolved') {?>
                        <ul class="" style="padding: 0">
                         <li class="list-group-item"> Status <span class="badge badge-primary pull-right"><?php echo($records->status);?></span> </a></li>
                    	</ul>
                    <?php }?>
                    
                     <?php if( $records->status=='Reopened') {?>
                        <ul class="" style="padding: 0">
                         <li class="list-group-item"> Status <span class="badge badge-info pull-right"><?php echo($records->status);?></span> </a></li>
                    	</ul>
                    <?php }?>
                    
                     <?php if( $records->status=='Closed') {?>
                        <ul class="" style="padding: 0">
                         <li class="list-group-item"> Status <span class="badge badge-success pull-right"><?php echo($records->status);?></span> </a></li>
                    	</ul>
                    <?php }?>
                    
                     <?php if( $records->status=='Not Started') {?>
                        <ul class="" style="padding: 0">
                         <li class="list-group-item"> Status <span class="badge badge-danger pull-right"><?php echo($records->status);?></span> </a></li>
                    	</ul>
                    <?php }?>
                    
                    </div>
                    </div>
                    
                   
                   <div class="form-group">
                       <div class="col-lg-6">
                        
                        <ul class="" style="padding: 0">
                         <li class="list-group-item"> Reported By <span class="label pull-right"><?php echo($records->reported_by);?></span> </a></li>
                    	</ul>
                    
                    <ul class="" style="padding: 0">
                         <li class="list-group-item"> Assigned to <span class="label pull-right"><?php echo($records->assigned_to);?></span> </a></li>
                    	</ul>
                    
                    <ul class="" style="padding: 0">
                         <li class="list-group-item"> Estimate <span class="label pull-right"><?php echo($records->original_estimate);?></span> </a></li>
                    	</ul>
                    
                    <ul class="" style="padding: 0">
                         <li class="list-group-item"> Remaining Estimate <span class="label pull-right"><?php echo(($records->original_estimate)-($records->logged_estimate));?></span> </a></li>
                    	</ul>
                    	
                    	<ul class="" style="padding: 0">
                         <li class="list-group-item"> Sprint Name <span class="label pull-right"><?php echo($records->sprint_id);?></span> </a></li>
                    	</ul>
                    
                    </div>
                    </div>
                  
				<?php } ?>
				
                    </div>
                
                </div>
            </div>
           
            <div class="ibox-content">
Logged hours:-
                    <table class="table table-bordered table-hover " >
                   
                   <thead>
                    <tr>
                        <th>Date</th>
                        <th>Hours</th>
                        <th>Description</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                   
                   
                   <?php foreach($resultsTimesheet as $records){?>
                    <tr >
                        <td><?php echo $records->logged_date ;?></td>
                        <td><?php echo $records->logged_hours ;?></td>
                        <td><?php if($records->description !='') { echo $records->description ;} else {echo $issue_title;}?></td>
                        
                        <!-- <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Details" aria-label="Left Align">
  							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</button>

						<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Delete" aria-label="right Align">
 						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>
						 -->
						
                    </tr>
                  <?php }?>  
                   
                   
                    </tbody>
                    <tfoot>
                   
                    </tfoot>
                    </table>

                    </div>
                    <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row ">
                                                <div class="col"><h3 class="m-t-none m-b border-bottom">Log Time</h3>

                                                   <br/>

                                                    <form role="form" method="POST" class="form-horizontal" action="<?php echo base_url();?>Scrum/save_timesheet">
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
                                                        <input type="hidden"  id="sprint_id" name="sprint_id">
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
    
    <!-- Data picker -->
   <script src="<?php echo base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
   

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
