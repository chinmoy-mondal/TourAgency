<?php
	
	if($_GET['op']=='admin' || $_GET['op']=='user')
	{
		$option= $_GET['op'];		
	}		
	else
		header("location:".'sign_in_type.php');
	
	require_once ('header.php');
	require_once ('slider.php');
	require_once ('nav.php');

?>

			<div class="row">
				<div class="col-md-12">
					<div class="padding">
						<div class="row">
							<div class="col-md-2">
								<?php
									require_once('left_padding.php');
								?>							
							</div>
							<div class="col-md-9">
								<div class="righ_pad">
									<h1>Sign in your account as <?php echo $option; ?></h1>
									
									
									<form class="form-horizontal" action="sign_in_checking.php" method="post" enctype="multipart/form-data">


									  <div class="form-group">
										<label class="control-label col-sm-3" for="Email"></label>
										<div class="col-sm-9">
										  <input type="hidden" class="form-control" required="" id="user_type" name="user_type" value="<?php echo $option; ?>" aria-describedby="Email">
										</div>
									  </div> 
									  <div class="form-group">
										<label class="control-label col-sm-3" for="Email">Email</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" required="" id="Email" name="Email" aria-describedby="Email">
										</div>
									  </div> 
									  <div class=" form-group">
										<label class="control-label col-sm-3" for="Password">Password</label>
										<div class="col-sm-9">
										  <input type="password" class="form-control" required="" id="Password" name="Password" aria-describedby="Password">
										</div>
									  </div> 	
										<div class="form-group">
											<label class="control-label col-sm-3" for="inputSuccess3"></label>
											<div class="col-sm-3">
											  <button type="submit" class="btn btn-primary">sign in</button>
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