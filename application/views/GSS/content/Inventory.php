<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" /> 
<div ng-app='myApp' ng-controller='myCtrl'>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
	          	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Inventory - Supply</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>

	                 <div class="box-body">
	                  	<div class="nav-tabs-custom">
				                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
				                  	<li class="active"><a href="#inventory" data-toggle="tab">All</a></li>
				                  	<li><a href="#gss" data-toggle="tab">GSS</a></li>
				                  	<li><a href="#acc" data-toggle="tab">Accounting</a></li>
				                  	<li><a href="#it" data-toggle="tab">IT</a></li>
				                </ul>
	                	
	                  	<div class="tab-content">
				                  	<div class="tab-pane active" id="inventory">
					                  	<table id='inventory-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>	
												<th>Item</th>
						                  		<th>Description</th>
						                  		<th>Qty</th>
						                  		<th>Actions</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="gss">
				                    	<table id='gss-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>Item</th>
		                  						<th>Description</th>
		                  						<th>Qty</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="acc">
				                    	<table id='accounting-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>Item</th>
		                  						<th>Description</th>
		                  						<th>Qty</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="it">
				                    	<table id='it-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>Item</th>
		                  						<th>Description</th>
		                  						<th>Qty</th>
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

<section class="content">
		<div class="row">
			<div class="col-md-12">
	          	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Inventory - Asset</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>

	                 <div class="box-body">    	
	                  	<div class="tab-content">
				                  	<div class="tab-pane active" id="inventory">
					                  	<table id='asset-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>	
					                  			<th>Asset No</th>
					                  			<th>Serial No / Distinction No</th>
												<th>Asset</th>
						                  		<th>Description</th>
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

<form id='save_par' action="<?php echo base_url(); ?>gss/head/inventory/add_parts" method='post'>
<div id='add-modal' class="modal fade" role='dialog' tabindex='-1'>
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
				<h4 style='font-size: 18px; font-weight: bold; margin: 0;'>Asset No: <input type='text' id='asset_no' name='asset_no' style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
				<h4 style='font-size: 18px; font-weight: bold; margin: 0;'>Serial No / Distinction No: <input type='text' id='distinction_no' name='distinction_no' style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
			</div>
			<div class="modal-body">
				<table class='table table-hover table-bordered table-striped'>
	            	<thead>
	            		<th>Asset</th>
	            		<th>Description</th>
	            		<th>Parts</th>				            		
	            	</thead>
	            	<tbody>
		           		 <tr>
		           			<td>
		           				<input class='form-control' type='text' name='asset_name' id='asset_name' style="border: none; background: transparent;" readonly>
		           			</td>
		           			<td>
		           				<input class='form-control' type='text' name='asset_desc' id='asset_desc' style="border: none; background: transparent;" readonly>
		           			</td>
		           			<td id='parts' width="401px"> 
		           				<button id='add-part-btn' type="button" class='btn btn-default btn-sm' style="margin-bottom: 8px;">Add <i class='fa fa-plus'></i></button>	           				
		           			</td>
		           		</tr> 
		           	</tbody>
	            </table>
			</div>
			<div class='modal-footer'>
				<button class='btn btn-danger'>Cancel</button>
				<button class='btn btn-success'>Save</button>
			</div>
		</div>
	</div>
</div>
</form>