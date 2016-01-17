<?php
	require_once ('database.php');
	$conn = new Data_control();
	$package_show_all = $conn ->package_show_all();
	
	
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
									 <h2>Place</h2>
									
									<table class="table">
										<?php 
											$count=0;
											$i=0;
											while($i<count($package_show_all)/5)
											{
										?>
											<tr class="active">
											  <td><?php echo $package_show_all[$count+3]; ?></td>
											</tr>
										<?php
												$i++;
												$count=$count+5;
											}
										?>	
									</table>			
							</div>
						</div>
					</div>				
				</div>
			</div>
<?php
	require_once ('footer.php');
?>