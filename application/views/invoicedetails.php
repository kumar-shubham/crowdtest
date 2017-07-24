<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Invoice Details</title>

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

<script type="text/javascript">
function total()
{

	var totalPrice=(document.getElementById("quantity").value)*(document.getElementById("unitprice").value);
	document.getElementById("totalprice").value=totalPrice+totalPrice*((document.getElementById("tax").value)/100);
	//itemname quantity unitprice tax
}

</script>

</head>

<body  class="no-skin-config">

    <div id="wrapper">

    
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
                </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                     <?php if($mode=="edit"){ ?>
                    <h2>Edit Invoice</h2>
                    <?php } else{?>
                     <h2>View Invoice</h2>
                     <?php }?>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
           
            <div class="row">
                
                
                
               <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">

                  <div class="row">
                                <div class="col-sm-6">
                                    <h5>From:</h5>
                                    <address>
                                         <?php foreach($company as $companyInfo){?>
                                        <strong><?php echo($companyInfo->company_name);?></strong><br>
                                       <?php
                                       $address=explode("," , $companyInfo->company_address);
                                      for($count=0;$count<sizeof($address);$count++)
                                      {
                                       echo($address[$count]);?><br>
                                       <?php }?>
                                        <br>
                                        <abbr title="Phone">P:</abbr> <?php echo($companyInfo->phone);?>
                                        <?php }?>
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy">INV-0<?php echo $invoiceId ;?></h4>
                                    <span>To:</span>
                                    <address>
                                          <?php foreach($client as $clientInfo){?>
                                        <strong><?php echo($clientInfo->organization_name);?></strong><br>
                                       
                                        <?php
                                       $address=explode("," , $clientInfo->address);
                                      for($count=0;$count<sizeof($address);$count++)
                                      {
                                       echo($address[$count]);?><br>
                                       <?php }?>
                                       
                                        
                                        <abbr title="Phone">P:</abbr> <?php echo $clientInfo->phone_no ;?>
                                          <?php }?>
                                    </address>
                                    <p>
                                        <?php foreach($invoiceDates as $invoiceInfoDates){?>
                                        <span><strong>Invoice Date:</strong> <?php echo $invoiceInfoDates->created_on?></span><br/>
                                        <span><strong>Due Date:</strong> <?php echo $invoiceInfoDates->due_date?></span>
                                        <?php }?>
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table border="1" class="table invoice-table pretty">
                                    <thead>
                                    <tr>
                                        <th>Item List</th>
                                        <th>Quantity</th>
                                        <th>Unit Price($)</th>
                                        <th>Tax(%)</th>
                                        <th>Total Price($)</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                 <?php foreach($invoice as $invoiceInfo){?>
                                        
                                    <tr>
                                       <form class="form-horizontal"  role="form" method="POST"  action="<?php echo base_url();?>Projects/delete_invoice_row">
                                        <td><div><?php echo($invoiceInfo->items);?></div>
                                            <!-- <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td> -->
                                        <td><?php echo($invoiceInfo->Quantity);?></td>
                                        <td><?php echo($invoiceInfo->unit_price);?></td>
                                        <td><?php echo($invoiceInfo->tax);?></td>
                                        <td><?php echo($invoiceInfo->row_total);?></td>
                                        <?php  if($mode=="edit"){ ?>
                                         <td>
                                         <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                         <button type="submit" class="btn btn-default" aria-label="Left Align" title="Delete" data-placement="bottom" data-toggle="tooltip" type="button">
                                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                         </button>
                                         </td>
                                         <?php }?>
                                        
                                          <input type="hidden" name="invoice_list_id" value="<?php echo $invoiceInfo->list_id ;?>"/>
                                          <input type="hidden" name="invoice_id" value="<?php echo $invoiceId ;?>"/>
                                          </form>
                                    </tr>
                                   <?php }?>
                                   <?php 
                                   if($mode=="edit"){ ?>
                                    <tr>
                                    <form class="form-horizontal"  role="form" method="POST"  action="<?php echo base_url();?>Projects/create_invoice_details">  
                                        <td><div class="col-lg-13"><input type="text" class="form-control" name="itemname" id="itemname" required="required"/></div></td>
                                        <td align="right"><div class="col-lg-10"><input type="text" class="form-control" name="quantity" id="quantity" required="required"/></div></td>
                                        <td align="right"><div class="col-lg-10"><input type="text" class="form-control" name="unitprice" id="unitprice" required="required" onblur="total()"  onkeyup="total()"/></div></td>
                                       <?php foreach($company as $invoiceInfoDates){?>
                                        <td align="right"><div class="col-lg-10"><input type="text" class="form-control" name="tax" id="tax" value="<?php echo $invoiceInfoDates->vat_percent; ?>"/></div></td>
                                        <?php }?>
                                        <td align="right"><div class="col-lg-10"><input type="text" class="form-control" name="totalprice" id="totalprice" readonly="readonly"/></div></td>
                                       <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                        <td><button type="submit" class="btn btn-default" aria-label="Left Align" title="Delete" data-placement="bottom" data-toggle="tooltip" type="button">
                                         <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                         </button></td>
                                        
                                    <input type="hidden" name="invoice_id" value="<?php echo $invoiceId ;?>"/>
                                  <?php }?>     
                                   </form>
                                    </tr>
                                   

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                 <td><strong> Total :</strong></td>
                                <?php  $totalAmt=0;
                                   foreach($invoice as $invoiceInfo){
                                  $totalAmt=$totalAmt+floatval($invoiceInfo->row_total);
                                   }
                                  echo ("<td> $ ".$totalAmt."</td>");
                                  ?>
                                  
                                   
                                    
                                </tr>
                                
                                <!-- <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td>$235.98</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>$1261.98</td>
                                </tr> -->
                                </tbody>
                            </table>
                             <?php if($mode=="view"){ ?>
                            <form method="post" action="<?php echo base_url();?>Projects/initiate_payment">
                            <?php foreach($invoiceDates as $invoiceInfoDates){?>
                            <input type="hidden" name="invoice_id" value="<?php echo $invoiceInfoDates->invoice_id?>">
                            <input type="hidden" name="total_amt" value="<?php echo $invoiceInfoDates->total_amt?>">
                            
                            <?php }?>
                            <div class="text-right">
                            <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <button class="btn btn-primary" type="submit"><i class="fa fa-dollar"></i> Make A Payment</button>
                            </div>
                            </form>
                            <?php }?>

                           <!--  <div class="well m-t"><strong>Comments</strong>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            </div> -->
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
     <script src="<?php echo base_url();?>assets/js/datepickr.min.js"></script>
     <script>
            

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
