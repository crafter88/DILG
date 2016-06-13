var initTables = function(scope, compile){
	var base_url = $('#base_url').val(); 
	var pc_table = $('#pc-table').DataTable({
		ajax: base_url+"/gss/head/pc/generated_pc",
		columns: [
					{'data': 'pc_no'},
					//{'data': 'asset'},
					{'data': 'employee'},
					{'data': 'date_created'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-success'>Download</button><button type='button' class='btn btn-default view-pc'>View</button>";
						}
					}
				],

	});
	// var draft_table = $('#draft-table').DataTable({
	// 	ajax: base_url+"/gss/head/are/draft_are",
	// 	columns: [
	// 				{'data': 'are_no'},
	// 				{'data': 'asset'},
	// 				{'data': 'status'},
	// 				{'data': 'date_created'},
	// 				// {'data': 'date_modified'},
	// 				{
	// 					mData: null,
	// 					bSortable: false,
	// 					mRender: function(rowData, settings, sourceData){
	// 						return "<button type='button' class='btn btn-warning edit-are'>Edit</button>";
	// 					}
	// 				}
	// 			],
	// });

	// $('#generate-are-btn').click(function(){
	// 	$('input[type=file]').val('');
	// 	$('#generate-are-modal').modal({backdrop: 'static', keyboard: false});
	// 	$('#generate-are-modal').modal('show');
	// });

	// $('#add-item-btn').click(function(){
	// 	$('#inventory-item-modal').modal('show');
	// });

	// $('#add-asset-btn').click(function() {
	//     $('#current-are-asset-name').toggle();
	// });

	// $('.show-draft-modal').click(function () {
	//   	if (confirm('ARE will be saved as DRAFT')) {
	//   		 $('#save_are_status').val('draft');
	//   		 $.post(base_url+"/gss/head/are/save_are", $('form#save_are').serialize(), function(data) {
	//   		 	location.reload();
	//   		 });
	// 	}else{
	// 		location.reload();
	// 		$('#generate-are-modal').modal('hide');
	// 	}
	// });

	// $('#draft-table').on('click', '.edit-are', function(){
	// 	var data = draft_table.row(this.closest('tr')).data();
	// 	$('#edit-are-modal-are_no').val(data.are_no);
	// 	$('#edit-are-modal-are_id').val(data.id);

	// 	$('#current-are-asset-name').val(data.asset);
	// 	$('#current-are-office').val(data.office);
	// 	$('#current-are-employee').val(data.employee);

	// 	$('#edit-are-modal').modal({backdrop: 'static', keyboard: false});
	// 	$('#edit-are-modal').modal('show');
	// 	console.log(data);
	// });

	// $('#change-asset-btn').click(function(){
	// 	$('#inventory-item-modal').modal('show');
	// });

	// $('#show-draft-edit-modal').click(function(){
	// 	if (confirm('Changes will not be saved')) {
	//   		location.reload();
	// 		$('#edit-po-modal').modal('hide');
	// 	}
	// });

	$('#pc-table').on('click', '.view-pc', function(){

		var data = pc_table.row(this.closest('tr')).data();
		$('#view-pc-pc_no').val(data.pc_no);
		$('#view-pc-date-created').val(data.date_created);
		$('#view-pc-status').val(data.status);
		$('#view-pc-asset-name').val(data.asset);
		$('#view-pc-office').html(data.office);
		$('#view-pc-employee').val(data.employee);
		console.log(data);
		$('#view-pc-modal').modal('show');

	});

	// $('#completed-table').on('click', '.generate-pc', function(){

	// 	var data = completed_table.row(this.closest('tr')).data();
	// 	var today = new Date();
	// 	$('#ppe_no').val(data.office+"-"+today.getFullYear()+"-"+data.id);
	// 	$('#pc-asset-name').val(data.asset);
	// 	$('#pc-date-created').val(data.date_created);
	// 	$('#pc-employee').val(data.employee);
	// 	$('#pc-status').val("Serviceable");
		
	// 	console.log(data);
	// 	$('#generate-pc-modal').modal('show');
	// });

}