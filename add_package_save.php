<?php
	session_start();
	require_once ('database.php');
	if ($_SESSION['Email']==null && $_SESSION['password']==null && $_SESSION['option']==null)
	{		
		header("location:".'sign_in_type.php');
	}
	
	$Data_control = new Data_control();


	if(isset($_POST["toure_name"]) && isset($_POST["tour_place"]) && isset($_POST["toure_date"]) && isset($_POST["toure_starts"]) && isset($_POST["toure_duration"]) && isset($_POST["transport_system"]) && isset($_POST["hotel_reservation"]) && isset($_POST["weather"]) && isset($_POST["prequation"]) && isset($_POST["medical_support"]) && isset($_POST["price"]))
	{	
		$toure_name			=$_POST["toure_name"];
		$tour_place			=$_POST["tour_place"];
		$toure_date			=$_POST["toure_date"];
		$toure_starts		=$_POST["toure_starts"];
		$toure_duration		=$_POST["toure_duration"];
		$transport_system	=$_POST["transport_system"];
		$hotel_reservation	=$_POST["hotel_reservation"];
		$weather			=$_POST["weather"];
		$prequation			=$_POST["prequation"];
		$medical_support	=$_POST["medical_support"];
		$price				=$_POST["price"];
		
		$last_ID=0;
		$last_ID = $Data_control ->last_ID_check();
		$last_ID++;
	
		if ( (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 1048576000)){				
			if ($_FILES["file"]["error"] > 0){
				header("location:".'add_package.php');
			}
			else{					
				$picture_name = $last_ID;
				$picture_type=$_FILES["file"]["name"];
				$picture_type = explode('.', $picture_type);
				$total_picture_name = $picture_name.'.'.$picture_type[1];
				if (file_exists("img/upload_package/" .$picture_name)){
					echo $picture_name . " already exists. ";
				}
				else{
					move_uploaded_file($_FILES["file"]["tmp_name"],"img/upload_package/" . $picture_name.'.'.$picture_type[1]);
					
					$Data_control ->add_package($last_ID,$toure_name,$tour_place,$toure_date,$toure_starts,$toure_duration,$transport_system,$hotel_reservation,$weather,$prequation,$medical_support,$price,$total_picture_name);
					
				}
			}
		}
		else{
			header("location:".'add_package.php');
		}
	}
	else{
		header("location:".'add_package.php');			
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
									  <h2>NEW PACKAGE ADD SUCCESSFULY</h2>	
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
<?php
	require_once ('footer.php');
?>