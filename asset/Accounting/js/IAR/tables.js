var initTables = function(){
	var base_url = $('#base_url').val(); 
	var completed_table = $('#completed-table').DataTable({
		ajax: base_url+"/accounting/head/iar/completed_iar",
		columns: [
					{'data': 'iar_no'},
					{'data': 'status'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-success'>Download</button><button type='button' class='btn btn-default view-iar'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '150px'}],
	});

	$('#completed-table').on('click', '.view-iar', function(){
		$('#view-iar-items').html('');
		var data = completed_table.row(this.closest('tr')).data();
		$('#view-iar-iar_no').html(data.iar_no);
		$('#view-iar-date_created').html(data.date_created);
		$('#view-iar-status').html(data.status);

		$.each(data.items, function(index, value){
			$('#view-iar-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.qty+"</td>"+
						            		"<td>"+value.unit_cost+"</td>"+
						            		"<td>"+value.total_cost+"</td>"+
						            	"</tr>");
		});
		$('#view-iar-modal').modal('show');
	});

}