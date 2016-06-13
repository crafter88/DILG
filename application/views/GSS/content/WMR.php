<div ng-app='myApp' ng-controller='myCtrl'>
<section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Waste Material Report</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
	                	<div class="nav-tabs-custom">
				                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
				                	<li class="active"><a href="#i-all" data-toggle="tab">All</a></li>
				                	<li><a href="#i-completed" data-toggle="tab">Completed</a></li>
				                  	<li><a href="#i-draft" data-toggle="tab">Draft</a></li>
				                  	<li style="float: right;"><button id='wmr-btn' type='button' class='btn btn-default'>Create WMR <i class='fa fa-file'></i></button></li>
				                </ul>

	                  	<div class="tab-content">
	                  				<div class="tab-pane active" id="i-all">
					                  	<table id='i-all-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>WMR No</th>
						                  		<th>Status</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Created By</th>
		                  						<th>Date Created</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="i-completed">
					                  	<table id='i-completed-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>WMR No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Created By</th>
		                  						<th>Date Created</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="i-draft">
					                  	<table id='i-draft-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>WMR No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Created By</th>
		                  						<th>Date Created</th>
		                  						<th>Action</th>
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

<div id='wmr-modal' class="modal fade" role='dialog' tabindex='-1'>
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
				<h4 style="margin: 0;">Invoice Receipt of Property</h4>
				Share
					<select class='form-control' name='current-are-office' id="current-are-office">
						<option value='Anyone can edit'>Anyone can edit</option>
						<option value='Anyone can view'>Anyone can view</option>
						<option value='Only me'>Only me</option>
					</select>
			</div>
			<div class="modal-body">
					OEJ/WO No: 					
					<select class='form-control' name='current-are-office' id="current-are-office">
						<option value='OEJ/WO No. 1'>OEJ/WO No. 1</option>
						<option value='OEJ/WO No. 2'>OEJ/WO No. 2</option>
						<option value='OEJ/WO No. 3'>OEJ/WO No. 3</option>
					</select>

					<br><br>
					PPE No:
					<br><br>
					Asset:
					<br><br>
					Parts:
					<br><br>
					Description:
					<br><br>
					Date:
					<br><br>
			</div>
			<div class='modal-footer'>
				<button class='btn btn-default'>Generate WMR</button>
			</div>
		</div>
	</div>
</div>