<script type="text/javascript">
	var base_url = $('#base_url').val();

	var items_table = $('#items-table').DataTable({
		ajax: base_url+'head/current_quarter_items',
		columns: [
					{'data': 'name'},
					{'data': 'description'},
					{'data': 'unit_cost'},
					{'data': 'available_qty'},
				],
	});
</script>