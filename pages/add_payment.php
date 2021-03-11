<div class="col-lg-12">
<?php
	global $wpdb;
	if(isset($_REQUEST['form_submit']))
	{
		$name_province = $_REQUEST['name_province'];
		$wpdb->query( "INSERT INTO {$wpdb->prefix}province (name) VALUES ('$name_province')" );
		
		echo '<p></p><div class="alert alert-success alert-dismissible show row">
		<strong>Success!</strong> Province added successfully !.
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>';
	}
	else if(isset($_REQUEST['form_update']))
	{
		$name_province = $_REQUEST['name_province'];
		$id_row = $_REQUEST['form_update'];
		$wpdb->query( "UPDATE {$wpdb->prefix}province SET name = '$name_province' WHERE ID = $id_row" );

		echo '<p></p><div class="alert alert-success alert-dismissible show row">
		<strong>Success!</strong> Province updated successfully !.
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>';
	}
	else if(isset($_REQUEST['form_delete']))
	{
		$id_row = $_REQUEST['form_delete'];
		$results = $wpdb->query("DELETE FROM {$wpdb->prefix}province WHERE ID = $id_row");

		echo '<p></p><div class="alert alert-success alert-dismissible show row">
		<strong>Success!</strong> Province deleted successfully !.
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>';
	}

	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}province");
?>
	<h1>Add Payment</h1>
	<form method="POST" enctype="multipart/form-data" action="">
		<fieldset>           
			
			<div class="form-group">
				<label for="name_province">Amount:<span class="required">*</span></label>
				<input type="text" class="form-control" id="name_province" name="name_province" value="" required>
			</div>
			
			<div class="form-group">
				<label for="name_province">Request Status:<span class="required">*</span></label>
				<input type="text" class="form-control" id="name_province" name="name_province" value="" required>
			</div>
			
			<div class="form-group">
				<label for="name_province">Payment Status:<span class="required">*</span></label>
				<input type="text" class="form-control" id="name_province" name="name_province" value="" required>
			</div>
			<div class="form-group">
				<button type="submit" name="form_submit" class="btn btn-primary">Submit</button>
			</div>
		</fieldset>
	</form>
	
	<div id='loading_image' class='loading'></div>
	<div id='editableTable-row'></div>
	<hr><h1>List Province</h1><hr>
	<table id='editableTable' class='table table-striped table-bordered' style='width:100%'>
		<thead>
			<tr>
				<th>#ID</th>
				<th>Province Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
<?php
		if(!empty($results)){
			foreach($results as $result){
				echo "<tr data-row-id='$result->ID'>
						<td>$result->ID</td>
						<td>$result->name</td>
						<td><a class='editable-col'>Edit</a> | <a class='delete-col'>Delete</a></td>
					</tr>";
			}
		}
?>
	   </tbody>
		<tfoot>
			<tr>
				<th>#ID</th>
				<th>Province Name</th>
				<th>Action</th>
			</tr>
		</tfoot>
	</table>
</div>