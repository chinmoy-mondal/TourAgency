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
									<h1>SIGN IN YOUR ACCOUNT AS</h1>
									
									<div class="login_type">
										<a class="btn btn-primary" href="sign_in.php?op=user">USER</a>
										<a class="btn btn-success" href="sign_in.php?op=admin">ADMIN</a>
									</div>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
<?php
	require_once ('footer.php');
?>