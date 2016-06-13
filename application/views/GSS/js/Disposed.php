<script>
	var data = [
				{'no': 'WMR-001', 'asset': 'Table', 'desc': '10 meters'},

				];
	var table = $('#disposed-table').DataTable({
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
					}
				],
		columnDefs: [{targets: 2, width: '150px'}],
	});
</script>