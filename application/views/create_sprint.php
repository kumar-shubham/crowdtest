<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Create Sprint</title>

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
       
        <nav class="navbar " role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
               
            </div>
             
        </div>
      
       <?php include 'projectmenu.php';?>
       
            <div class="col-lg-8 animated fadeInRight">
            <div class="ibox-content">
    <?php if ($error_count==TRUE)
          {?>
            <div class="alert alert-danger">
Sprint already exists for the time frame

</div>
<?php }?>
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>Scrum/create_sprints">
                <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                 <div class="form-group">
                <label class="col-lg-3 control-label">Sprint Id</label>
                	<div class="col-lg-5">
                	<?php 
	                    foreach($sprintId as $sprint){?>
                    <input type="sprint_id" name="sprint_id" class="form-control" value="<?php echo ($sprint->sprint_id+1) ;?>"  required="required"/>
                    <?php }?>
                    </div>
                </div>
               
                
                 <div class="form-group">
                <label class="col-lg-3 control-label">Sprint Title</label>
                	<div class="col-lg-5">
                    <input type="title" name="title" class="form-control"  required="required"/>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-lg-3 control-label">Select Issues/ Stories to be included in the sprint</label>
                	<div class="col-lg-5">
                    <select name="issues[]" multiple="multiple" >
	                    
	                    <?php 
	                    foreach($issueList as $results){?>
                    
                        
	                    <option value="<?php echo $results->issue_id ;?>"> <?php echo $results->summary ;?> </option>
	                   <?php }?>
	                    
	                    
	                   
                    </select>
                 	</div>
                </div>
                                
                 
                
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Start Date</label>
                	<div class="col-lg-4">
                	 	<input id="stdate" type="stdate" name="stdate" class="form-control"  required="required"/>
                    </div>
                    
                    <div class="col-lg-1">
                	 	<span class="from-calendar-icon"></span>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">End Date</label>
                	<div class="col-lg-4">
                	  <input id="enddate" name="enddate" class="form-control"  required="required">
                    </div>
                    <div class="col-lg-1">
                	  <span class="to-calendar-icon"></span>
                    </div>
                    
                </div>
               
               
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
            datepickr('.from-calendar-icon',{ altInput: document.getElementById('stdate') });
			datepickr('.to-calendar-icon', { altInput: document.getElementById('enddate') });
            datepickr('[title="parseMe"]');

           
    </script>
    
    
</body>
</html>
