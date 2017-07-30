<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Add Project</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/datepickr.min.css">
    <style type="text/css">

.from-calendar-icon {
                display: inline-block;
                vertical-align: middle;
                width: 32px;
                height: 32px;
                background: url(<?php echo base_url();?>assets/img/from_calendar.png);
            }
.to-calendar-icon {
                display: inline-block;
                vertical-align: middle;
                width: 32px;
                height: 32px;
                background: url(<?php echo base_url();?>assets/img/to_calendar.png);
            }            

</style>

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body class="no-skin-config">

    <div id="wrapper">

   
        <div id="page-wrapper" class="gray-bg">
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add a project</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="">

</div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-7">
                <div class="ibox float-e-margins">
                  
                    <div class="ibox-content">

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>Projects">
                <div class="form-group">
                <label class="col-lg-4 control-label">Project Name</label>
                	<div class="col-lg-6">
                    <input type="pname" name="pname" class="form-control"  required="required">
                    </div>
                </div>
               <!--  <div class="form-group">
                    <label class="col-lg-2 control-label">Project Id</label>
                	<div class="col-lg-10">
                    <input type="pid" name="pid" class="form-control"  required="required">
                    </div>
                </div>-->
                
                 <div class="form-group">
                    <label class="col-lg-4 control-label">Client Name</label>
                	<div class="col-lg-6">
                    <select name="clientid">
                    <?php foreach($results as $records){?>
                    
                    <option value="<?php echo $records->client_id ;?>"><?php echo $records->organization_name ;?></option>>
                    <?php }?>
                    
                    </select>
                    
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-lg-4 control-label">Allocated Resources</label>
                	<div class="col-lg-6">
                    <input type="allocated_res" name="allocated_res" class="form-control"  required="required">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">Start Date</label>
                	<div class="col-lg-6">
                    <input id="startdate" type="startdate" name="startdate" class="form-control"  required="required">
                    
                    </div>
                    
                    <div class="col-lg-1">
                	 	<span class="from-calendar-icon"></span>
                    </div>
                    
                </div>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">End Date</label>
                	<div class="col-lg-6">
                    <input id="enddate" type="enddate" name="enddate" class="form-control"  required="required">
                    </div>
                    
                    <div class="col-lg-1">
                	 	<span class="to-calendar-icon"></span>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Fixed Rate</label>
                	<div class="col-lg-6">
                    <input type="frate" name="frate" class="form-control"  required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Hourly Rate</label>
                	<div class="col-lg-6">
                    <input type="hrate" name="hrate" class="form-control"  required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Estimated Hours</label>
                	<div class="col-lg-6">
                    <input type="esthrs" name="esthrs" class="form-control"  required="required">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">Notes</label>
                	<div class="col-lg-6">
                    <textarea type="notes" name="notes" class="form-control"  required="required"></textarea>
                    </div>
                </div>
                <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <button type="submit" class="btn btn-primary" type="submit" >Submit</button>

               
            </form>

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
   
     <script src="<?php echo base_url();?>assets/js/datepickr.min.js"></script>
    <script>
            
            // datepickr on an icon, using altInput to store the value
            // altInput must be a direct reference to an input element (for now)
          //  datepickr('.glyphicon-calendar', { altInput: document.getElementById('calendar-input') });
				datepickr('.from-calendar-icon',{ altInput: document.getElementById('startdate') });
				datepickr('.to-calendar-icon', { altInput: document.getElementById('enddate') });
        

            // If the input contains a value, datepickr will attempt to run Date.parse on it
            datepickr('[title="parseMe"]');

           
        </script>
   

</body>
</html>
