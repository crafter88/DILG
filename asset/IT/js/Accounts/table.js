var initTables = function(scope, compile){
	var accounts_table = $('#accounts-table').DataTable({
		ajax: 'all_accounts',
		columns: [
					{
						mRender: function(rowData, settings, sourceData){
							return "<img src='"+window.location.origin+"/uploads/"+sourceData.user_image+"' width='100px'>";
						}
					},
					{'data': 'firstname'},
					{'data': 'middlename'},
					{'data': 'lastname'},
					{'data': 'home_addr'},
					{'data': 'tel_no'},
					{'data': 'email'},
					{'data': 'name'},
					{'data': 'position'},
					{'data': 'username'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button class='btn btn-warning edit'>Edit</buton> <button class='btn btn-default view'>View</button>";
						}
					},
		],
		columnDefs: [{targets: 10, width: '130px'}, {targets: [0,1,2,3,4,5,6,7,8,9], width: '120px'}],
		scrollX: true,
	});
	
	$('#add-user-button').click(function(){
		$('#add-user-modal').modal('show');
	});

	$('#accounts-table').on('click', '.edit', function(){
		var data = accounts_table.row(this.closest('tr')).data();
		var modal = $('#edit-user-modal');
		modal.find('input[name=user_account_id]').val(data.user_account_id);
		modal.find('input[name=user_profile_id]').val(data.user_profile_id);
		modal.find('input[name=username]').val(data.username);
		modal.find('select[name=department]').val(data.department);
		modal.find('input[name=position]').val(data.position);
		modal.find('input[name=firstname]').val(data.firstname);
		modal.find('input[name=middlename]').val(data.middlename);
		modal.find('input[name=lastname]').val(data.lastname);
		modal.modal('show');
	});

	$('#accounts-table').on('click', '.view', function(){
		var data = accounts_table.row(this.closest('tr')).data();
		var modal = $('#view-user-modal');
		modal.find('input[name=user_account_id]').val(data.user_account_id);
		modal.find('input[name=user_profile_id]').val(data.user_profile_id);
		modal.find('input[name=username]').val(data.username);
		modal.find('select[name=department]').val(data.department);
		modal.find('input[name=position]').val(data.position);
		modal.find('input[name=firstname]').val(data.firstname);
		modal.find('input[name=middlename]').val(data.middlename);
		modal.find('input[name=lastname]').val(data.lastname);
		modal.modal('show');
	});
	
//Upload Image
	$('#img').change(function(ev){
		readURL(this);
	});

	var readURL = function(input){
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	           $('#temp-img').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
}