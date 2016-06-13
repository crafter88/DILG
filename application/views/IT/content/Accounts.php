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
	                		<div class="nav-tabs-custom">
								<div class="tab-content">
									<div class="tab-pane active" id="pending">
										<div class='row'>
											<div class='col-colmd-12'>
												<button id='add-user-button' class='btn btn-primary' style='float: right; margin-bottom: 10px;'>Add</button>
											</div>
											<div class='col-md-12'>
												<table id='accounts-table' class='table table-bordered table-hover table-striped'>
													<thead>
														<th>Image</th>
														<th>Firt Name</th>
														<th>Middle Name</th>
														<th>Last Name</th>
														<th>Home Address</th>
														<th>Tel No.</th>
														<th>Email</th>
														<th>Department</th>
														<th>Position</th>
														<th>Username</th>
														<th>Actions</th>
													</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Departments</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
	                	<div class="nav-tabs-custom">
	                		<div class="nav-tabs-custom">
								<div class="tab-content">
									<div class="tab-pane active" id="pending">
										<div class='row'>
											<div class='col-colmd-12'>
												<button id='add-department-button' class='btn btn-primary' style='float: right; margin-bottom: 10px;'>Add</button>
											</div>
											<div class='col-md-12'>
												<table id='departments-table' class='table table-bordered table-hover table-striped'>
													<thead>
														<th>Department Name</th>
														<th>Actions</th>
													</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
			            </div>
		           	</div>
				</div>
			</div>
		</div>
	</section>
	
<!-- MODAL USER -->
	<div id='add-user-modal' class='modal fade' role='dialog' tabindex='-1'>
		<div class='modal-dialog modal-lg'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'>Add User</h4>
				</div>
				<form action="<?php echo base_url(); ?>it/add_user" method='post'>
					<div class='modal-body'>
						<div class='row'>
							<div class='col-md-6'>
								<table width='100%'>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Username </label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='username' required ></td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Department</label></td>
										<td style='padding-bottom: 10px;'>
											<select class='form-control' name='department' required >
												<option ng-repeat='department in all_departments track by $index' value='{{ department.id }}'>{{ department.name }}</option>
											</select>
										</td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Position</label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='position' required ></td>
									</tr>
								</table>
							</div>
							<div class='col-md-6'>
								<table width='100%'>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>First Name </label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='firstname' required ></td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Middle Name </label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='middlename' required ></td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Last Name </label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='lastname' required ></td>
									</tr>
								</table>
							</div>
							
							<!--<div class='col-md-12'>
								<h4 style="text-align: center;">Upload Image</h4>
								<img id='temp-img' src="{{ URL::to('/') }}/uploads/default.png" height='300px'>
								<input id='img' type='file' name='image' style='margin-top: 20px;'>
							</div>-->
						</div>
					</div>
					<div class='modal-footer'>
						<button type='submit' class='btn btn-primary'>Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id='edit-user-modal' class='modal fade' role='dialog' tabindex='-1'>
		<div class='modal-dialog modal-lg'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'>Edit User</h4>
				</div>
				<form action="<?php echo base_url(); ?>it/edit_user" method='post'>
					<div class='modal-body'>
						<div class='row'>
							<div class='col-md-6'>
								<table width='100%'>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Username </label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='username' required ></td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Department</label></td>
										<td style='padding-bottom: 10px;'>
											<select class='form-control' name='department' required >
												<option ng-repeat='department in all_departments track by $index' value='{{ department.id }}'>{{ department.name }}</option>
											</select>
										</td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Position</label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='position' required ></td>
									</tr>
								</table>
							</div>
							<div class='col-md-6'>
								<table width='100%'>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>First Name </label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='firstname' required ></td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Middle Name </label></td>
										<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='middlename' required ></td>
									</tr>
									<tr>
										<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Last Name </label></td>
										<td style='padding-bottom: 10px;'>
											<input class='form-control' type='text' name='lastname' required >
											<input type='hidden' name='user_account_id'>
											<input type='hidden' name='user_profile_id'>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='submit' class='btn btn-primary'>Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id='view-user-modal' class='modal fade' role='dialog' tabindex='-1'>
		<div class='modal-dialog modal-lg'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'>View User</h4>
				</div>
				<div class='modal-body'>
					<div class='row'>
						<div class='col-md-6'>
							<table width='100%'>
								<tr>
									<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Username </label></td>
									<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='username' readonly ></td>
								</tr>
								<tr>
									<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Department</label></td>
									<td style='padding-bottom: 10px;'>
										<select class='form-control' name='department' readonly >
											<option ng-repeat='department in all_departments track by $index' value='{{ department.id }}'>{{ department.name }}</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Position</label></td>
									<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='position' readonly ></td>
								</tr>
							</table>
						</div>
						<div class='col-md-6'>
							<table width='100%'>
								<tr>
									<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>First Name </label></td>
									<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='firstname' readonly ></td>
								</tr>
								<tr>
									<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Middle Name </label></td>
									<td style='padding-bottom: 10px;'><input class='form-control' type='text' name='middlename' readonly ></td>
								</tr>
								<tr>
									<td style='padding-bottom: 10px; text-align: right; padding-right: 5px;'><label>Last Name </label></td>
									<td style='padding-bottom: 10px;'>
										<input class='form-control' type='text' name='lastname' readonly >
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-primary' data-dismiss='modal'>Ok</button>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- MODAL DEPARTMENT -->
<div id='add-department-modal' class='modal fade' role='dialog' tabindex='-1'>
	<div class='modal-dialog modal-sm'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'>Add Department</h4>
			</div>
			<form action="<?php echo base_url(); ?>it/add_departments" method='post'>
				<div class='modal-body'>
					<table width='100%'>
						<tr>
							<td><label>Name</label></td>
							<td><input class='form-control' type='text' name='name' required></td>
						</tr>
					</table>
				</div>
				<div class='modal-footer'>
					<button type='submit' class='btn btn-primary'>Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id='edit-department-modal' class='modal fade' role='dialog' tabindex='-1'>
	<div class='modal-dialog modal-sm'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'>Edit Department</h4>
			</div>
			<form action="<?php echo base_url(); ?>it/edit_departments" method='post'>
				<div class='modal-body'>
					<table width='100%'>
						<tr>
							<td><label>Name</label></td>
							<td>
								<input class='form-control' type='text' name='name' required>
								<input type='hidden' name='id'>
							</td>
						</tr>
					</table>
				</div>
				<div class='modal-footer'>
					<button type='submit' class='btn btn-primary'>Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id='view-department-modal' class='modal fade' role='dialog' tabindex='-1'>
	<div class='modal-dialog modal-sm'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'>View Department</h4>
			</div>
			<div class='modal-body'>
				<table width='100%'>
					<tr>
						<td><label>Name</label></td>
						<td>
							<input class='form-control' type='text' name='name' readonly>
						</td>
					</tr>
				</table>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-primary' data-dismiss='modal'>Ok</button>
			</div>
		</div>
	</div>
</div>
