<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Forgot Password</title>

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

            
                    
                <button class="btn btn-primary block  m-b" style="float: left;" 
                onclick="window.location='<?php echo base_url();?>login/create_user_account'">Create <b>Tester</b> Account</button>
                <button class="btn btn-primary block  m-b" style="float: right;"
                onclick="window.location='<?php echo base_url();?>login/create_client_account'">Create <b>Client</b> Account</button>
            
           
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
