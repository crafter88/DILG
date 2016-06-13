<script>
	var data = [
				{'no': '123', 'date': 'January 24, 2016', 'status': 'Pending'},
				{'no': '234', 'date': 'January 5, 2016', 'status': 'Pending'},
				{'no': '346', 'date': 'January 17, 2016', 'status': 'Pending'},
				{'no': '789', 'date': 'January 15, 2016', 'status': 'Pending'},
				{'no': '789', 'date': 'January 12, 2016', 'status': 'Pending'},
				{'no': '523', 'date': 'January 21, 2016', 'status': 'Pending'},
				{'no': '345', 'date': 'January 28, 2016', 'status': 'Pending'},
				{'no': '546', 'date': 'January 12, 2016', 'status': 'Pending'},
				{'no': '567', 'date': 'January 18, 2016', 'status': 'Pending'},
				{'no': '879', 'date': 'January 19, 2016', 'status': 'Pending'},
				];
	var table = $('#oes-table').DataTable({
		data: data,
		columns: [
					{'data': 'no'},
					{'data': 'date'},
					{'data': 'status'},
				],
	});
</script>