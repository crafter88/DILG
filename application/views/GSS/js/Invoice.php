<script>
	var data = [
				{'no': '123', 'date_issued': 'January 24, 2016', 'status': 'transferred'},
				];
	var table = $('#confirmed-table').DataTable({
		data: data,
		columns: [
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return sourceData.no;
						}
					},
					{'data': 'date_issued'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default'>Download</button>";
						}
					},
				],
				columnDefs: [{targets: 3, width: '250px'}],
	});

	var data1 = [
				{'no': '123', 'date_issued': 'January 24, 2016', 'status': 'pending'},
				];


	var table = $('#pending-table').DataTable({
		data: data1,
		columns: [
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return sourceData.no;
						}
					},
					{'data': 'date_issued'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<select class='form-control action-po'>"+
										"<option value='pending'>Pending</option>"+
										"<option value='confirm'>Confirm</option>"+
										"<option value='reject'>Reject</option>"+
									"</select>"+
									"<button type='button' class='btn btn-default'>View</button>";
						}
					},
				],
				columnDefs: [{targets: 3, width: '250px'}],
	});

</script>