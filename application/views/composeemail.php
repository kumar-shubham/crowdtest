<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SCRUM | Agile Dashboard</title>

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css"
	rel="stylesheet">
<link
	href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css"
	rel="stylesheet">
<link
	href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css"
	rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/animate.css"
	rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css"
	rel="stylesheet">
<link
	href="<?php echo base_url();?>assets/css/plugins/datapicker/datepicker3.css"
	rel="stylesheet">


<link
	href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.bootstrap.css"
	rel="stylesheet">
<link
	href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.responsive.css"
	rel="stylesheet">
<link
	href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.tableTools.min.css"
	rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">


</head>

<body class="no-skin-config">


	<div id="wrapper">



		<div id="page-wrapper" class="white-bg">

			<div class="row ">

			</div>
       
       
       <?php include 'mailboxmenu.php';?>
       
        <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                    <a href="mailbox.html" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                </div>
                <h2>
                    Compse mail
                </h2>
            </div>
                <div class="mail-box">


                <div class="mail-body">

                    <form class="form-horizontal" method="post">
                    <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    
                        <div class="form-group"><label class="col-sm-2 control-label">To:</label>

                            <div class="col-sm-10"><input type="text" class="form-control" value="alex.smith@corporat.com"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Subject:</label>

                            <div class="col-sm-10"><input type="text" class="form-control" value=""></div>
                        </div>
                        </form>

                </div>

                    <div class="mail-text h-200">

                        <div class="summernote">
                            <h3>Hello Jonathan! </h3>
                            dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                            <br/>
                            <br/>

                        </div>
                        
                     
                        
<div class="clearfix"></div>
                        </div>
                    <div class="mail-body text-right tooltip-demo">
                        <a href="mailbox.html" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</a>
                        <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                        <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                    </div>
                    <div class="clearfix"></div>



                </div>
            </div>
        </div>
        </div>
        


			<!-- Mainly scripts -->

			<script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
			<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
			<script
				src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
			<script
				src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

			<!-- Custom and plugin javascript -->
			<script src="<?php echo base_url();?>assets/js/SCRUM.js"></script>
			<script
				src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>

			<script
				src="<?php echo base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
			<script
				src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
			<script
				src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
			<script
				src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

			<!-- Data picker -->
			<script
				src="<?php echo base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
			<!-- Peity -->
			<script
				src="<?php echo base_url();?>assets/js/plugins/iCheck/icheck.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/plugins/summernote/summernote.min.js"></script>
			<script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

        $('.summernote').summernote();

    });
    var edit = function() {
        $('.click2edit').summernote({focus: true});
    };
    var save = function() {
        var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
        $('.click2edit').destroy();
    };
    </script>


			<style>
body.DTTT_Print {
	background: #fff;
}

.DTTT_Print #page-wrapper {
	margin: 0;
	background: #fff;
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
