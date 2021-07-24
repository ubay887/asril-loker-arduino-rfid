<?php

include_once('config.php');
$user_fun = new Userfunction();
$counter = 1;

if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){

	$keyword = $user_fun->htmlvalidation($_POST['keyword']);

	$match_field['u_name'] = $keyword;
	$match_field['u_email'] = $keyword;
	$select = $user_fun->search("user", $match_field, "OR");

}
else{

	$select = $user_fun->select("user");

}


?>
		<div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-body p-0 pb-3 text-center" style="overflow-y:auto;">

				<table class="table table-striped data">
				  <thead class="bg-light">
					<tr class="table-primary">
					  	<th scope="col">#</th>
					  	<th scope="col">Nama</th>
					  	<th scope="col">Email</th>
						<th scope="col">Jenis Kelamin</th>
					  	<th scope="col">Id Tag</th>
						<th scope="col">No Hp</th>
						<th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
				  	<?php if($select){ foreach($select as $se_data){ ?>
					<tr>
					  <th scope="row"><?php echo $counter; $counter++; ?></th>
					  	<td><?php echo $se_data['u_name']; ?></td>
					  	<td><?php echo $se_data['u_email']; ?></td>
					  	<td><?php echo $se_data['u_gender']; ?></td>
						<td><?php echo $se_data['id_tag']; ?></td>
						<td><?php echo $se_data['no_hp']; ?></td>
						<td>
							<button type="button" class="btn btn-warning editdata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#updateModalCenter" title="Edit"><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger deletedata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#deleteModalCenter" title="Hapus"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<?php }}else{ echo "<tr><td colspan='7'><h2>No Result Found</h2></td></tr>"; } ?>
				  </tbody>
				</table>	
				</div>
                </div>
              </div>
            </div>