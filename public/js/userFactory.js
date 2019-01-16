function adjustRole(role_id, user_id){

	$.ajax({

		url: 'user/edit_role',
		type: 'POST',
		data: { user_id: user_id, role_id: role_id},
		success: function(data){

	
		},
		fail: function(data){

		
		}

	});
}