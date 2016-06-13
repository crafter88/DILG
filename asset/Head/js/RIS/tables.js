var initTables = function(scope, compile){
	var base_url = $('#base_url').val(); 
	var pending_table = $('#pending-table').DataTable({
		ajax: base_url+"/head/ris/pending_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-danger cancel-sai'>Cancel</button>"+
									"<button type='button' class='btn btn-default view-sai'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});
	var rejected_table = $('#rejected-table').DataTable({
		ajax: base_url+"/head/ris/rejected_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default view-sai'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});
	var confirmed_table = $('#confirmed-table').DataTable({
		ajax: base_url+"/head/ris/confirmed_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default view-sai'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});
	var draft_table = $('#draft-table').DataTable({
		ajax: base_url+"/head/ris/draft_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-danger cancel-sai'>Cancel</button>"+
									"<button type='button' class='btn btn-warning'>Edit</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});
	var cancelled_table = $('#cancelled-table').DataTable({
		ajax: base_url+"/head/ris/cancelled_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default view-sai'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});
	$('#create-sai-btn').click(function(){
		$('#create-sai-modal').modal({backdrop: 'static', keybaord: false});
		$('#create-sai-modal').modal('show');
	});
	$('.close-create-sai-modal').click(function () {
		if (confirm('This SAI Form will be saved as DRAFT')) {
			 /* $('#save_po_status').val('draft');
			 $.post(base_url+"/gss/head/sai/save_po", $('form#save_po').serialize(), function(data) {
				location.reload();
			 }); */
			 location.reload();
			$('#create-sai-modal').modal('hide');
		}else{
			location.reload();
			$('#create-sai-modal').modal('hide');
		}
	});

	$('#pending-table').on('click', '.cancel-sai', function(){
		var data = pending_table.row(this.closest('tr')).data();
		$(this).attr('disabled', true);
		$.post(base_url+"/head/ris/post_cancel_sai", {id: data.id}).done(function(){
			location.reload();
		});
	});
	$('#pending-table').on('click', '.view-sai', function(){
		$('#view-sai-items').html('');
		var data = pending_table.row(this.closest('tr')).data();
		$('#view-sai-sai_no').html("RIS No. "+data.sai_no);
		$('#view-sai-date_created').html(data.date_created);
		$('#view-sai-status').html(data.status);

		$.each(data.items, function(index, value){
			$('#view-sai-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.item_type+"</td>"+
						            		"<td>"+value.qty+"</td>"+
						            		"<td>"+value.unit_cost+"</td>"+
						            		"<td>"+value.total_cost+"</td>"+
						            	"</tr>");
		});
		$('#view-sai-modal').modal('show');
	});
	$('#confirmed-table').on('click', '.view-sai', function(){
		$('#view-sai-items').html('');
		var data = confirmed_table.row(this.closest('tr')).data();
		$('#view-sai-sai_no').html("RIS No. "+data.sai_no);
		$('#view-sai-date_created').html(data.date_created);
		$('#view-sai-status').html(data.status);

		$.each(data.items, function(index, value){
			$('#view-sai-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.item_type+"</td>"+
						            		"<td>"+value.qty+"</td>"+
						            		"<td>"+value.unit_cost+"</td>"+
						            		"<td>"+value.total_cost+"</td>"+
						            	"</tr>");
		});
		$('#view-sai-modal').modal('show');
	});
	$('#rejected-table').on('click', '.view-sai', function(){
		$('#view-sai-items').html('');
		var data = rejected_table.row(this.closest('tr')).data();
		$('#view-sai-sai_no').html("RIS No. "+data.sai_no);
		$('#view-sai-date_created').html(data.date_created);
		$('#view-sai-status').html(data.status);

		$.each(data.items, function(index, value){
			$('#view-sai-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.item_type+"</td>"+
						            		"<td>"+value.qty+"</td>"+
						            		"<td>"+value.unit_cost+"</td>"+
						            		"<td>"+value.total_cost+"</td>"+
						            	"</tr>");
		});
		$('#view-sai-modal').modal('show');
	});
	$('#cancelled-table').on('click', '.view-sai', function(){
		$('#view-sai-items').html('');
		var data = cancelled_table.row(this.closest('tr')).data();
		$('#view-sai-sai_no').html("RIS No. "+data.sai_no);
		$('#view-sai-date_created').html(data.date_created);
		$('#view-sai-status').html(data.status);

		$.each(data.items, function(index, value){
			$('#view-sai-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.item_type+"</td>"+
						            		"<td>"+value.qty+"</td>"+
						            		"<td>"+value.unit_cost+"</td>"+
						            		"<td>"+value.total_cost+"</td>"+
						            	"</tr>");
		});
		$('#view-sai-modal').modal('show');
	});
	$('#add-item-btn').click(function(){
		$('#inventory-item-modal').modal('show');
	});
}