			<div class="row">
				<div class="col-md-12">
					<div class="upper_footer">
						<div class="row">
							<div class="col-md-4">
								<div class="body_footer">
									<h3>Upcomming 5 Toure</h3>
									<ul>
										<?php 
											$count=0;
											$i=0;
											while($i<count($package_date_show_footer)/1)
											{
										?>
										<li><a href="package.php"><?php echo $package_date_show_footer[$count+1]; ?></a></li>
										<?php
												if($i<=5)
												{
													$i++;												
												}
												else
												{
													$i=count($package_date_show_footer)/1;
												}
												$count=$count+1;
											}
										?>
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="body_footer">
									<h3>5 places</h3>
									<ul>
										<?php 
											$count=0;
											$i=0;
											while($i<count($place_show_footer)/1)
											{
										?>
										<li><a href="package.php"><?php echo $place_show_footer[$count+1]; ?></a></li>
										<?php
												if($i<=5)
												{
													$i++;												
												}
												else
												{
													$i=count($place_show_footer)/1;
												}
												$count=$count+1;
											}
										?>
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="body_footer">
									<h3>Recent 5 package</h3>
									<ul>
										<?php 
											$count=0;
											$i=0;
											while($i<count($package_show_footer)/1)
											{
										?>
										<li><a href="package.php"><?php echo $package_show_footer[$count+1]; ?></a></li>
										<?php
												if($i<=5)
												{
													$i++;												
												}
												else
												{
													$i=count($package_show_footer)/1;
												}
												$count=$count+1;
											}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="bottom_footer">
						<div class="left_side">
							&copy; All right reserved by the autiority.
						</div>
						<div class="right_side">
							This project develop by <span class="developer_name">Anamul Haque</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		    
  </body>
</html>