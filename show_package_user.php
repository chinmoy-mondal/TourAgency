<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
		
	if (isset($_GET['apply'])){	
		$conn = new Data_control();
		$conn ->apply_package($_GET['apply'],$_SESSION['Email']);
		
		header("location:".'show_package_user.php');
	} 	
			
	if (isset($_GET['cancel'])){	
		$conn = new Data_control();
		$conn ->cancle_booking($_GET['cancel'],$_SESSION['Email']);
		
		header("location:".'show_package_user.php');
	} 	
	
	$Data_control = new Data_control();
	$package_list = $Data_control ->package_list_lookup();	
	$application_status = $Data_control ->application_check_lookup($_SESSION['Email']);
	
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
														
														<?php 
															$count_next=0;
															$i_next=0;															
															$apply_flag=1;
															while($i_next<count($application_status)/2)
															{
																
																if($application_status[$count_next+1]==$package_list[$count+1] && $application_status[$count_next+2]==$_SESSION['Email'])
																{
																	$apply_flag=0;
																	$i_next=count($application_status);
																}
																else
																{
																	$apply_flag=1;
																}
																$i_next++;
																$count_next=$count_next+2;
															}
															
															
															if($apply_flag==0)
															{
														?>														
																<a href="show_package_user.php?cancel=<?php echo $package_list[$count+1]; ?>" class="btn btn-danger" role="button">Cancel Booking</a>
														<?php 
															}
															else
															{
														?>
																<a href="show_package_user.php?apply=<?php echo $package_list[$count+1]; ?>" class="btn btn-success" role="button">Apply</a>
														<?php 
															}															
															$count_next=0;
															$i_next=0;
														?>
														
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