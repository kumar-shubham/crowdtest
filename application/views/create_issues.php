<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Create Issues</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

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

                    <form class="form-horizontal"  role="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>Scrum">
                
                <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Issue Type</label>
                	<div class="col-lg-5">
                    <select name="issue_type_id">
                    <?php 
                    
                  
                    	if($navs=='1')
                    	{
                    	           	
                    ?>
	                    <option value="1" selected="selected">Bug</option>
	                    <option value="2">Story</option>
	                    <option value="3">Epic</option>
	                    <option value="4">Change Request</option>
	                    <?php }
	                    else if ($navs=='2')
	                    {
	                    ?>
	                    <option value="1" >Bug</option>
	                    <option value="2" selected="selected">Story</option>
	                    <option value="3">Epic</option>
	                    <option value="4">Change Request</option>
	                    <?php }
	                    ?>
                    </select>
                 	</div>
                </div>
                
                 <div class="form-group">
                <label class="col-lg-3 control-label">Title</label>
                	<div class="col-lg-5">
                    <input type="title" name="title" class="form-control"  required="required" maxlength="27"></textarea>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-lg-3 control-label">Description</label>
                	<div class="col-lg-5">
                    <textarea type="description" name="description" class="form-control"  required="required" maxlength="490"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Priority</label>
                	<div class="col-lg-5">
                    <select name="priority">
	                    <option value="Major"> Major </option>
	                    <option value="Minor" selected="selected"> Minor </option>
	                    <option value="Trivial" > Trivial </option>
	                    <option value="Critical"> Critical  </option>
                    </select>
                 	</div>
                </div>
                                
                 
                
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Reported By</label>
                	<div class="col-lg-5">
                    <select name="reported_by">
	                     <?php foreach($results as $records){?>
                    
                        
	                    <option value="<?php echo $records->username ;?>"> <?php echo $records->username ;?> </option>
	                   <?php }?>
                    </select>
                   </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Assigned To</label>
                	<div class="col-lg-5">
                    <select name="assigned_to">
	                     <?php foreach($results as $records){?>
                    
                        
	                    <option value="<?php echo $records->username ;?>"> <?php echo $records->username ;?> </option>
	                   <?php }?>
                    </select>
                   </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Time Estimate</label>
                	<div class="col-lg-5">
                    <input type="time" name="time" class="form-control"  required="required">
                    </div>
                </div>
               <!--  <div class="form-group">
                    <label class="col-lg-3 control-label">Remaining Estimate</label>
                	<div class="col-lg-5">
                    <input type="rtime" name="rtime" class="form-control"  required="required">
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-lg-3 control-label">Attachments</label>
                	<div class="col-lg-5">
                    <input type="file" name="userfile" class="form-control"  >
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
   
    
    
</body>
</html>
