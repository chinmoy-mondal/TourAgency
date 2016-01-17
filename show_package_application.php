<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
		
	if (isset($_GET['application'])){
		$application_package_id = $_GET['application'];
		
		$Data_control = new Data_control();
		$applide_user_list=$Data_control ->application_package_package($application_package_id);
	} 
		
	if ($_GET['act_package_id'] != null &&  $_GET['act_email'] != null){
		$application_package=$_GET['application_package'];
		$Data_control = new Data_control();
		$applide_user_list=$Data_control ->give_permission_package($_GET['act_package_id'],$_GET['act_email']);
		header("location:".'show_package_application.php?application='.$application_package);
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
									  <h1>Applicant List Who Apply for Package ID <?php echo $applide_user_list[$count+1]; ?></h1>
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
												<div class="col-md-8">
													<div class="table-responsive">
													  <table class="table">
														<tr class="success">
														  <td>Tourist Name</td>
														  <td><?php echo $applide_user_list[$count+2]; ?></td>
														</tr>
														<tr class="active">
														  <td>Tourist Email</td>
														  <td><?php echo $applide_user_list[$count+3]; ?></td>
														</tr>
														<tr class="success">
														  <td>Phone Number</td>
														  <td><?php echo $applide_user_list[$count+4]; ?></td>
														</tr>
													  </table>
													</div>
												</div>
												<div class="col-md-2">
												
															<p><a href="show_package_application.php?act_package_id=<?php echo $applide_user_list[$count+1]; ?>&act_email=<?php echo $applide_user_list[$count+3]; ?>&application_package=<?php echo $_GET['application']; ?>" class="btn btn-success" role="button">Active</a></p>
															<p><a href="show_package_application.php?del_package_id=<?php echo $applide_user_list[$count+1]; ?>&del_email=<?php echo $applide_user_list[$count+3]; ?>" class="btn btn-danger" role="button">Delete</a></p>
															
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