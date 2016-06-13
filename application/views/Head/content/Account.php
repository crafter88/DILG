<div ng-app='myApp' ng-controller='myCtrl'>
<section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Accounts</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
	                	<div class="nav-tabs-custom">
	                		<ul class="nav nav-tabs" style="margin-bottom: 20px;">
	                		<li style="float: right;"><button id='account-btn' type='button' class='btn btn-default'>Create Account<i class='fa fa-file'></i></button></li>
	                		
	                		</ul>
						<div class="nav-tabs-custom">
	                	<div class="tab-content">
				                  	<div class="tab-pane active" id="account">
					                  	<table id='account-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>Account No</th>
						                  		<th>Name</th>
						                  		<th>Office</th>
						                  		<th>Status</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                </div>
			              	
		                </div>
		            </div>
	           	</div>
			</div>
	</section>


	<div id='account-modal' class="modal fade" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;">Create New Account</h4>
				</div>
				<div class="modal-body">
					<div class='row'>
						<div class='col-md-6'>
							
						</div>
						<div class='col-md-6'>
							<form>
								<table>
									<tr>
										<td><label>First Name: </label></td>
										<td><input class='form-control' type="text" size="25"></td>
									</tr>
									<tr>
										<td><label>Middle Name: </label></td>
										<td><input class='form-control' type="text" size="25"></td>
									</tr>
									<tr>
										<td><label>Last Name: </label></td>
										<td><input class='form-control' type="text" size="25"></td>
									</tr>
									<tr>
										<td><label>Home Address: </label></td>
										<td><input class='form-control' type="text" size="25"></td>
									</tr>
									<tr>
										<td><label>Tel No: </label></td>
										<td><input class='form-control' type="text" size="25"></td>
									</tr>
									<tr>
										<td><label>Email Address: </label></td>
										<td>
											<div class='input-group'>
												<input class='form-control' type="text" size="25">
												<span class='input-group-addon'>@dilgcar.com</span>
											</div>
										</td>
									</tr>
									<tr>
										<td><label>Office: </label></td>
										<td>
											<select class='form-control'>
												<option value='3'>GSS</option>
												<option value='2'>Accounting</option>
												<option value='6'>IT</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label>Position: </label></td>
										<td><input class='form-control' type="text" size="25"></td>
									</tr>
									<tr>
										<td><label>Username: </label></td>
										<td><input class='form-control' type="text" size="25"></td>
									</tr>
									<tr>
										<td><label>Password: </label></td>
										<td><input class='form-control' type="password" size="25"></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button class='btn btn-danger'>Cancel</button>
					<button class='btn btn-success'>Save</button>
				</div>
			</div>
		</div>
	</div>

</div>
