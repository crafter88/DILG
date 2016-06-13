<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" />
<div ng-app='myApp' ng-controller='myCtrl'>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Supplies Availability Inquiry</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
 					<div class="box-body">
				            <div class="nav-tabs-custom">
				                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
				                  	<li class="active"><a href="#i-pending" data-toggle="tab">Pending</a></li>
				                  	<li><a href="#i-rejected" data-toggle="tab">Rejected</a></li>
				                  	<li><a href="#i-confirmed" data-toggle="tab">Confirmed</a></li>
				                  	<li><a href="#i-draft" data-toggle="tab">Draft</a></li>
				                  	<li><a href="#i-cancelled" data-toggle="tab">Cancelled</a></li>
				                 	<li style="float: right;"><button id='generate-po-btn' type='button' class='btn btn-default'>Create SAI<i class='fa fa-file'></i></button></li>
				                </ul>

			                <div class="tab-content">
			                  	<div class="tab-pane active" id="pending">
				                  	<table id='pending-sai-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>SAI no</th>
					                  		<th>Status</th>
					                  		<th>Date Created</th>
					                  		<th>Action</th>
					                  	</thead>
				                  	</table>
			                  	</div>
			                  	<div class="tab-pane" id="confirmed">
				                  	<table id='confirmed-sai-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>SAI no</th>
					                  		<th>Status</th>
					                  		<th>Date Created</th>
					                  		<th>Action</th>
					                  	</thead>
				                  	</table>
			                 	</div>
			                  	<div class="tab-pane" id="rejected">
				                  	<table id='rejected-sai-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>SAI no</th>
					                  		<th>Status</th>
					                  		<th>Date Created</th>
					                  		<th>Action</th>
					                  	</thead>
				                  	</table>
			                  	</div>
			                 	<div class="tab-pane" id="draft">
				                  	<table id='draft-sai-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>SAI no</th>
					                  		<th>Status</th>
					                  		<th>Date Created</th>
					                  		<th>Date Modified</th>
					                  		<th>Action</th>
					                  	</thead>
				                  	</table>
			                 	</div>
			                 	<div class="tab-pane" id="cancelled">
				                  	<table id='cancelled-sai-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>SAI no</th>
					                  		<th>Status</th>
					                  		<th>Date Created</th>
					                  		<th>Action</th>
					                  	</thead>
				                  	</table>
			                 	</div>
				                <div class="tab-pane" id="create-sai">
				                 	<form action="<?php echo base_url(); ?>user/sai/save_sai" method='post'>
				                 		<label>SAI No: &nbsp; </label>
				                 		<input type="text" name='sai_no' value="SAI-{{ last_sai_no }}-{{ sai_date }}" readonly style="font-size: 18px; font-weight: bold; border: none; background-color: transparent; color: red;">
				                 		<label>Date Today: &nbsp; </label>
				                 		<input type="text" name='date_created' value="{{ date_today }}" readonly style="font-size: 18px; font-weight: bold; border: none; background-color: transparent; color: red;">
				                 		<div class="col-md-12" style="margin-top: 20px;">
				                 			<div class='col-md-6'>
				                 				<button type='submit' class="btn btn-info" style="width: 30%">Send SAI</button>
				                 			</div>
				                 			<div class='col-md-6'>
				                 				<input type="text" class='form-control' ng-model='searchItem' placeholder='Search' style="width: 50%; float: right;">
				                 			</div>
				                 		</div>
				                 		<div class="col-md-12">
				                  			<table class='table table-bordered table-hover table-striped'>
					                  			<thead>
					                  				<th>Name</th>
					                  				<th>Description</th>
					                  				<th>Quantity</th>
					                  				<th>Select</th>
					                  				<th style="width: 150px;">Input Quantity</th>
					                  			</thead>
					                  			<tbody>
					                  				<tr ng-repeat='(index, item) in ppmp_items | filter:searchItem'>
					                  					<td>{{ item.name }}</td>
					                  					<td>{{ item.description }}</td>
					                  					<td>{{ item.available_qty }}</td>
					                  					<td style="display: none;">
					                  						<input type='checkbox' name='index[]' value='{{ index }}' ng-model='index_$index'>
					                  						<input type='checkbox' name='inventory_id[]' value='{{ item.inventory_id}}' ng-model='index_$index'>
					                  					</td>
					                  					<td ng-show='item.available_qty > 0'><input type='checkbox' name='items_id[]' value='{{ item.id }}' ng-model='index_$index' ></td>
					                  					<td ng-show='item.available_qty === 0'><input type='checkbox' name='items_id[]' value='{{ item.id }}' disabled></td>
					                  					<td ng-show='item.available_qty > 0'><input type='number' name='requested_qty[]' min='1' max='{{ item.available_qty }}' class='form-control'></td>
					                  					<td ng-show='item.available_qty === 0'><input type='number' name='requested_qty[]' min='1' max='{{ item.available_qty }}' class='form-control' disabled></td>
					                  				</tr>
					                  			</tbody>
					                  		</table>
				                 		</div>
				                 	</form>
				                 </div>
			                </div>
		              	</div>
	                </div>
	            </div>
           	</div>
		</div>
	</section>


	<div id='view-sai-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><label id='view-sai-sai_no'></label></h4>
				</div>
				<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
					<div class='row'>
						<div class="col-md-12">
				            <div class="box box-default">
				                <div class="box-body">
				                	<table class='table'>
				                		<tr>
				                			<td style="width: 12%;"><label style="color: #D00D0D;">Date Created:</label></td>
				                			<td><p id='view-sai-date_created' style="text-decoration: underline;"></p></td>
				                			<td style="width: 7%;"><label style="color: #D00D0D">Status:</label></td>
				                			<td><p id='view-sai-status' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
						            <table class='table table-hover table-bordered table-striped'>
						            	<thead>
						            		<th>Item</th>
						            		<th>Description</th>
						            		<th>Type</th>
						            		<th style="width: 80px;">Qty</th>
						            		<th style="width: 80px;">Unit Cost</th>
						            		<th style="width: 150px;">Total Cost</th>
						            	</thead>
						            	<tbody id='view-sai-items'>
							           	</tbody>
						            </table>
				                </div>
				            </div>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>
			</div>
		</div>
	</div>

</div>
