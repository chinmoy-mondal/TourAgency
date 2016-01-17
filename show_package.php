<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
		
	if (isset($_GET['del']) && isset($_GET['pic'])){
		$delete_id = $_GET['del'];		
		
		$conn = new Data_control();
		$file='img/upload_package/'.$_GET['pic'];
		unlink($file);
		$conn ->delete_package($delete_id);
		
		header("location:".'show_package.php');
	} 	
	
	$Data_control = new Data_control();
	$package_list = $Data_control ->package_list_lookup();
	
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
									  <h1>Package LIST</h1>
										<?php 
											$count=0;
											$i=0;
											while($i<count($package_list)/13)
											{
										?>
											<div class="thumbnail user_cell">
												<div class="col-md-6">
													<div class="image_sell">
														<div class="thumbnail">
															<img src="img/upload_package/<?php echo $package_list[$count+13]; ?>"  class="img-responsive img-thumbnail" alt="Responsive image">													
														</div>
															<a href="show_package_application.php?application=<?php echo $package_list[$count+1]; ?>" class="btn btn-success" role="button">Application List</a>															
															<a href="show_tourist_final.php?tourist_package_id=<?php echo $package_list[$count+1]; ?>" class="btn btn-success" role="button">Touris Final List</a>
															<a href="show_package.php?del=<?php echo $package_list[$count+1]; ?>&pic=<?php echo $package_list[$count+13]; ?>" class="btn btn-danger" role="button">Delete</a>
														
													</div>
												</div>
												<div class="col-md-6">
													<div class="table-responsive">
													  <table class="table">
														<tr class="active">
														  <td>Package ID</td>
														  <td><?php echo $package_list[$count+1]; ?></td>
														</tr>
														<tr class="success">
														  <td>Toure Name</td>
														  <td><?php echo $package_list[$count+2]; ?></td>
														</tr>
														<tr class="active">
														  <td>Toure Place</td>
														  <td><?php echo $package_list[$count+3]; ?></td>
														</tr>
														<tr class="success">
														  <td>Toure Date</td>
														  <td><?php echo $package_list[$count+4]; ?></td>
														</tr>
														<tr class="active">
														  <td>Toure Starts</td>
														  <td><?php echo $package_list[$count+5]; ?></td>
														</tr>
														<tr class="success">
														  <td>Toure Duration</td>
														  <td><?php echo $package_list[$count+6]; ?></td>
														</tr>
														<tr class="active">
														  <td>Transport System</td>
														  <td><?php echo $package_list[$count+7]; ?></td>
														</tr>
														<tr class="success">
														  <td>Hotel Reservaion</td>
														  <td><?php echo $package_list[$count+8]; ?></td>
														</tr>
														<tr class="active">
														  <td>Weather</td>
														  <td><?php echo $package_list[$count+9]; ?></td>
														</tr>
														<tr class="success">
														  <td>Prequation</td>
														  <td><?php echo $package_list[$count+10]; ?></td>
														</tr>
														<tr class="active">
														  <td>Medical Support</td>
														  <td><?php echo $package_list[$count+11]; ?></td>
														</tr>
														<tr class="success">
														  <td>Price</td>
														  <td><?php echo $package_list[$count+12]; ?></td>
														</tr>
													  </table>
													</div>
												</div>
											</div>
										<?php
												$i++;
												$count=$count+13;
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