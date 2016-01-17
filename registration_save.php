<?php
	require_once ('database.php');


	if(isset($_POST["name"]) && isset($_POST["father_name"]) && isset($_POST["Gender"]) && isset($_POST["email"]) && isset($_POST["year"]) && isset($_POST["month"]) && isset($_POST["day"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["user_type"]) && isset($_POST["password"]) && isset($_POST["password_conform"]) && isset($_POST["password"]) == isset($_POST["password_conform"]))
	{	
		$name			=$_POST["name"];
		$father_name	=$_POST["father_name"];
		$gender			=$_POST["Gender"];
		$email			=$_POST["email"];
		$year			=$_POST["year"];
		$month			=$_POST["month"];
		$day			=$_POST["day"];
		$phone_number	=$_POST["phone"];
		$address		=$_POST["address"];
		$user_type		=$_POST["user_type"];
		$password		=$_POST["password"];
		$password_c		=$_POST["password_conform"];
		
		
		
		
		$Data_control = new Data_control();
		$email_varification_ans = $Data_control->email_varification($email);
		if($email_varification_ans == 0)
		{
			if ( (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 1048576000)){				
				if ($_FILES["file"]["error"] > 0){
					header("location:".'registration.php');
				}
				else{					
					$picture_name = $email;
					$picture_type=$_FILES["file"]["name"];
					$picture_type = explode('.', $picture_type);
					$total_picture_name = $picture_name.'.'.$picture_type[1];
					if (file_exists("img/upload/" .$picture_name)){
						echo $picture_name . " already exists. ";
					}
					else{
						move_uploaded_file($_FILES["file"]["tmp_name"],"img/upload/" . $picture_name.'.'.$picture_type[1]);
						
						$Data_control = new Data_control();
						$Data_control ->user_registration($name,$father_name,$gender,$email,$year,$month,$day,$phone_number,$address,$user_type,$password,$total_picture_name);
					}
				}
			}
			else{
				header("location:".'registration.php');
			}
		}
		else{
			header("location:".'registration.php');			
		}
	}
	else{
		header("location:".'registration.php');			
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
									<h2>Successfully saved your information</h2>
									
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
<?php
	require_once ('footer.php');
?>