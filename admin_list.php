<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
		
	if (isset($_GET['del']) && isset($_GET['del'])){
		$delete_id = $_GET['del'];		
		
		$conn = new Data_control();
		$file='img/upload/'.$_GET['pic'];
		unlink($file);
		$conn ->delete_admin($delete_id);
		
		header("location:".'admin_list.php');
	} 	
	if (isset($_GET['blc'])){
		$block_id = $_GET['blc'];		
		$conn = new Data_control();
		
		$conn ->block_user($block_id);
		header("location:".'admin_list.php');
	} 
	
	$Data_control = new Data_control();
	$admin_list = $Data_control ->admin_list_lookup();
	
	require_once ('login_header.php');
?>

			<div class="row">
				<div class="col-md-12">
					<div class="padding">
						<div class="row">
							<div class="col-md-2">
								<?php
									require_once('login_left_padding.php');
								?>							
							</div>
							<div class="col-md-9">
								<div class="righ_pad">
									  <h1>USER LIST</h1>
										<?php 
											$count=0;
											$i=0;
											while($i<count($admin_list)/10)
											{
										?>
											<div class="thumbnail user_cell">
												<div class="col-md-2">
													<div class="image_sell">
														<div class="thumbnail">
															<img src="img/upload/<?php echo $admin_list[$count+7]; ?>"  class="img-responsive img-thumbnail" alt="Responsive image">													
														</div>
													
														<p>
															<a href="admin_list.php?blc=<?php echo $admin_list[$count+1]; ?>" class="btn btn-primary" role="button">Block&nbsp</a>
														</p>
														<p>
															<a href="admin_list.php?del=<?php echo $admin_list[$count+1]; ?>&pic=<?php echo $admin_list[$count+7]; ?>" class="btn btn-success" role="button">Delete</a>
														</p>
													</div>
												</div>
												<div class="col-md-10">
													<div class="table-responsive">
													  <table class="table">
														<tr class="active">
														  <td>Name</td>
														  <td><?php echo $admin_list[$count+2]; ?></td>
														</tr>
														<tr class="success">
														  <td>Father Name</td>
														  <td><?php echo $admin_list[$count+3]; ?></td>
														</tr>
														<tr class="active">
														  <td>Gender</td>
														  <td><?php echo $admin_list[$count+4]; ?></td>
														</tr>
														<tr class="success">
														  <td>Email</td>
														  <td><?php echo $admin_list[$count+5]; ?></td>
														</tr>
														<tr class="active">
														  <td>Phone Number</td>
														  <td><?php echo $admin_list[$count+6]; ?></td>
														</tr>
														<tr class="success">
														  <td>Date of Brith</td>
														  <td><?php echo $admin_list[$count+8]; ?></td>
														</tr>
														<tr class="active">
														  <td>Address</td>
														  <td><?php echo $admin_list[$count+9]; ?></td>
														</tr>
													  </table>
													</div>
												</div>
											</div>
										<?php
												$i++;
												$count=$count+9;
											}
										?>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
<?php
	require_once ('footer.php');
?>