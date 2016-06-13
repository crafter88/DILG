<script>
	var data = [
				{'no': 'WMR-001', 'asset': 'Table', 'desc': '10 meters', 'date': 'May 1, 2016'},

				];
	var table = $('#wmr-table').DataTable({
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
					{'data': 'date'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default'>View</button><button type='button' class='btn btn-default'>Download</button>";
						}
					}
				],
		columnDefs: [{targets: 4, width: '150px'}],
	});

$('#wmr-btn').click(function(){
		$('#wmr-modal').modal('show');
	});

</script>