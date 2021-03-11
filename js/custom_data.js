var $j = jQuery.noConflict();
$j(document).ready(function(){
	
	$j('#editableTable').DataTable();
	
	$j("#editableTable-row").on('click', '.close-popup', function() {
		$j('#myModal').hide();
	});
	
	$j('#editableTable').on('click', 'a.delete-col', function() {
		$j('#loading_image').show();
		var id = $j(this).parent().parent('tr').attr('data-row-id');
		$j.ajax({ 
			type: "POST",  
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'id': id, 'action': 'DELETE'},
			success: function(response)  
			{
				$j('#loading_image').hide();
				$j('#editableTable-row').empty().append(response);
				$j('#myModal').show();
			}
		});
	});
	
	$j('.court_province.form-control').on('change', function() {
		$j('#loading_image').show();
		var id = $j(this).val();
		$j.ajax({
			type: "POST",  
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'province_id': id, 'action': 'COURT PROVINCE'},  
			success: function(response)  
			{
				$j('#loading_image').hide();
				$j('.court_district.form-control').empty().append(response);
			}
		});
	});
		
	$j('#editableTable-row').on('change', '.court_province.form-control', function() {
		$j('#loading_image').show();
		var id = $j(this).val();
		$j.ajax({
			type: "POST",  
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'province_id': id, 'action': 'COURT PROVINCE'},  
			success: function(response)  
			{
				$j('#loading_image').hide();
				$j('.court_district.form-control').empty().append(response);
			}
		});
	});
	
	$j('.custom-data_page_add-province #editableTable').on('click', 'a.editable-col', function() {
		$j('#loading_image').show();
		var id = $j(this).parent().parent('tr').attr('data-row-id');
		$j.ajax({ 
			type: "POST",
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'province_id': id, 'action': 'EDIT PROVINCE'},  
			success: function(response)
			{
				$j('#loading_image').hide();
				$j('#editableTable-row').empty().append(response);
				$j('#myModal').show();
			}
		});
	});
	
	$j('.custom-data_page_add-district #editableTable').on('click', 'a.editable-col', function() {
		$j('#loading_image').show();
		var id = $j(this).parent().parent('tr').attr('data-row-id');
		$j.ajax({ 
			type: "POST",
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'district_id': id, 'action': 'EDIT DISTRICT'},  
			success: function(response)
			{
				$j('#loading_image').hide();
				$j('#editableTable-row').empty().append(response);
				$j('#myModal').show();
			}
		});
	});
		
	$j('.custom-data_page_add-court-type #editableTable').on('click', 'a.editable-col', function() {
		$j('#loading_image').show();
		var id = $j(this).parent().parent('tr').attr('data-row-id');
		$j.ajax({ 
			type: "POST",
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'court_type_id': id, 'action': 'EDIT COURT TYPE'},  
			success: function(response)
			{
				$j('#loading_image').hide();
				$j('#editableTable-row').empty().append(response);
				$j('#myModal').show();
			}
		});
	});	
	
	$j('.custom-data_page_add-file-type #editableTable').on('click', 'a.editable-col', function() {
		$j('#loading_image').show();
		var id = $j(this).parent().parent('tr').attr('data-row-id');
		$j.ajax({ 
			type: "POST",
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'file_type_id': id, 'action': 'EDIT FILE TYPE'},  
			success: function(response)
			{
				$j('#loading_image').hide();
				$j('#editableTable-row').empty().append(response);
				$j('#myModal').show();
			}
		});
	});
		
	$j('.custom-data_page_add-court #editableTable').on('click', 'a.editable-col', function() {
		$j('#loading_image').show();
		var id = $j(this).parent().parent('tr').attr('data-row-id');
		$j.ajax({ 
			type: "POST",
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'court_id': id, 'action': 'EDIT COURT'},  
			success: function(response)
			{
				$j('#loading_image').hide();
				$j('#editableTable-row').empty().append(response);
				$j('#myModal').show();
			}
		});
	});
	
	$j('.custom-data_page_add-room #editableTable').on('click', 'a.editable-col', function() {
		$j('#loading_image').show();
		var id = $j(this).parent().parent('tr').attr('data-row-id');
		$j.ajax({ 
			type: "POST",
			url: "/wordpress/wp-content/plugins/custom-data/ajax.php",
			cache: false,  
			data: { 'room_id': id, 'action': 'EDIT ROOM'},  
			success: function(response)
			{
				$j('#loading_image').hide();
				$j('#editableTable-row').empty().append(response);
				$j('#myModal').show();
			}
		});
	});
	
});