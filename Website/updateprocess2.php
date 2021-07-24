<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['tag']) && isset($_POST['nohp']) && isset($_POST['jeniskelamin']) && isset($_POST['dataval'])){

		$nama = $user_fun->htmlvalidation($_POST['nama']);
		$email = $user_fun->htmlvalidation($_POST['email']);
		$tag = $user_fun->htmlvalidation($_POST['tag']);
		$nohp = $user_fun->htmlvalidation($_POST['nohp']);
		$gender = $user_fun->htmlvalidation($_POST['jeniskelamin']);
		$update_id = $user_fun->htmlvalidation($_POST['dataval']);

		if((!preg_match('/^[ ]*$/', $nama)) && (!preg_match('/^[ ]*$/', $email)) && (!preg_match('/^[ ]*$/', $tag)) && (!preg_match('/^[ ]*$/', $gender)) && ($nohp != NULL)){

			$condition['u_id'] = $update_id;

			$field_val['u_name'] = $nama;
			$field_val['u_email'] = $email;
			$field_val['u_gender'] = $gender;
			$field_val['id_tag'] = $tag;
			$field_val['no_hp'] = $nohp;	

			$update = $user_fun->update("user", $field_val, $condition);

			if($update){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Updated";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Updated";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $nama)){

				$json['status'] = 103;
				$json['msg'] = "Please Enter Username";

			}
			if(preg_match('/^[ ]*$/', $email)){

				$json['status'] = 104;
				$json['msg'] = "Please Enter Email";

			}
			if(preg_match('/^[ ]*$/', $tag)){

				$json['status'] = 105;
				$json['msg'] = "Please Select Country";

			}
			if(preg_match('/^[ ]*$/', $gender)){

				$json['status'] = 106;
				$json['msg'] = "Please Choice Gender";

			}
			if($nohp == NULL){

				$json['status'] = 107;
				$json['msg'] = "Please Enter BOD";

			}

		}

	}
	else{

		$json['status'] = 108;
		$json['msg'] = "Invalid Values Passed";

	}

}
else{

	$json['status'] = 109;
	$json['msg'] = "Invalid Method Found";

}


echo json_encode($json);

?>