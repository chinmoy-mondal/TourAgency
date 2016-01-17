<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}


	$Data_control = new Data_control();
	$reservation = $Data_control ->reservation($_SESSION['Email']);
	
	
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
									  <h2>LOGIN SUCCESSFULY</h2>	
										<?php 
											$count=0;
											$i=0;
											while($i<count($reservation)/13)
											{
										?>
											<div class="thumbnail user_cell">
												<div class="col-md-6">
													<div class="image_sell">
														<div class="thumbnail">
															<img src="img/upload_package/<?php echo $reservation[$count+13]; ?>"  class="img-responsive img-thumbnail" alt="Responsive image">
														</div>
														
													</div>
												</div>
												<div class="col-md-6">
													<div class="table-responsive">
													  <table class="table">
														<tr class="active">
														  <td>Package ID</td>
														  <td><?php echo $reservation[$count+1]; ?></td>
														</tr>
														<tr class="success">
														  <td>Toure Name</td>
														  <td><?php echo $reservation[$count+2]; ?></td>
														</tr>
														<tr class="active">
														  <td>Toure Place</td>
														  <td><?php echo $reservation[$count+3]; ?></td>
														</tr>
														<tr class="success">
														  <td>Toure Date</td>
														  <td><?php echo $reservation[$count+4]; ?></td>
														</tr>
														<tr class="active">
														  <td>Toure Starts</td>
														  <td><?php echo $reservation[$count+5]; ?></td>
														</tr>
														<tr class="success">
														  <td>Toure Duration</td>
														  <td><?php echo $reservation[$count+6]; ?></td>
														</tr>
														<tr class="active">
														  <td>Transport System</td>
														  <td><?php echo $reservation[$count+7]; ?></td>
														</tr>
														<tr class="success">
														  <td>Prequation</td>
														  <td><?php echo $reservation[$count+10]; ?></td>
														</tr>
														<tr class="active">
														  <td>Price</td>
														  <td><?php echo $reservation[$count+12]; ?></td>
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