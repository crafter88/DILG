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

	    <style type="text/css">
	    	.skin-blue .main-header .navbar{
	    		background-color: #FFF !important;
	    	}
    	 	.skin-blue .main-header .logo{
    	 		background-color: #222d32 !important;
    	 	}
    	 	.skin-blue .main-header .navbar .sidebar-toggle{
    	 		color: #222d32 !important;
    	 	}
    	 	.skin-blue .main-header .navbar .sidebar-toggle:hover{
    	 		background-color: #222d32 !important;
    	 		color: #FFF !important;
    	 	}
    	 	.skin-blue .main-header .navbar .nav>li>a{
    	 		color: #222d32 !important;
    	 	}

    	 	header nav{
    	 		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
    	 		border-color: #e7e7e7;
    	 	}
	    </style>

	    <?php if(isset($css)){ $this->load->view($css); } ?>
 	</head>
  
	<body class="hold-transition skin-blue sidebar-mini">
	    <div class="wrapper">
	      	<header class="main-header">
	        	<a href="index2.html" class="logo">
		          	<span class="logo-mini" style='font-size: 11px;'>Super Admin</span>
		         	<span class="logo-lg">Super Admin</span>
	        	</a>

	        	<nav class="navbar navbar-static-top" role="navigation">
		          	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		            	<span class="sr-only">Toggle navigation</span>
		         	</a>
	          		<div class="navbar-custom-menu">
	            		<ul class="nav navbar-nav">
	             			<li class="dropdown user user-menu">
	                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                 				<span class="hidden-xs"><?php echo $this->session->userdata('user_full_name'); ?></span>
	                			</a>
	                			<ul class="dropdown-menu">
	                  				<li class="user-header">
	                   					<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	                    				<p>
	                      					<?php echo $this->session->userdata('user_full_name'); ?>
	                      					<small>
											<?php echo $this->session->userdata('position'); ?></small>
	                    				</p>
	                  				</li>
	                 				<li class="user-body">
	                    				<div class="col-xs-4 text-center">
	                      					<a href="#">Followers</a>
	                    				</div>
	                    				<div class="col-xs-4 text-center">
	                      					<a href="#">Sales</a>
	                    				</div>
	                    				<div class="col-xs-4 text-center">
	                      					<a href="#">Friends</a>
	                    				</div>
	                  				</li>
	                  				<li class="user-footer">
	                    				<div class="pull-left">
	                      					<a href="#" class="btn btn-default btn-flat">Profile &nbsp; <i class="fa fa-user" aria-hidden="true"></i></a>
	                    				</div>
	                    				<div class="pull-right">
	                      					<a href="#" class="btn btn-default btn-flat">Sign out &nbsp; <i class="fa fa-sign-out" aria-hidden="true"> </i></a>
	                    				</div>
	                  				</li>
	                			</ul>
	             			</li>
	             			<li>
	             				<a href="<?php echo base_url(); ?>/logout">
	                 				<span class="hidden-xs">Logout</span>
	                			</a>
	             			</li>
		            	</ul>

		          	</div>
		        </nav>
		    </header>
	      	<aside class="main-sidebar">
	        	<section class="sidebar">
	          		<ul class="sidebar-menu">
	           			<li class="header">NAVIGATION</li>
	            		<li class="<?php if($nav === 'user_credential'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>super_admin/user_credential"><i class="fa fa-users"></i> <span>Users</span></a></li>

	          		</ul>
	       		</section>
	      	</aside>

	      	<div class="content-wrapper">
	      		<?php if(isset($content)){ $this->load->view($content); } ?>
	      	</div>

	      	<div class="control-sidebar-bg"></div>
	    </div>


	    <script src="<?php echo base_url(); ?>/libs/jquery.min.js"></script>
	    <script src="<?php echo base_url(); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url(); ?>/libs/dist/js/app.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>/libs/datatable/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>/libs/datatable/js/dataTables.bootstrap.min.js"></script>

	    <?php if(isset($js)){ $this->load->view($js); }?>
  	</body>
</html>
