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


</head>

<body class="no-skin-config">


	<div id="wrapper">



		<div id="page-wrapper" class="white-bg">

			<div class="row ">

			</div>
       
       
       <?php include 'mailboxmenu.php';?>
       
         <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="" class="pull-right mail-search">
                <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
              <div class="input-group">
                        <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                <h2>
                    Inbox 
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                    </div>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                </div>
            </div>
                <div class="mail-box">

                <table class="table table-hover table-mail">
                <tbody>
                 <?php
						foreach ( $inbox as $records ) {
						
							
					?>	
				   <tr class="<?php echo  $records->read_flag; ?>">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html"><?php echo  $records->username; ?>  </a></td>
                    <td class="mail-subject"><a href="mail_detail.html"><?php echo  $records->subject; ?></a></td>
                    <td class=""><i class="fa fa-paperclip"></i></td>
                    <td class="text-right mail-date"><?php echo  $records->maildate; ?></td>
                </tr>
               <?php }?>
             
                </tbody>
                </table>


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
			<script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
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
