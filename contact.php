<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
	
	$conn = new Data_control();
		
	
	if (isset($_POST['contact']))
	{	
		$contact = $conn ->contact($_POST['contact']);
		header("location:".'contact.php');
	} 
	$contact = $conn ->contact_show();
	
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
									 <h2>SET CONTACT</h2>	
							
									<form class="form-horizontal" action="contact.php" method="post" enctype="multipart/form-data">


										<div class="form-group">
											<label class="control-label col-sm-3" for="contact">contact</label>
											<div class="col-sm-9">
											  <textarea class="form-control" required="" name="contact" id="" cols="30" rows="10"><?php echo $contact; ?></textarea>
											</div>
										</div> 			
										<div class="form-group">
											<label class="control-label col-sm-3" for="inputSuccess3"></label>
											<div class="col-sm-3">
											  <button type="submit" class="btn btn-primary submit_test" >Publish Comment</button>
											</div>
										</div>
									  
									</form>										
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
<?php
	require_once ('footer.php');
?>