<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
		
	if (isset($_GET['del']) && isset($_GET['del'])){
		$delete_id = $_GET['del'];		
		
		$conn = new Data_control();
		$file='img/upload/'.$_GET['pic'];
		unlink($file);
		$conn ->delete_admin($delete_id);
		
		header("location:".'admin_list.php');
	} 	
	if (isset($_GET['blc'])){
		$block_id = $_GET['blc'];		
		$conn = new Data_control();
		
		$conn ->block_user($block_id);
		header("location:".'admin_list.php');
	} 
	
	$Data_control = new Data_control();
	$admin_list = $Data_control ->admin_list_lookup();
	
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
						  <h1>USER LIST</h1>
							
						<form class="form-horizontal" action="add_package_save.php" method="post" enctype="multipart/form-data">


							<div class="form-group">
								<label class="control-label col-sm-3" for="toure_name">Toure name</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="toure_name" name="toure_name">
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="tour_place">Toure Place</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="tour_place" name="tour_place" >
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="toure_date">Toure Date</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="datepicker" name="toure_date" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="toure_starts">Toure Starts At</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="toure_starts" name="toure_starts">
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="toure_duration">Toure Duration</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="toure_duration" name="toure_duration">
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="transport_system">Transport System</label>
								<div class="col-sm-9">
								  <textarea class="form-control" name="transport_system" id="transport_system" cols="30" rows="5"></textarea>
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="hotel_reservation">Hotel Reservation</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="hotel_reservation" name="hotel_reservation">
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="weather">Weather</label>
								<div class="col-sm-9">
								  <textarea class="form-control" name="weather" id="weather" cols="30" rows="5"></textarea>
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="prequation">Prequation</label>
								<div class="col-sm-9">
								  <textarea class="form-control" name="prequation" id="prequation" cols="30" rows="5"></textarea>
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="medical_support">Medical Support</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="medical_support" name="medical_support">
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="picture">Picture</label>
								<div class="col-sm-9">
								  <input type="file" required="" id="file" name="file">
								</div>
							</div> 
							<div class="form-group">
								<label class="control-label col-sm-3" for="price">Price</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" required="" id="price" name="price">
								</div>
							</div> 						
							<div class="form-group">
								<label class="control-label col-sm-3" for="inputSuccess3"></label>
								<div class="col-sm-3">
								  <button type="submit" class="btn btn-primary submit_test" >Add Package</button>
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