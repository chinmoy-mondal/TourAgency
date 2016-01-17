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
		$conn ->delete_user($delete_id);
		
		header("location:".'new_user.php');
	} 	
	if (isset($_GET['act'])){
		$permit_id = $_GET['act'];		
		$conn = new Data_control();
		
		$conn ->permit_user($permit_id);
		header("location:".'new_user.php');
	} 
	
	$Data_control = new Data_control();
	$new_user = $Data_control ->new_user_lookup();
	
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
									  <h1>NEW APPLIDE USER</h1>
										<?php 
											$count=0;
											$i=0;
											while($i<count($new_user)/10)
											{
										?>
											<div class="thumbnail user_cell">
												<div class="col-md-2">
													<div class="image_sell">
														<div class="thumbnail">
															<img src="img/upload/<?php echo $new_user[$count+7]; ?>"  class="img-responsive img-thumbnail" alt="Responsive image">													
														</div>
													
														<p>
															<a href="new_user.php?act=<?php echo $new_user[$count+1]; ?>" class="btn btn-primary" role="button">Active</a>
														</p>
														<p>
															<a href="new_user.php?del=<?php echo $new_user[$count+1]; ?>&pic=<?php echo $new_user[$count+7]; ?>" class="btn btn-success" role="button">Delete</a>
														</p>
													</div>
												</div>
												<div class="col-md-10">
													<div class="table-responsive">
													  <table class="table">
														<tr class="active">
														  <td>Name</td>
														  <td><?php echo $new_user[$count+2]; ?></td>
														</tr>
														<tr class="success">
														  <td>Father Name</td>
														  <td><?php echo $new_user[$count+3]; ?></td>
														</tr>
														<tr class="active">
														  <td>Gender</td>
														  <td><?php echo $new_user[$count+4]; ?></td>
														</tr>
														<tr class="success">
														  <td>Email</td>
														  <td><?php echo $new_user[$count+5]; ?></td>
														</tr>
														<tr class="active">
														  <td>Phone Number</td>
														  <td><?php echo $new_user[$count+6]; ?></td>
														</tr>
														<tr class="success">
														  <td>Date of Brith</td>
														  <td><?php echo $new_user[$count+8]; ?></td>
														</tr>
														<tr class="active">
														  <td>Address</td>
														  <td><?php echo $new_user[$count+9]; ?></td>
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