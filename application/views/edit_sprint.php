<?php error_reporting();?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Edit Sprint</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
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
</head>

<body class="no-skin-config">

    <div id="wrapper">

   

        <div id="page-wrapper" class="white-bg">
        <div class="row border-bottom ">
        
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit Sprint</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
       
        
       
       <?php
       $sprint_id_var="";
       include 'projectmenu.php';?>
       
       
       
            <div class="col-lg-8 animated fadeInRight">
            <div class="ibox-content">
    <?php if ($error_count==TRUE)
          {?>
            <div class="alert alert-danger">
Sprint already exists for the time frame

</div>
<?php }?>
                   <?php 
	                    foreach($sprintList as $sprint){?>
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>Scrum/save_edit_sprints/<?php echo $sprint->sprint_id;?>">
                <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                 <div class="form-group">
                <label class="col-lg-3 control-label">Sprint Id</label>
                	<div class="col-lg-5">
                	
                    <input type="sprint_id" name="sprint_id" class="form-control" value="<?php echo ($sprint->sprint_id) ;?>" disabled="disabled" required="required"/>
                    
                    </div>
                </div>
               
                
                 <div class="form-group">
                <label class="col-lg-3 control-label">Sprint Title</label>
                	<div class="col-lg-5">
                    <input type="title" name="title" class="form-control" value="<?php echo ($sprint->sprint_title) ;?>"  required="required"/>
                    </div>
                </div>
              
                
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Start Date</label>
                	<div class="col-lg-4">
                	 	<input id="stdate" type="stdate" name="stdate" class="form-control" value="<?php echo ($sprint->start_date) ;?>"  required="required"/>
                    </div>
                    
                    <div class="col-lg-1">
                	 	<span class="from-calendar-icon"></span>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">End Date</label>
                	<div class="col-lg-4">
                	  <input id="enddate" name="enddate" class="form-control" value="<?php echo ($sprint->end_date) ;?>" required="required">
                    </div>
                    <div class="col-lg-1">
                	  <span class="to-calendar-icon"></span>
                    </div>
                    
                </div>
                
               
               <div class="form-group">
                    <label class="col-lg-3 control-label">Select Issues/ Stories to be included in the sprint</label>
                	<div class="col-lg-5">
                    <select name="issues[]" multiple="multiple" >
	                    
	                    <?php 
	                    foreach($issueList as $results){
                    	if($results->sprint_id == $sprint->sprint_id)
                        { ?>
	                    <option selected="selected"  value="<?php echo $results->issue_id ;?>"> <?php echo $results->summary ;?> </option>
	                   <?php 
	                    }
	                    else
	                    { ?>
	                     <option  value="<?php echo $results->issue_id ;?>"> <?php echo $results->summary ;?> </option>
	                    <?php }
	                    }?>
	                    
	                    
	                   
                    </select>
                 	</div>
                </div>
                <?php
                
	                    }?>
                
                
              
                
                <button type="submit" class="btn btn-primary" type="submit" >Submit</button>

               
            </form>

                    </div>
                
        </div>
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

    <!-- Custom and plugin javascript -->
     <script src="<?php echo base_url();?>assets/js/SCRUM.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>
    

   
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
  <script src="<?php echo base_url();?>assets/js/datepickr.min.js"></script>
   <script>
            
            // datepickr on an icon, using altInput to store the value
            // altInput must be a direct reference to an input element (for now)
          //  datepickr('.glyphicon-calendar', { altInput: document.getElementById('calendar-input') });
				datepickr('.from-calendar-icon',{ altInput: document.getElementById('stdate') });
				datepickr('.to-calendar-icon', { altInput: document.getElementById('enddate') });

            

            // If the input contains a value, datepickr will attempt to run Date.parse on it
            datepickr('[title="parseMe"]');

            
        </script>
    
    
</body>
</html>
