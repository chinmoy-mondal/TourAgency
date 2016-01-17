<?php
	session_start();
	require_once ('database.php');
	$Data_control = new Data_control();
	
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
	if(isset($_GET['act']) )
	{	
		$Data_control ->comment_act($_GET['act']);
	
		header("location:".'comment.php');
	}
	if(isset($_GET['blc']) )
	{	
		$Data_control ->comment_blc($_GET['blc']);
	
		header("location:".'comment.php');
	}
	if(isset($_GET['del']) )
	{	
		$Data_control ->comment_del($_GET['del']);
	
		header("location:".'comment.php');
	}
	
	
	$package_list = $Data_control ->comment();
	
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
									 <h2>THE COMMENTS</h2>
									
										<?php 
											$count=0;
											$i=0;
											while($i<count($package_list)/4)
											{
										?>
											<div class="thumbnail user_cell">
												<div class="col-md-10">
													<blockquote>
													  <p><?php echo $package_list[$count+2]; ?></p>
													  <footer><cite title="Source Title"><?php echo $package_list[$count+3]; ?></cite></footer>
													</blockquote>	
												</div>												
												<div class="col-md-2">
													<div class="image_sell">
														<?php if($package_list[$count+4]==0) {?>
														<p><a href="comment.php?act=<?php echo $package_list[$count+1]; ?>" class="btn btn-success" role="button">Active&nbsp;</a>	</p>
														<?php } else { ?>
														<p><a href="comment.php?blc=<?php echo $package_list[$count+1]; ?>" class="btn btn-info" role="button">Block&nbsp;&nbsp;</a>	</p>
														<?php } ?>
														<p><a href="comment.php?del=<?php echo $package_list[$count+1]; ?>" class="btn btn-danger" role="button">Delete</a></p>
													</div>
												</div>
											</div>
										<?php
												$i++;
												$count=$count+4;
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