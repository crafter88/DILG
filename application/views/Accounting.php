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
	        	<a href="<?php echo base_url(); ?>accounting/head/po" class="logo">
		          	<span class="logo-mini"> <img src="<?php echo base_url('asset/images/icon-dilg.png'); ?>"  style="width: 35px; height: 35px;"> </img> </span>
		         	<span class="logo-lg" style='font-size: 15px;'> ACCOUNTING </span>
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
	                   					<img id="image" style="cursor:pointer;" src="<?php echo base_url('asset/images/profile/default-profile.png'); ?>" class="img-circle" alt="User Image" />
										<input type='file' style="display:none;" name="photosubmit" id="photosubmit"/>
	                    				<p>
	                      					<?php echo $this->session->userdata('user_full_name'); ?>
	                      					<small>
											<?php echo $this->session->userdata('position'); ?></small>
	                    				</p>
	                  				</li>
	                 				<!--<li class="user-body">
	                    				<div class="col-xs-4 text-center">
	                      					<a href="#">Followers</a>
	                    				</div>
	                    				<div class="col-xs-4 text-center">
	                      					<a href="#">Sales</a>
	                    				</div>
	                    				<div class="col-xs-4 text-center">
	                      					<a href="#">Friends</a>
	                    				</div>
	                  				</li> -->
	                  				<li class="user-footer">
	                    				<div class="pull-left">
	                      					<a href="#" class="btn btn-default btn-flat profile-btn">Profile &nbsp; <i class="fa fa-user" aria-hidden="true"></i> </a> 
	                    				</div>
	                    				<div class="pull-right">
	                      					<a href="<?php echo base_url(); ?>/logout" class="btn btn-default btn-flat">Sign out &nbsp; <i class="fa fa-sign-out" aria-hidden="true"> </i></a>
	                    				</div>
	                  				</li>
	                			</ul>
	             			</li>
	             			<!--<li>
	             				<a href="<?php echo base_url(); ?>/logout">
	                 				<span class="hidden-xs">Logout</span>
	                			</a>
	             			</li>-->
		            	</ul>

		          	</div>
		        </nav>
		    </header>
	      	<aside class="main-sidebar">
	        	<section class="sidebar">
	          		<ul class="sidebar-menu">
	            		<li class="<?php if($nav === 'po'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>accounting/head/po"><i class="fa fa-shopping-cart"></i> <span>PO</span></a></li>
	            		<li class="<?php if($nav === 'iar'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>accounting/head/iar"><i class="fa fa-truck"></i> <span>IAR</span></a></li>
	            		<li class="<?php if($nav === 'ppmp'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>accounting/head/ppmp"><i class="fa fa-users"></i> <span>PPMP</span></a></li>
	            		<li class="<?php if($nav === 'ris'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>accounting/head/ris"><i class="fa fa-pencil"></i> <span>RIS</span></a></li>
	            		<li class="<?php if($nav === 'invoice'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>accounting/head/invoice"><i class="fa fa-share"></i> <span>IRP</span></a></li>
	            		<li class="<?php if($nav === 'oejwo'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>accounting/head/oejwo"><i class="fa fa-wrench"></i> <span>OEJ/WO</span></a></li>
	            		<li class="<?php if($nav === 'asset'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>accounting/head/asset"><i class="fa fa-list-ul"></i> <span>My Assets</span></a></li>
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
	    <script type="text/javascript" src="<?php echo base_url(); ?>/libs/angular/angular.min.js"></script>
	    
	    <?php if(isset($js)){ $this->load->view($js); }?>

<div id='profile-modal' class="modal fade" role='dialog' tabindex='-1'>
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
				<h4 style="margin: 0;">Profile</h4>
			</div>
			<div class="modal-body">
				<form>
					Family Name: <?php
						echo $this->session->userdata('user_last_name'); 
					?>
					<br><br>
					First Name: <?php
						echo $this->session->userdata('user_first_name'); 
					?>
					<br><br>
					Middle Name: <?php
						echo $this->session->userdata('user_middle_name'); 
					?>
					<br><br>
					Position: 
					<br><br>
					Office:
					<br><br>
					Home Address: <input type="text" size="35" value=""> 
					<br><br>
					Telephone No: <input type="text" size="35" value=""> 
					<br><br>
					Email:
					<br><br>
					Username: <input type="text" size="35" value="">@dilg-sams.com
					<br><br>
					Password: <input type="password" size="35" value=""> <input type="checkbox">show<br>
					<br><br>

				</form>
			</div>
			<div class='modal-footer'>
				<button class='btn btn-danger' data-dismiss='modal'>Cancel</button>
				<button class='btn btn-success'>Save</button>
			</div>
		</div>
	</div>
</div>

<script>
	
	$('.profile-btn').click(function(){
		$('#profile-modal').modal('show');
	});

	$("#image").click(function(){
		 $("#photosubmit").click();
	});

</script>


  	</body>
</html>
