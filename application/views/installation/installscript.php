
  
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Install Application</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
<div id="main-wra">
    	
    <div class="text-center loginscreen animated fadeInDown">
        <div id="agile-forgotlogin-part">
        	<div class="agile-logo">
				<img src="<?php echo base_url();?>assets/img/logo.png" alt="logo">
			</div>
            	<div class="agile-login-bg effect">
                	<div>
            <div>
                <h1 class="logo-name"></h1>

            </div>
         
            <h2>Install Application</h2>
            <p>
             <br>  
            </p>
            <p></p>
          <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>install/install_application">
          <div class="form-group">
                    <input type="hostname" name="hostname" class="form-control" placeholder="Database hostname" required="required">
                </div>
                 <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Database username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Database Password" >
                </div>
                <div class="form-group">
                    <input type="dbname" name="dbname" class="form-control" placeholder="Database Name" required="required">
                </div>
                 <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
  			<button class="btn btn-warning dim btn-large-dim" type="submit">
<i class="fa fa-download"></i>
</button>
  			<!-- <input type="submit"/> -->
		</form>

            <p class="m-t"> <small></small> </p>
        </div>
    </div>
</div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</body>
</html>
