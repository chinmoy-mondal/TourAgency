<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
		
	if (isset($_GET['tourist_package_id'])){
		$application_package_id = $_GET['tourist_package_id'];
		
		$Data_control = new Data_control();
		$applide_user_list=$Data_control ->show_filan_tourist_list($application_package_id);
	} 
		
	
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
									  <h1>Who Get Permission for Package ID <?php echo $applide_user_list[$count+1]; ?></h1>
										<?php 
											$count=0;
											$i=0;
											while($i<count($applide_user_list)/5)
											{
										?>
											<div class="thumbnail user_cell">
												<div class="col-md-2">
													<div class="image_sell">
														<div class="thumbnail">
															<img src="img/upload/<?php echo $applide_user_list[$count+5]; ?>"  class="img-responsive img-thumbnail" alt="Responsive image">													
														</div>
													</div>
												</div>
												<div class="col-md-10">
													<div class="table-responsive">
													  <table class="table">
														<tr class="success">
														  <td>Tourist Number</td>
														  <td><?php echo $i+1; ?></td>
														</tr>
														<tr class="active">
														  <td>Tourist Name</td>
														  <td><?php echo $applide_user_list[$count+2]; ?></td>
														</tr>
														<tr class="success">
														  <td>Tourist Email</td>
														  <td><?php echo $applide_user_list[$count+3]; ?></td>
														</tr>
														<tr class="active">
														  <td>Phone Number</td>
														  <td><?php echo $applide_user_list[$count+4]; ?></td>
														</tr>
													  </table>
													</div>
												</div>
												<div class="col-md-2">
												</div>
											</div>
										<?php
												$i++;
												$count=$count+5;
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