<?php
	require_once ('database.php');
	$conn = new Data_control();
	$comment_show = $conn ->comment_show();
	
	
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
									 <h2>THE COMMENTS</h2>
									
										<?php 
											$count=0;
											$i=0;
											while($i<count($comment_show)/4)
											{
										?>
											<div class=" user_cell">
												<div class="col-md-10">
													<blockquote>
													  <p><?php echo $comment_show[$count+2]; ?></p>
													  <footer><cite title="Source Title"><?php echo $comment_show[$count+3]; ?></cite></footer>
													</blockquote>	
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
<?php
	require_once ('footer.php');
?>