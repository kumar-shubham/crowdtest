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

			<div class="row border-bottom ">

				<nav class="navbar " role="navigation">
					<div class="navbar-header">

						<h2>&nbsp;Scrum Dashboard</h2>


					</div>
				</nav>
			</div>
       
       
       <?php include 'projectmenu.php';?>
       
       
               <div class="col-lg-3">
				<div class="ibox">
					<div class="">
						<h3>To-do</h3>
						<p class="small">
							<i class="fa fa-hand-o-up"></i> Tasks yet to be started
						</p>


						<ul class="sortable-list connectList agile-list">
                                <?php
																																// print_r($results);
																																foreach ( $results as $records ) {
																																	
																																	// echo '============'.$records->status;
																																	if ($records->status == 'Not Started') {
																																		if ($records->priority == 'Minor') {
																																			?>
                               		
                               		<li class="success-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>

							</li>
                               		
                               <?php
																																		} 

																																		elseif ($records->priority == 'Major') {
																																			?>
                               		<li class="warning-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
							</li>
                               <?php
																																		} elseif ($records->priority == 'Critical') {
																																			?>
                               		<li class="danger-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php
																																		}
																																	}
																																}
																																?>
                                
                            
						
						</ul>
					</div>
				</div>
			</div>


			<div class="col-lg-3">
				<div class="ibox">
					<div class="">
						<h3>In Progress</h3>
						<p class="small">
							<i class="fa fa-hand-o-up"></i>Tasks in progress
						</p>
						<ul class="sortable-list connectList agile-list">
                               <?php
																															// print_r($results);
																															foreach ( $results as $records ) {
																																
																																// echo '============'.$records->status;
																																if ($records->status == 'Progress' || $records->status == 'Reopened' || $records->status == 'Resolved') {
																																	if ($records->priority == 'Minor') {
																																		?>
                               		<li class="success-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php
																																	} 

																																	elseif ($records->priority == 'Major') {
																																		?>
                               		
							
							<li class="warning-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php
																																	} elseif ($records->priority == 'Critical') {
																																		?>
                               		
							
							<li class="danger-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php
																																	}
																																}
																															}
																															?>
                                
                                
                            
						
						</ul>
					</div>
				</div>
			</div>




			<div class="col-lg-3">
				<div class="ibox">
					<div class="">
						<h3>Completed</h3>
						<p class="small">
							<i class="fa fa-hand-o-up"></i> Tasks completed
						</p>
						<ul class="sortable-list connectList agile-list">
                                 <?php
																																	// print_r($results);
																																	
																																	foreach ( $results as $records ) {
																																		
																																		// echo '============'.$records->status;
																																		if ($records->status == 'Closed') {
																																			if ($records->priority == 'Minor') {
																																				?>
                               		<li class="success-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php
																																			} 

																																			elseif ($records->priority == 'Major') {
																																				?>
                               		
							
							<li class="warning-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php
																																			} elseif ($records->priority == 'Critical') {
																																				?>
                               		
							
							<li class="danger-element"><a
								href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a>
								<div class="agile-detail">
									<i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php
																																			}
																																		}
																																	}
																																	
																																	?>
                                
                            
						
						</ul>
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
