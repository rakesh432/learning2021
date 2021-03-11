<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-load.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-includes/wp-db.php';
global $wpdb;

if($_REQUEST['action'] == 'COURT PROVINCE') {
	
	$province_id = $_REQUEST['province_id'];
	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}district WHERE province_id = $province_id");
	if(!empty($results)){
		$options = "<option value=''>Choose District</option>";
		foreach($results as $result){
			$options .= "<option value='$result->ID'>$result->name</option>";
		}
	}
	
	echo $options;
	
}else if($_REQUEST['action'] == 'EDIT PROVINCE') {
	
	$province_id = $_REQUEST['province_id'];
	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}province WHERE ID = $province_id");
	$name = $results['0']->name;
	$html = "
	<div id='myModal' class='modal fade'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close close-popup' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>EDIT PROVINCE</h4>
				</div>
				<form method='POST' action=''>
					<div class='modal-body'>
						<fieldset>           
							<div class='form-group'>
								<label for='name_province'>Province Name:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='name_province' name='name_province' value='$name' required>
							</div>
						</fieldset>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='form_update' class='btn btn-primary' id='btnSubmit' value='$province_id'>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>";
	
	echo $html;
	
}else if($_REQUEST['action'] == 'EDIT FILE TYPE') {
	
	$file_type_id = $_REQUEST['file_type_id'];
	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}file_type WHERE ID = $file_type_id");
	$name = $results['0']->name;
	$html = "
	<div id='myModal' class='modal fade'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close close-popup' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>EDIT FILE TYPE</h4>
				</div>
				<form method='POST' action=''>
					<div class='modal-body'>
						<fieldset>           
							<div class='form-group'>
								<label for='name_file_type'>File Type Name:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='name_file_type' name='name_file_type' value='$name' required>
							</div>
						</fieldset>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='form_update' class='btn btn-primary' id='btnSubmit' value='$file_type_id'>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>";
	
	echo $html;
	
}else if($_REQUEST['action'] == 'EDIT COURT TYPE') {
	
	$court_type_id = $_REQUEST['court_type_id'];
	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}court_type WHERE ID = $court_type_id");
	$name = $results['0']->name;
	$html = "
	<div id='myModal' class='modal fade'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close close-popup' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>EDIT COURT TYPE</h4>
				</div>
				<form method='POST' action=''>
					<div class='modal-body'>
						<fieldset>           
							<div class='form-group'>
								<label for='name_file_type'>File Type Name:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='name_court_type' name='name_court_type' value='$name' required>
							</div>
						</fieldset>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='form_update' class='btn btn-primary' id='btnSubmit' value='$court_type_id'>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>";
	
	echo $html;
	
}else if($_REQUEST['action'] == 'EDIT DISTRICT') {
	
	$district_id = $_REQUEST['district_id'];
	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}district WHERE ID = $district_id");
	$name = $results['0']->name;
	$province_id = $results['0']->province_id;
	
	$provinceresults = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}province");
	$options = "<option>Choose Province</option>";
	if(!empty($provinceresults)){
		foreach($provinceresults as $result){
			$selected = '';
			if($province_id == $result->ID){
				$selected = "selected=selected";
			}
			$options .= "<option value='$result->ID' $selected>$result->name</option>";
		}
	}
	
	$html = "
	<div id='myModal' class='modal fade'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close close-popup' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>EDIT DISTRICT</h4>
				</div>
				<form method='POST' action=''>
					<div class='modal-body'>
						<fieldset>           
							<div class='form-group'>
								<label for='name_district'>Province Name:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='name_district' name='name_district' value='$name' required>
							</div>
							<div class='form-group'>
								<label for='province'>Province:<span class='required'>*</span></label>
								<select name='province_id' class='form-control' required>
									$options
								</select>
							</div>
						</fieldset>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='form_update' class='btn btn-primary' id='btnSubmit' value='$district_id'>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>";
	
	echo $html;
	
}else if($_REQUEST['action'] == 'EDIT ROOM') {
	
	$room_id = $_REQUEST['room_id'];
	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}room WHERE ID = $room_id");
	$name = $results['0']->name;
	$court_id = $results['0']->court_id;
	
	$courtresults = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}court");
	$options = "<option>Choose Court</option>";
	if(!empty($courtresults)){
		foreach($courtresults as $result){
			$selected = '';
			if($court_id == $result->ID){
				$selected = "selected=selected";
			}
			$options .= "<option value='$result->ID' $selected>$result->name</option>";
		}
	}
	
	$html = "
	<div id='myModal' class='modal fade'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close close-popup' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>EDIT ROOM</h4>
				</div>
				<form method='POST' action=''>
					<div class='modal-body'>
						<fieldset>           
							<div class='form-group'>
								<label for='name_room'>Room Name:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='name_room' name='name_room' value='$name' required>
							</div>
							<div class='form-group'>
								<label for='court_id'>Court:<span class='required'>*</span></label>
								<select name='court_id' class='form-control' required>
									$options
								</select>
							</div>
						</fieldset>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='form_update' class='btn btn-primary' id='btnSubmit' value='$district_id'>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>";
	
	echo $html;
	
}else if($_REQUEST['action'] == 'EDIT COURT') {
	
	$court_id = $_REQUEST['court_id'];
	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}court WHERE ID = $court_id");
	$name_court = $results['0']->name;
	$district_id = $results['0']->district_id;
	$email = $results['0']->email;
	$longitude = $results['0']->longitude;
	$latitude = $results['0']->latitude;
	$court_type_id = $results['0']->court_type_id;
	
	/* echo '<pre>';print_r($results['0']->district_id);echo '</pre>'; */
	
	$district_results = $wpdb->get_results("SELECT d.province_id FROM {$wpdb->prefix}province as p JOIN {$wpdb->prefix}district as d ON p.ID = d.province_id WHERE d.ID = $district_id");
	$province_id = $district_results['0']->province_id;
	
	$provinceresults = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}province");
	$options = "<option>Choose Province</option>";
	if(!empty($provinceresults)){
		foreach($provinceresults as $result){
			$selected = '';
			if($province_id == $result->ID){
				$selected = "selected=selected";
			}
			$options .= "<option value='$result->ID' $selected>$result->name</option>";
		}
	}
		
	$district_results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}district WHERE province_id = $province_id");
	$distoptions = "<option>Choose District</option>";
	if(!empty($district_results)){
		foreach($district_results as $result){
			$selected = '';
			if($district_id == $result->ID){
				$selected = "selected=selected";
			}
			$distoptions .= "<option value='$result->ID' $selected>$result->name</option>";
		}
	}
	
	$courtType_options = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}court_type");
	$optionsCourtType = "<option>Choose Court type</option>";
	if(!empty($courtType_options)){
		foreach($courtType_options as $result){
			$selected = '';
			if($court_type_id == $result->ID){
				$selected = "selected=selected";
			}
			$optionsCourtType .= "<option value='$result->ID' $selected>$result->name</option>";
		}
	}
	
	$html = "
	<div id='myModal' class='modal fade'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close close-popup' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>EDIT DISTRICT</h4>
				</div>
				<form method='POST' action=''>
					<div class='modal-body'>
						<fieldset>           
							<div class='form-group'>
								<label for='name_court'>Court Name:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='name_court' name='name_court' value='$name_court' required>
							</div>
							<div class='form-group'>
								<label for='province'>Province:<span class='required'>*</span></label>
								<select name='province_id' class='court_province form-control' required>
									$options
								</select>
							</div>
							<div class='form-group'>
								<label for='district_id'>District:<span class='required'>*</span></label>
								<select name='district_id' class='court_district form-control' required>
									$distoptions
								</select>
							</div>
							<div class='form-group'>
								<label for='email'>Email Address:<span class='required'>*</span></label>
								<input type='email' class='form-control' id='email' name='email' value='$email' required>
							</div>
							<div class='form-group'>
								<label for='longitude'>Longitude:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='longitude' name='longitude' value='$longitude' required>
							</div>
							<div class='form-group'>
								<label for='latitude'>Latitude:<span class='required'>*</span></label>
								<input type='text' class='form-control' id='latitude' name='latitude' value='$latitude' required>
							</div>
							<div class='form-group'>
								<label for='court_type_id'>Court Type:<span class='required'>*</span></label>
								<select name='court_type_id' class='form-control' required>
									$optionsCourtType
								</select>
							</div>
						</fieldset>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='form_update' class='btn btn-primary' id='btnSubmit' value='$court_id'>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>";
	
	echo $html;
	
}else if($_REQUEST['action'] == 'DELETE'){
	
	$id = $_REQUEST['id'];
	$html = "
	<div id='myModal' class='modal fade'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close close-popup' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>DELETE ROW DATA</h4>
				</div>
                <div class='modal-body'>
                    Do you realy wants to delete this ?
                </div>
                <div class='modal-footer'>
					<form method='POST' action=''>
						<button type='submit' name='form_delete' class='btn btn-primary' id='btnSubmit' value='$id'>Submit</button>
						<button class='btn btn-default close-popup' data-dismiss='modal' id='btnCancel'>Cancel</button>
					</form>
                </div>
			</div>
		</div>
	</div>";

	echo $html;
}