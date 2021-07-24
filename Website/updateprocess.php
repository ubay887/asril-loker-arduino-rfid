<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['checkid']) && $_GET['checkid'] > 0){

		$update_ch_id = $user_fun->htmlvalidation($_GET['checkid']);

		$condition0['u_id'] = $update_ch_id;
		$select_pre = $user_fun->select_assoc("user", $condition0);

		if($select_pre){

			$json['status'] = 0;
			$json['nama'] = $select_pre['u_name'];
			$json['email'] = $select_pre['u_email'];
			$json['tag'] = $select_pre['id_tag'];
			$json['nohp'] = $select_pre['no_hp'];
			$json['jeniskelamin'] = $select_pre['u_gender'];
			$json['msg'] = "Success";

		}
		else{

			$json['status'] = 1;
			$json['nama'] = "NULL";
			$json['email'] = "NULL";
			$json['tag'] = "NULL";
			$json['nohp'] = "NULL";
			$json['jeniskelamin'] = "NULL";
			$json['msg'] = "Fail";

		}

	}
	else{
			$json['status'] = 2;
			$json['nama'] = "NULL";
			$json['email'] = "NULL";
			$json['tag'] = "NULL";
			$json['nohp'] = "NULL";
			$json['jeniskelamin'] = "NULL";
			$json['msg'] = "Invalid Values Passed";
	}
}
else{
			$json['status'] = 3;
			$json['nama'] = "NULL";
			$json['email'] = "NULL";
			$json['tag'] = "NULL";
			$json['nohp'] = "NULL";
			$json['jeniskelamin'] = "NULL";
			$json['msg'] = "Invalid Method Found";
}


echo json_encode($json);

?>