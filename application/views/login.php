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
		<div class="register-box">
			<center> <img src="<?php echo base_url('asset/images/dilg.png'); ?>" height="150" width="150"> </img></center>
		  	<div class="register-logo">
		    	<a href="#"><b>Supply and Asset Monitoring System</b></a>
		  	</div>

		  	<div class="register-box-body" style="background-color: #F7F7F7; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);">
			    <h3 class="login-box-msg">Login</h3>
				<?php
					if($this->session->flashdata('error')){
						echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
					}
				?>
			    <form action="<?php echo base_url(); ?>post_login" method="post">
			      	<div class="form-group has-feedback">
			        	<input type="text" class="form-control" name="username" placeholder="Username">
			        	<span class="glyphicon glyphicon-user form-control-feedback"></span>
			      	</div>
			      	<div class="form-group has-feedback">
			        	<input type="password" class="form-control" name="password" placeholder="Password">
		       			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			      	</div>
			      	<div class="row">
			        	<div class="col-xs-12">
			          	 <button type="submit" class="btn btn-primary btn-block btn-flat">Login <i class="fa fa-sign-in" aria-hidden="true"></i> </button>
			        	</div>
			      	</div>
			    </form>
		  	</div>
		</div>

		<script src="<?php echo base_url(); ?>/libs/jquery.min.js"></script>
	    <script src="<?php echo base_url(); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url(); ?>/libs/dist/js/app.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>/libs/datatable/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>/libs/datatable/js/dataTables.bootstrap.min.js"></script>
	</body>
</html>
