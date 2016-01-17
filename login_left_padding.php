<div class="left_pad">
	<ul>
<?php if( $_SESSION['option'] == 'admin' ){ ?>	
		<li><a href="admin_list.php">ADMIN LIST</a></li>
		<li><a href="new_admin.php">NEW ADMIN</a></li>
		<li><a href="user_list.php">USER LIST</a></li>
		<li><a href="new_user.php">NEW USER</a></li>
		<li><a href="add_package.php">ADD PACKAGE</a></li>
		<li><a href="show_package.php">SHOW PACKAGE</a></li>
		<li><a href="set_comment.php">SET COMMENTS</a></li>
		<li><a href="comment.php">COMMENTS</a></li>
		<li><a href="contact.php">CONTACT</a></li>
<?php 
}
else
{
 ?>
		<li><a href="show_package_user.php">PACKAGE</a></li>
		<li><a href="reservation.php">RESERVATION</a></li>
<?php 
}
 ?>
	</ul>
</div>	