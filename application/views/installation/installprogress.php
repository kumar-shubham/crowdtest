
  
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
     <script>
function move() {
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
            document.getElementById("login").style.display="block";
        } else {
            width++;
            elem.style.width = width + '%';
        }
    }

     
}
 </script>

</head>

<body class="gray-bg" onload="move()">
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
          <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>">
          <div class="ibox-content">
<h5></h5>
<div class="progress">

<div class="progress-bar progress-bar-success" id="myBar" style="width: 10%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" role="progressbar">
 
 

<span class="sr-only"></span>
</div>
</div>

 <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
  			<button class="btn btn-primary block  m-b " id="login" style="display: none" type="submit">
Voila!! Go to Login
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
