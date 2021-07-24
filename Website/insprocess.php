<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['tag']) && isset($_POST['nohp']) && isset($_POST['jeniskelamin'])){

		$nama = $user_fun->htmlvalidation($_POST['nama']);
		$email = $user_fun->htmlvalidation($_POST['email']);
		$tag = $user_fun->htmlvalidation($_POST['tag']);
		$nohp = $user_fun->htmlvalidation($_POST['nohp']);
		$gender = $user_fun->htmlvalidation($_POST['jeniskelamin']);

		if((!preg_match('/^[ ]*$/', $nama)) && (!preg_match('/^[ ]*$/', $email)) && (!preg_match('/^[ ]*$/', $tag)) && (!preg_match('/^[ ]*$/', $gender)) && ($nohp != NULL)){

			$field_val['u_name'] = $nama;
			$field_val['u_email'] = $email;
			$field_val['u_gender'] = $gender;
			$field_val['id_tag'] = $tag;
			$field_val['no_hp'] = $nohp;	

			$insert = $user_fun->insert("user", $field_val);

			if($insert){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Inserted";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Inserted";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $nama)){

				$json['status'] = 103;
				$json['msg'] = "Masukan Nama";

			}
			if(preg_match('/^[ ]*$/', $email)){

				$json['status'] = 104;
				$json['msg'] = "Masukan Email";

			}
			if(preg_match('/^[ ]*$/', $tag)){

				$json['status'] = 105;
				$json['msg'] = "Masukan Id Tag";

			}
			if(preg_match('/^[ ]*$/', $gender)){

				$json['status'] = 106;
				$json['msg'] = "Masukan Jenis Kelamin";

			}
			if($nohp == NULL){

				$json['status'] = 107;
				$json['msg'] = "Masukan No hp";

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