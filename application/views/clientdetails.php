<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Client Details</title>

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
                    <h2>Add Client</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                       
                        <div class="ibox-content">
                            <form id="form" method="post" action="<?php echo base_url();?>Clientdetailscontroller" class="wizard-big">
                                <h1>Profile</h1>
                                <fieldset>
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                        <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                            <div class="form-group">
                                                <label>Organization Name</label>
                                                <input id="orgname" name="orgname" type="text" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Contact Person</label>
                                                <input id="contactperson" name="contactperson" type="text" class="form-control">
                                            </div>
                                              <div class="form-group">
                                                <label>Phone No. </label>
                                                <input id="phone" name="phone" type="text" class="form-control phone">
                                            </div>
                                             <div class="form-group1">
                                                <label>Email *</label>
                                                <input id="email" name="email" type="text" class="form-control required email">
                                                <label>Address </label>
                                                <input id="address" name="address" type="text" class="form-control">
                                            
                                            </div>
                                            <div class="form-group">
                                                </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Financials</h1>
                                <fieldset>
                                    <h2>Financial Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Bank name </label>
                                                <input id="bank_name" name="bank_name" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label>SWIFT Code </label>
                                                <input id="bank_swift" name="bank_swift" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Account Holder Name </label>
                                                <input id="bank_ac_name" name="bank_ac_name" type="text" class="form-control  ">
                                            </div>
                                            <div class="form-group">
                                                <label>Account Number </label>
                                                <input id="bank_ac_number" name="bank_ac_number" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>IBAN *</label>
                                                <input id="iban" name="iban" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Social Details</h1>
                                <fieldset>
                                    <div class="row">
                                     <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Skype </label>
                                                <input id="skype" name="skype" type="text" class="form-control  ">
                                            </div>
                                            <div class="form-group">
                                                <label>LinkedIn </label>
                                                <input id="linkedin" name="linkedin" type="text" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input id="facebook" name="facebook" type="text" class="form-control  ">
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter </label>
                                                <input id="twitter" name="twitter" type="text" class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                </fieldset>

                                <h1>Technical Details</h1>
                                <fieldset>
                                 <div class="row">
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>FTP Username </label>
                                                <input id="ftp_username" name="ftp_username" type="text" class="form-control  ">
                                            </div>
                                            <div class="form-group">
                                                <label>FTP Password </label>
                                                <input id="ftp_password" name="ftp_password" type="text" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Hosting url</label>
                                                <input id="hosting_url" name="hosting_url" type="text" class="form-control  ">
                                            </div>
                                            <div class="form-group">
                                                <label>Hosting Username </label>
                                                <input id="hosting_uname" name="hosting_uname" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Hosting Password</label>
                                                <input id="hosting_pwd" name="hosting_pwd" type="text" class="form-control  ">
                                            </div>
                                            <div class="form-group">
                                                 </div>
                                        </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
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
