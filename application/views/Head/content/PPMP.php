<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" /> 
<div ng-app='myApp' ng-controller='myCtrl'>
	<section class="content">
	<?php
		if($this->session->flashdata('error')){
			echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
		}
	?>
		<div class="row">
			<div class="col-md-12">
	          	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Project Procurement Management Plan</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
			            <div class="nav-tabs-custom">
			                <ul class="nav nav-tabs">
			                  	<li class="active"><a href="#first" data-toggle="tab">1st Quarter</a></li>
			                  	<li><a href="#second" data-toggle="tab">2nd Quarter</a></li>
			                 	<li><a href="#third" data-toggle="tab">3rd Quarter</a></li>
			                 	<li><a href="#fourth" data-toggle="tab">4th Quarter</a></li>

			                </ul>

			                <div class="tab-content">
			                  	<div class="tab-pane active" id="first">
			                  		<div class='row'>
				                  		<div class='col-md-4'>
				                  			<form method='post' action="<?php echo base_url(); ?>head/ppmp/activate_ppmp" enctype='multipart/form-data'>
					                  			<input class='form_id_1' type='hidden' name='form_id'>
					                  			<button type='submit' class='btn btn-primary set-as-active'>Set as active</button>
					                  		</form>
				                  		</div>
					                  	<div id='upload_ppmp_1' class='col-md-4 col-md-offset-4' style="margin-bottom: 20px;">
					                  		<label style="text-align: right; width: 100%;">File: {{ file_name_1 }}</label>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/save_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<label class="custom-file-upload">
							                  			<input type='hidden' name='quarter' value='1'>
													    <input type="file" name='file' file-model1='myFile' quarter='1' />
													    <i class="fa fa-cloud-upload"></i> Upload PPMP
													</label> 
													<input id='save_abstract_ppmp_1' type='submit' class='btn btn-default' value='save' style="display: none; width: 100%;">
												</p>
											</form>
					                  	</div>
					                </div>
				                 	<div id='delete_ppmp_1' class='row' style="display: none;">
				                  		<div class='col-md-12'>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/delete_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<input class='form_id_1' type='hidden' name='form_id'>
													<button id='delete_ppmp_1' type='submit' class='btn btn-default'>Delete PPMP</button>
												</p>
											</form>
					                  	</div>
				                 	</div>
				                  	<table id='first-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>Item</th>
					                  		<th>Description</th>
					                  		<th>Quantity</th>
					                  		<th>Unit Cost</th>
					                  		<th>Total Cost</th>
					                  	</thead>
				                  	</table>
			                  	</div>
			                 	<div class="tab-pane" id="second">
			                 		<div class='row'>
				                  		<div class='col-md-4'>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/activate_ppmp" enctype='multipart/form-data'>
					                  			<input class='form_id_2' type='hidden' name='form_id'>
					                  			<button type='submit' class='btn btn-primary set-as-active'>Set as active</button>
					                  		</form>
				                  		</div>
					                  	<div id='upload_ppmp_2' class='col-md-4 col-md-offset-4' style="margin-bottom: 20px;">
					                  		<label style="text-align: right; width: 100%;">File: {{ file_name_2 }}</label>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/save_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<label class="custom-file-upload">
							                  			<input type='hidden' name='quarter' value='2'>
													    <input type="file" name='file' file-model2='myFile' quarter='2' />
													    <i class="fa fa-cloud-upload"></i> Upload Abstract
													</label> 
													<input id='save_abstract_ppmp_2' type='submit' class='btn btn-default' value='save' style="display: none; width: 100%;">
												</p>
											</form>
					                  	</div>
					                </div>
				                 	<div id='delete_ppmp_2' class='row' style="display: none;">
				                  		<div class='col-md-12'>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/delete_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<input class='form_id_2' type='hidden' name='form_id'>
													<button id='delete_ppmp_2' type='submit' class='btn btn-default'>Delete PPMP</button>
												</p>
											</form>
					                  	</div>
				                 	</div>
				                  	<table id='second-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>Item</th>
					                  		<th>Description</th>
					                  		<th>Quantity</th>
					                  		<th>Unit Cost</th>
					                  		<th>Total Cost</th>
					                  	</thead>
				                  	</table>
			                 	</div>
			                  	<div class="tab-pane" id="third">
			                  		<div class='row'>
				                  		<div class='col-md-4'>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/activate_ppmp" enctype='multipart/form-data'>
					                  			<input class='form_id_3' type='hidden' name='form_id'>
					                  			<button type='submit' class='btn btn-primary set-as-active'>Set as active</button>
					                  		</form>
				                  		</div>
					                  	<div id='upload_ppmp_3' class='col-md-4 col-md-offset-4' style="margin-bottom: 20px;">
					                  		<label style="text-align: right; width: 100%;">File: {{ file_name_3 }}</label>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/save_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<label class="custom-file-upload">
							                  			<input type='hidden' name='quarter' value='3'>
													    <input type="file" name='file' file-model3='myFile' quarter='3' />
													    <i class="fa fa-cloud-upload"></i> Upload Abstract
													</label> 
													<input id='save_abstract_ppmp_3' type='submit' class='btn btn-default' value='save' style="display: none; width: 100%;">
												</p>
											</form>
					                  	</div>
					                </div>
				                 	<div id='delete_ppmp_3' class='row' style="display: none;">
				                  		<div class='col-md-12'>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/delete_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<input class='form_id_3' type='hidden' name='form_id'>
													<button id='delete_ppmp_3' type='submit' class='btn btn-default'>Delete PPMP</button>
												</p>
											</form>
					                  	</div>
				                 	</div>
			                    	<table id='third-table' class='table table-bordered table-hover table-striped' width="100%">
			                    		<thead>
					                  		<th>Item</th>
					                  		<th>Description</th>
					                  		<th>Quantity</th>
					                  		<th>Unit Cost</th>
					                  		<th>Total Cost</th>
					                  	</thead>
				                  	</table>
			                  	</div>
			                  	<div class="tab-pane" id="fourth">
			                  		<div class='row'>
				                  		<div class='col-md-4'>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/activate_ppmp" enctype='multipart/form-data'>
					                  			<input class='form_id_4' type='hidden' name='form_id'>
					                  			<button type='submit' class='btn btn-primary set-as-active'>Set as active</button>
					                  		</form>
				                  		</div>
					                  	<div id='upload_ppmp_4' class='col-md-4 col-md-offset-4' style="margin-bottom: 20px;">
					                  		<label style="text-align: right; width: 100%;">File: {{ file_name_4 }}</label>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/save_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<label class="custom-file-upload">
							                  			<input type='hidden' name='quarter' value='4'>
													    <input type="file" name='file' file-model4='myFile' quarter='4' />
													    <i class="fa fa-cloud-upload"></i> Upload Abstract
													</label> 
													<input id='save_abstract_ppmp_4' type='submit' class='btn btn-default' value='save' style="display: none; width: 100%;">
												</p>
											</form>
					                  	</div>
					                </div>
				                 	<div id='delete_ppmp_4' class='row' style="display: none;">
				                  		<div class='col-md-12'>
					                  		<form method='post' action="<?php echo base_url(); ?>head/ppmp/delete_ppmp" enctype='multipart/form-data'>
						                  		<p style="float: right;">
							                  		<input class='form_id_4' type='hidden' name='form_id'>
													<button id='delete_ppmp_4' type='submit' class='btn btn-default'>Delete PPMP</button>
												</p>
											</form>
					                  	</div>
				                 	</div>
			                    	<table id='fourth-table' class='table table-bordered table-hover table-striped' width="100%">
			                    		<thead>
					                  		<th>Item</th>
					                  		<th>Description</th>
					                  		<th>Quantity</th>
					                  		<th>Unit Cost</th>
					                  		<th>Total Cost</th>
					                  	</thead>
				                  	</table>
			                  	</div>
			                </div>
		              	</div>
	                </div>
	            </div>
	       	</div>
		</div>
	</section>
</div>
