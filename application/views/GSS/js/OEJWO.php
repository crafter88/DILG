<script>
	var data = [
				{'no': '123', 'asset': 'Table', 'desc': '10 meters', 'status': 'pending'},
				];
	var table = $('#pending-table').DataTable({
		data: data,
		columns: [
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return sourceData.no;
						}
					},
					{'data': 'asset'},
					{'data': 'desc'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default'>View</button><button type='button' class='btn btn-default wmr-btn'>Generate WMR</button>";
						}
					},
				],
				columnDefs: [{targets: 3, width: '250px'}],
	});

$('.wmr-btn').click(function(){
		$('#wmr-modal').modal('show');
	});

</script>

