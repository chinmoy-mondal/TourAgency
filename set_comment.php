<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
	
	
	if (isset($_POST['comment']) && isset($_POST['comment_by']))
	{	
		$conn = new Data_control();
		
		$conn ->set_comment($_POST['comment'],$_POST['comment_by']);
		header("location:".'comment.php');
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
									 <h2>SET COMMENT</h2>	
							
									<form class="form-horizontal" action="set_comment.php" method="post" enctype="multipart/form-data">


										<div class="form-group">
											<label class="control-label col-sm-3" for="comment">COMMENT</label>
											<div class="col-sm-9">
											  <input type="text" class="form-control" required="" id="comment" name="comment">
											</div>
										</div> 
										<div class="form-group">
											<label class="control-label col-sm-3" for="comment_by">Comment By</label>
											<div class="col-sm-9">
											  <input type="text" class="form-control" required="" id="comment_by" name="comment_by" >
											</div>
										</div> 				
										<div class="form-group">
											<label class="control-label col-sm-3" for="inputSuccess3"></label>
											<div class="col-sm-3">
											  <button type="submit" class="btn btn-primary submit_test" >Publish Comment</button>
											</div>
											<div class="col-sm-2">
											  <button type="reset" class="btn btn-info">Reset</button>
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