<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Ceeate Invoice</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
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

<body>

    <div id="wrapper">

    
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
                </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Create Invoice</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
           
            <div class="row">
                
                
                
               <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">

                    <form class="form-horizontal"  role="form" method="POST"  action="<?php echo base_url();?>Projects/create_invoice">
                
                <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Invoice Id</label>
                	<div class="col-lg-3">
                   	<?php 
	                    foreach($invoiceId as $invoice){?>
                    <input type="invoice_id" name="invoice_id" class="form-control" value="<?php echo ($invoice->invoice_id+1) ;?>"  required="required"/>
                    <?php }?>
                   	
                 	</div>
                </div>
                
                 <div class="form-group">
                <label class="col-lg-3 control-label">Client Name</label>
                	<div class="col-lg-3">
                	 <select name="client_id">
						
                	<?php 
	                    foreach($clientdetails as $client){?>
	               <option value="<?php echo ($client->client_id) ;?>"><?php echo ($client->organization_name) ;?></option>     
                   
                    <?php }?>
                	
                   </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Due Date</label>
                	<div class="col-lg-3">
                    <input id="enddate" type="enddate" name="enddate" class="form-control"  required="required">
                 	</div>
                 	<div class="col-lg-1">
                	 	<span class="from-calendar-icon"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tax Percent</label>
                	<div class="col-lg-3">
                    <input type="tax" name="tax" class="form-control"  required="required">
                 	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Discount Percent</label>
                	<div class="col-lg-3">
                    <input type="discount" name="discount" class="form-control"  required="required">
                 	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Default Currency</label>
                	<div class="col-lg-3">
                    <select name="currency">
						<option value="USD">USD</option>
						<option value="EURO">EURO</option>
						<option value="GBP">GBP</option>
						<option value="AUD">AUD</option>
						
					</select>
                   
                 	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Notes</label>
                	<div class="col-lg-3">
                    <textarea name="notes" rows="5" cols="25"></textarea>
                    
                 	</div>
                </div>
                                
                
               
                
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
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
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
     <script src="<?php echo base_url();?>assets/js/datepickr.min.js"></script>
     <script>
            /* // Regular datepickr
            datepickr('#datepickr');

            // Custom date format
            datepickr('.datepickr', { dateFormat: 'd-m-Y'});

            // Min and max date
            datepickr('#minAndMax', {
                // few days ago
                minDate: new Date().getTime() - 2.592e8,
                // few days from now
                maxDate: new Date().getTime() + 2.592e8
            }); */

            // datepickr on an icon, using altInput to store the value
            // altInput must be a direct reference to an input element (for now)
          //  datepickr('.glyphicon-calendar', { altInput: document.getElementById('calendar-input') });
				datepickr('.from-calendar-icon',{ altInput: document.getElementById('enddate') });
				//datepickr('.to-calendar-icon', { altInput: document.getElementById('enddate') });

            

            // If the input contains a value, datepickr will attempt to run Date.parse on it
            datepickr('[title="parseMe"]');

          
        </script>
    

</body>
</html>
