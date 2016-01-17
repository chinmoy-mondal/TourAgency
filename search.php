<?php
	require_once ('database.php');
	$conn = new Data_control();
	
	if(isset($_POST['search']))
	{
		$search_result = $conn ->search($_POST['search']);
	}	
	
	
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
									 <h2>Package</h2>
									
										<?php 
											$count=0;
											$i=0;
											while($i<count($search_result)/5)
											{
										?>
										<table class="table">
											<tr class="active">
											  <td>Package Name</td>
											  <td><?php echo $search_result[$count+1]; ?></td>
											</tr>
											<tr class="success">
											  <td>Toure Date</td>
											  <td><?php echo $search_result[$count+2]; ?></td>
											</tr>
											<tr class="active">
											  <td>Toure Duration</td>
											  <td><?php echo $search_result[$count+3]; ?></td>
											</tr>
											<tr class="success">
											  <td>Toure Price</td>
											  <td><?php echo $search_result[$count+4]; ?></td>
											</tr>
											<br /><br /><br />
										</table>
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
<?php
	require_once ('footer.php');
?>