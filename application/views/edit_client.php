<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM|Edit Client</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

<script type="text/javascript">
function CancelFunction()
{
	window.location="<?php echo base_url();?>Menus/Clients";
}

</script>
</head>

<body class="no-skin-config">

    <div id="wrapper">

    
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
                </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit Client</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
           
            <div class="row">
                
                
                
               <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">

              <?php foreach($results as $client){?>      
                    <form class="form-horizontal"  role="form" method="POST"  action="<?php echo base_url();?>Clientdetailscontroller/edit_client/<?php echo $client->client_id; ?>">
                
                <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                Profile details
                <div class="form-group">
                    <label class="col-lg-3 control-label">Contact Person</label>
                	<div class="col-lg-3">
                   	<input type="contact_person" name="contact_person" class="form-control" value="<?php echo $client->contact_person ; ?>" >
                 	</div>
                </div>
                
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Organization Name</label>
                	<div class="col-lg-3">
                   	<input type="organization_name" name="organization_name" class="form-control" value="<?php echo $client->organization_name ; ?>"  >
                 	</div>
                </div>
                
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Phone No.</label>
                	<div class="col-lg-3">
                   	<input type="text" name="phone_no" class="form-control" value="<?php echo $client->phone_no ; ?>" >
                 	</div>
                </div>
                
                
                 <div class="form-group" >
                    <label class="col-lg-3 control-label">Email</label>
                	<div class="col-lg-3">
                   	<input type="email" name="email" class="form-control" value="<?php echo $client->email ; ?>"  required="required">
                 	</div>
                </div>
                 <div class="form-group" >
                    <label class="col-lg-3 control-label">Address</label>
                	<div class="col-lg-3">
                   	<input type="address" name="address" class="form-control" value="<?php echo $client->address ; ?>" >
                 	</div>
                </div>
                
        Financial Details
        
        	       <div class="form-group" >
                    <label class="col-lg-3 control-label">Bank Name</label>
                	<div class="col-lg-3">
                   	<input type="bank_name" name="bank_name" class="form-control" value="<?php echo $client->bank_name ; ?>" >
                 	</div>
                </div> 
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Swift Code</label>
                	<div class="col-lg-3">
                   	<input type="swift_code" name="swift_code" class="form-control" value="<?php echo $client->swift_code ; ?>"  >
                 	</div>
                </div> 
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">IBan</label>
                	<div class="col-lg-3">
                   	<input type="iban" name="iban" class="form-control" value="<?php echo $client->iban ; ?>" >
                 	</div>
                </div> 
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Account Holder Name</label>
                	<div class="col-lg-3">
                   	<input type="account_holder_name" name="account_holder_name" class="form-control" value="<?php echo $client->account_holder_name ; ?>"  >
                 	</div>
                </div> 
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Account Number</label>
                	<div class="col-lg-3">
                   	<input type="account_no" name="account_no" class="form-control" value="<?php echo $client->account_no ; ?>"  >
                 	</div>
                </div> 
                
                Social Details
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Skype Id</label>
                	<div class="col-lg-3">
                   	<input type="skype" name="skype" class="form-control" value="<?php echo $client->skype ; ?>" >
                 	</div>
                </div> 
                <div class="form-group" >
                    <label class="col-lg-3 control-label">LinkedIn</label>
                	<div class="col-lg-3">
                   	<input type="linkedin" name="linkedin" class="form-control" value="<?php echo $client->linkedin ; ?>"  >
                 	</div>
                </div> 
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Facebook</label>
                	<div class="col-lg-3">
                   	<input type="facebook" name="facebook" class="form-control" value="<?php echo $client->facebook ; ?>" >
                 	</div>
                </div>
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Twitter</label>
                	<div class="col-lg-3">
                   	<input type="twitter" name="twitter" class="form-control" value="<?php echo $client->twitter ; ?>">
                 	</div>
                </div>  
              
              Technical Details
              
              <div class="form-group" >
                    <label class="col-lg-3 control-label">Hosting Url</label>
                	<div class="col-lg-3">
                   	<input type="hosting_url" name="hosting_url" class="form-control" value="<?php echo $client->hosting_url ; ?>">
                 	</div>
                </div> 
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">FTP UserName</label>
                	<div class="col-lg-3">
                   	<input type="ftp_username" name="ftp_username" class="form-control" value="<?php echo $client->ftp_username ; ?>" >
                 	</div>
                </div> 
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">FTP Password</label>
                	<div class="col-lg-3">
                   	<input type="ftp_password" name="ftp_password" class="form-control" value="<?php echo $client->ftp_password ; ?>" >
                 	</div>
                </div>
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Hosting Username</label>
                	<div class="col-lg-3">
                   	<input type="hosting_username" name="hosting_username" class="form-control" value="<?php echo $client->hosting_username ; ?>" >
                 	</div>
                </div>  
                
                <div class="form-group" >
                    <label class="col-lg-3 control-label">Hosting Password</label>
                	<div class="col-lg-3">
                   	<input type="hosting_password" name="hosting_password" class="form-control" value="<?php echo $client->hosting_password ; ?>">
                 	</div>
                </div> 
               <div class="form-group" >
               <div class="col-lg-4" align="right">
                <button type="submit" class="btn btn-info "  type="submit" onclick="CancelFunction()" >Cancel</button>
                </div>
                <div class="col-lg-2" align="left">
                <button type="submit" class="btn btn-primary "  type="submit" >Submit</button>
                </div>
				</div>
               
            </form>
<?php }?>
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
