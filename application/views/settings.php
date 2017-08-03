<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Settings</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
                </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Settings</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
           
            <div class="row">
                
                
                
               <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">

                    <form class="form-horizontal"  role="form" method="POST"  enctype="multipart/form-data"  action="<?php echo base_url();?>Projects/save_settings">
               
               <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <?php foreach($results as $records){?>
                   
                
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Company Name</label>
                	<div class="col-lg-3">
                   	<input type="fullname" name="name" class="form-control" value="<?php echo $records->company_name;?>"  required="required">
                 	</div>
                </div>
                
                 <div class="form-group">
                <label class="col-lg-3 control-label">Company Address</label>
                	<div class="col-lg-3">
                   <textarea rows="" cols="" name="address" class="form-control"><?php echo $records->company_address;?></textarea>
                   
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Zipcode</label>
                	<div class="col-lg-3">
                    <input type="zipcode" name="zipcode" class="form-control" value="<?php echo $records->zipcode;?>"  required="required">
                 	</div>
                </div>
                                
                
               <!--  <div class="form-group">
                    <label class="col-lg-3 control-label">City</label>
                	<div class="col-lg-3">
                     <input type="organization" name="organization" class="form-control"  required="required">
                   </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-lg-3 control-label">State</label>
                	<div class="col-lg-3">
                    <input type="email" name="email" class="form-control"  >
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Country</label>
                	<div class="col-lg-5">
                   		<select name="role">
		                    <option value="1"> Admin </option>
		                    <option value="3" > Client </option>
		                    <option value="2" > User </option>
	              	 	</select>
                  		
                    </div>
                </div> -->
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Company Email</label>
                	<div class="col-lg-3">
                    <input type="email" name="email" class="form-control" value="<?php echo $records->email;?>" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Company Phone</label>
                	<div class="col-lg-3">
                    <input type="phone" name="phone" class="form-control" value="<?php echo $records->phone;?>" >
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Company Registration</label>
                	<div class="col-lg-3">
                    <input type="registration" name="registration" class="form-control" value="<?php echo $records->registration;?>" >
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Company Vat</label>
                	<div class="col-lg-3">
                    <input type="vat" name="vat" class="form-control" value="<?php echo $records->vat;?>" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Vat/Tax %</label>
                	<div class="col-lg-3">
                    <input type="vatpercent" name="vatpercent" class="form-control" value="<?php echo $records->vat_percent;?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Company Logo</label>
                	<div class="col-lg-3">
                    <input type="file" name="userfile" class="form-control" >
                    <img src="<?php echo(base_url()."./uploads/".$records->logo);?>"/>
                    </div>
                </div>
             <?php }?>   
               <!--  <div class="form-group">
                    <label class="col-lg-3 control-label">Remaining Estimate</label>
                	<div class="col-lg-5">
                    <input type="rtime" name="rtime" class="form-control"  required="required">
                    </div>
                </div> -->
               
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

    <!-- Steps -->
    <script src="<?php echo base_url();?>assets/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>
</html>
