<?php
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
									<h1>CREATE YOUR ACCOUNT</h1>
									
									
									<form class="form-horizontal" action="registration_save.php" method="post" enctype="multipart/form-data">


									  <div class="name_status_all form-group has-feedback  has-error ">
										<label class="control-label col-sm-3" for="name">Name</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" required="" id="name" name="name" aria-describedby="name">
										  <span class="name_status glyphicon form-control-feedback glyphicon-remove" aria-hidden="true"></span>
										</div>
									  </div> 
									  <div class="father_name_status_all  form-group has-error has-feedback">
										<label class="control-label col-sm-3" for="father_name">Father Name</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" required="" id="father_name" name="father_name" aria-describedby="father_name">
										  <span class="father_name_status glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div> 
									  <div class="form-group has-success has-feedback">
										<label class="control-label col-sm-3" for="Gender">Gender</label>
										<div class="col-sm-9">
										    <select class="form-control" name="Gender" required="">
											  <option value="Male">Male</option>
											  <option value="Female">Female</option>
											</select>
											<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div>
									  <div class="email_status_all form-group has-error has-feedback">
										<label class="control-label col-sm-3" for="email">Email Address</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" required="" id="email" name="email" aria-describedby="email">
										  <span class="email_status glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div> 
									  
									  <div class="date_of_birth_status_all form-group has-error  has-feedback">
										<label class="control-label col-sm-3" for="inputSuccess3">Date of Brith</label>
										<div class="col-sm-2">
										    <select name="year" class="form-control year" required="">
											<?php
											for($i=2020;$i>=1950;$i--)
											{
											?>	
											<option value='<?php echo $i; ?>'><?php echo $i; ?></option>
											<?php	
											}											
											?>
											</select>
										</div>
										
										<label class="col-sm-1" for="inputSuccess3">-</label>
										<div class="col-sm-2">
										    <select name="month" class="form-control month" required="">
											<?php
											for($i=0;$i<=12;$i++)
											{
											?>	
											<option value='<?php echo $i; ?>'><?php echo $i; ?></option>
											<?php	
											}											
											?>
											</select>
										</div>
										<label class="col-sm-1" for="inputSuccess3">-</label>
										<div class="col-sm-2">
										    <select name="day" class="form-control date_select" required="">
											

											</select>
											<span class="date_status glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div>
									  <div class="phone_status_all form-group has-error has-feedback">
										<label class="control-label col-sm-3" for="phone">Phone Number</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" name="phone" required="" id="phone" aria-describedby="phone">
										  <span class="phone_status glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div> 
									  <div class="form-group">
										<label class="control-label col-sm-3" for="file">Photography</label>
										<div class="col-sm-9">
										  <input type="file" name="file" id="exampleInputFile">
										</div>
									  </div> 
									  <div class="address_status_all form-group has-error has-feedback">
										<label class="control-label col-sm-3" for="address">Address</label>
										<div class="col-sm-9">
										  <textarea  class="form-control" required="" id="address" name="address" aria-describedby="address"></textarea>
										  <span class="address_status glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div> 
									  <div class="form-group has-success has-feedback">
										<label class="control-label col-sm-3" for="user_type">Type of User</label>
										<div class="col-sm-9">
										    <select class="form-control" name="user_type" required="">
											  <option value="tourist">Tourist</option>
											  <option value="admin">Admin</option>
											</select>
											<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div>
									  <div class="password_status_all form-group has-error has-feedback">
										<label class="control-label col-sm-3" for="password">Password</label>
										<div class="col-sm-9">
										  <input type="password" class="form-control" required="" name="password" id="password" aria-describedby="password">
										  <span class="password_status glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div>
									  <div class="password_conform_status_all form-group has-error has-feedback">
										<label class="control-label col-sm-3" for="password_conform">Conform Password</label>
										<div class="col-sm-9">
										  <input type="password" name="password_conform" class="form-control" required="" id="password_conform" aria-describedby="password_conform">
										  <span class="password_conform_status glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
										</div>
									  </div>
									  <div class="form-group has-error has-feedback">
										<label class="control-label col-sm-3" for="inputSuccess3"></label>
										<div class="col-sm-9">
										  <input id="checked" type="checkbox" required="" name="check">
										  <label for="checked">I acept the rule of the organization.</label> <a href="rules.php">Read Rules</a>
										</div>
									  </div> 
										<div class="form-group">
											<label class="control-label col-sm-3" for="inputSuccess3"></label>
											<div class="col-sm-3">
											  <button type="submit" class="btn btn-primary submit_test" disabled="disabled">Create Account</button>
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