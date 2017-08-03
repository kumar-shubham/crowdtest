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

            <?php if ($flag=='mismatch')
            {?>
            <div class="alert alert-danger ">
                Password and Confirm Password are not same.

            </div>
            <?php }?>
         
            <h2>Create Tester Account</h2>
            <p>
               
            </p>
            <p></p>
            <form class="m-t" role="form" method="POST" action="<?php echo base_url();?>login/user_signup">
            <?php 
               $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                );?>


                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                </div>
                 <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                </div>
                 <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Retype Password" required="required">
                </div>
                <input type="hidden" name="flag" value="create"/>
                <button type="submit" class="btn btn-primary block full-width m-b">Create Account</button>

                <!-- <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
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
