<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Supply and Asset Monitoring System</title>
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>/libs/bootstrap/css/bootstrap.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>/libs/font-awesome/css/font-awesome.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>/libs/ionicons/css/ionicons.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>/libs/dist/css/AdminLTE.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>/libs/dist/css/skins/skin-blue.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>/libs/datatable/css/dataTables.bootstrap.min.css">

  	</head>
	<body class="hold-transition">
		<div class="register-box" style="width: 800px;">
		  	<div class="register-logo">
		    	<a href="#"><b>Supply and Asset Monitoring System</b></a>
		  	</div>

		  	<div class="register-box-body" style="background-color: #F7F7F7; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);">
			    <h3 class="login-box-msg">Register</h3>
			    <form action="<?php echo base_url(); ?>post_register" method="post">
			    	<div class='row'>
			    		<div class='col-md-6'>
			    			<div class="form-group has-feedback">
					        	<input type="text" class="form-control" name='username' placeholder="Username" required>
					        	<span class="form-control-feedback"><i class='fa fa-credit-card'></i></span>
					      	</div>
					      	<div class="form-group has-feedback">
					        	<input type="password" class="form-control" name='password' placeholder="Password" required>
				       			<span class="form-control-feedback"><i class='fa fa-key'></i></span>
					      	</div>
					      	<div class="form-group has-feedback">
					        	<select class="form-control" name='department' placeholder="Department" required>
					        		<option value="" disabled selected>Select Department</option>
					        		<option value='superadmin'>Super Admin</option>
					        	</select>
					      	</div>
			    		</div>
			    		<div class='col-md-6'>
			    			<div class="row">
				    			<div class="form-group has-feedback">
						        	<input type="text" class="form-control" name='firstname' placeholder="First Name" required>
						        	<span class="form-control-feedback"><i class='fa fa-user'></i></span>
						      	</div>
						      	<div class="form-group has-feedback">
						        	<input type="text" class="form-control" name='middlename' placeholder="Middle Name" required>
					       			<span class="form-control-feedback"><i class='fa fa-user'></i></span>
						      	</div>
						      	<div class="form-group has-feedback">
						        	<input type="text" class="form-control" name='lastname' placeholder="Last Name" required>
					       			<span class="form-control-feedback"><i class='fa fa-user'></i></span>
						      	</div>
					        	<div class="col-xs-4 col-xs-offset-8">
					          		<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
					        	</div>
					      	</div>
			    		</div>
			    	</div>
			      	
			    </form>
			    <a href="<?php echo base_url(); ?>" class="text-center">I already have an account</a>
		  	</div>
		</div>

		<script src="<?php echo base_url(); ?>/libs/jquery.min.js"></script>
	    <script src="<?php echo base_url(); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url(); ?>/libs/dist/js/app.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>/libs/datatable/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>/libs/datatable/js/dataTables.bootstrap.min.js"></script>
	</body>
</html>
