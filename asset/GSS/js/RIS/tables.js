
	var base_url = $('#base_url').val(); 


	var ppmp_table = $('#ppmp-table').DataTable({
						ajax: base_url + 'gss/head/ris/get_ppmp',
						columns: [
										{'data': 'name'},
										{'data': 'description'},
										{'data': 'qty'},
										{
											mRender: function(rowData, settings, sourceData){
												return "<input id='inventory_"+sourceData.id+"' class='checkbox' type='checkbox'>";
											}
										},
									],
						bLengthChange: false,
					});


	$('#create-ris-btn').click(function(){
		$('#create-ris-modal').modal('show');
	});

	$('#ppmp-table').on('click', '.checkbox', function(){
		var data = ppmp_table.row(this.closest('tr')).data();

		if($(this).is(':checked')){
			$('#modal-ris-table').find('tbody').append("<tr>"+
														"<td>"+data.name+"</td>"+
														"<td>"+data.description+"</td>"+
														"<td><input class='form-control' type='number' min='1' max='"+data.qty+"' step='1' value='1'></td>"+
														"<td><button id='"+data.id+"' type='button' class='btn btn-danger remove-item'>&times; </button></td>"+
														"</tr>");
			//$(this).attr('disabled',)
		}
	});

	$('#modal-ris-table').on('click', '.remove-item', function(){
		var id = $(this).attr('id');
		$('#inventory_'+id).prop('checked', false);
		$(this).closest('tr').remove();

	});

	$('.close-create-sai-modal').click(function () {
		if (confirm('This SAI Form will be saved as DRAFT')) {
			 $('#save_po_status').val('draft');
			 $.post(base_url+"/gss/head/sai/save_po", $('form#save_po').serialize(), function(data) {
				location.reload();
			 });
			 location.reload();
			$('#create-sai-modal').modal('hide');
		}else{
			location.reload();
			$('#create-sai-modal').modal('hide');
		}
	});

	/** var pending_table = $('#pending-table').DataTable({
		ajax: base_url+"/gss/head/ris/pending_sai",
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
		ajax: base_url+"/gss/head/ris/rejected_sai",
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
		ajax: base_url+"/gss/head/ris/confirmed_sai",
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
	var all_pending_table = $('#all-pending-table').DataTable({
		ajax: base_url+"/gss/head/ris/all_pending_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<select class='form-control action-ris'>"+
										"<option value='pending'>Pending</option>"+
										"<option value='confirm'>Confirm</option>"+
										"<option value='reject'>Reject</option>"+
									"</select>"+
									"<button type='button' class='btn btn-default view-sai'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});
	var all_rejected_table = $('#all-rejected-table').DataTable({
		ajax: base_url+"/gss/head/ris/all_rejected_sai",
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
	var all_confirmed_table = $('#all-confirmed-table').DataTable({
		ajax: base_url+"/gss/head/ris/all_confirmed_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-success'>Dispense</button>"+
									"<button type='button' class='btn btn-default view-sai'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});
	var draft_table = $('#draft-table').DataTable({
		ajax: base_url+"/gss/head/ris/draft_sai",
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
		ajax: base_url+"/gss/head/ris/cancelled_sai",
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
		/**	 location.reload();
			$('#create-sai-modal').modal('hide');
		}else{
			location.reload();
			$('#create-sai-modal').modal('hide');
		}
	});

	$('#pending-table').on('click', '.cancel-sai', function(){
		var data = pending_table.row(this.closest('tr')).data();
		$(this).attr('disabled', true);
		$.post(base_url+"/gss/head/ris/post_cancel_sai", {id: data.id}).done(function(){
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
	$('#all-pending-table').on('click', '.view-sai', function(){
		$('#view-sai-items').html('');
		var data = all_pending_table.row(this.closest('tr')).data();
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
	$('#all-confirmed-table').on('click', '.view-sai', function(){
		$('#view-sai-items').html('');
		var data = all_confirmed_table.row(this.closest('tr')).data();
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
	$('#all-rejected-table').on('click', '.view-sai', function(){
		$('#view-sai-items').html('');
		var data = all_rejected_table.row(this.closest('tr')).data();
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
	$('#all-pending-table').on('change', '.action-ris', function(){
		var data = all_pending_table.row(this.closest('tr')).data();
		if($(this).val() === 'confirm'){
			$(this).attr('disabled', true);
			$.post(base_url+"/gss/head/ris/post_confirm_ris", {id: data.id}).done(function(){
				location.reload();
			});
		}
		if($(this).val() === 'reject'){
			$(this).attr('disabled', true);
			$.post(base_url+"/gss/head/ris/post_reject_ris", {id: data.id}).done(function(){
				location.reload();
			});
		}
	}); **/
