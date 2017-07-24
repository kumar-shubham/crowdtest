<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
   
    <div class="container">
		 <div class="row">
		  <div class="col-md-8"></div>
		  <div class="col-md-4">
		  	  <div class="panel panel-default">
			  <div class="panel-body">
			   <div class="page-header">
  					<h3>Login</h3>
				</div>
				<form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
					   <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					</div>
				  
				  
				  
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				      
				  <div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-star"></span></span>
					   <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
				  </div>
				 <?php 
               $csrf = array(
        						'name' => $this->security->get_csrf_token_name(),
        						'hash' => $this->security->get_csrf_hash()
				);?>


				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
				  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
				  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>