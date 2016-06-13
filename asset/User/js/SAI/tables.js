var initTables = function(scope, compile){
	var base_url = $('#base_url').val(); 
	var pending_sai_table = $('#pending-sai-table').DataTable({
		ajax: base_url+"user/sai/all_sai",
		columns: [
					{'data': 'sai_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<select class='form-control cancel-sai'>"+
										"<option value='pending'>Pending</option>"+
										"<option value='cancel'>Cancel</option>"+
									"</select>"+
									"<button type='button' class='btn btn-default view-sai'>View</button>";
						}
					}
				],

	});


	$('#pending-sai-table').on('click', '.view-sai', function(){
		$('#view-po-items').html('');
		var data = pending_sai_table.row( this.closest('tr') ).data();
		$('#view-sai-sai_no').html(data.sai_no);
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
}