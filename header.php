<?php 
	require_once ('database.php');
	$conn = new Data_control();
	$package_date_show_footer = $conn ->package_date_show_footer();
	$place_show_footer	 = $conn ->place_show_footer();
	$package_show_footer = $conn ->package_show_footer();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Toure Agency</title>
	
	

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
    <script src="js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	
	<script>
	$(document).ready(function(){
		$(".test1").click(function(){
			 
			 $(".testResult2").hide();
		});
		$(".test2").click(function(){
			 $(".testResult1").hide();
		});
		$("#name").keyup(function(){
			if($(this).val().length==0)
			{
				$(".name_status_all").removeClass("has-success");
				$(".name_status_all").addClass("has-error"); 
				
				$(".name_status").removeClass("glyphicon-ok");
				$(".name_status").addClass("glyphicon-remove"); 
			}
			else
			{
				$(".name_status_all").removeClass("has-error");
				$(".name_status_all").addClass("has-success"); 	

				$(".name_status").removeClass("glyphicon-remove");
				$(".name_status").addClass("glyphicon-ok"); 				
			}
			
			$('#checked').prop('checked', false)
		});
		$("#father_name").keyup(function(){
			if($(this).val().length==0)
			{
				$(".father_name_status_all").removeClass("has-success");
				$(".father_name_status_all").addClass("has-error"); 
				
				$(".father_name_status").removeClass("glyphicon-ok");
				$(".father_name_status").addClass("glyphicon-remove"); 
			}
			else
			{
				$(".father_name_status_all").removeClass("has-error");
				$(".father_name_status_all").addClass("has-success"); 	

				$(".father_name_status").removeClass("glyphicon-remove");
				$(".father_name_status").addClass("glyphicon-ok"); 				
			}
			
			$('#checked').prop('checked', false)
		});
		$("#email").keyup(function(){
			var x = $("#email").val();		
			$.get("email_varification.php", { name: x }, function(data, status){
				if(status == 'success')
				{
					var atpos = x.indexOf("@");
					var dotpos = x.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length || data==1) {
						$(".email_status_all").addClass("has-error"); 
						$(".email_status_all").removeClass("has-success"); 
						
						$(".email_status").addClass("glyphicon-remove"); 
						$(".email_status").removeClass("glyphicon-ok"); 
					}
					else{
						$(".email_status_all").addClass("has-success"); 
						$(".email_status_all").removeClass("has-error"); 
						
						$(".email_status").addClass("glyphicon-ok"); 
						$(".email_status").removeClass("glyphicon-remove"); 
					}
				}
				else
				{
					alert("Check you internet Conncetion. Problem type is " + status);	
				}
			});
			
			$('#checked').prop('checked', false)
		});
		
		
		
		
	
		
		$(".year").change(function(){
			$(".date_select").empty();
			month=$(".month").val();
			year=$(".year").val();
			
			year=year-1952;
			ans=year % 4;
			if(month == 0){
				$(".date_of_birth_status_all").removeClass("has-success"); 
				$(".date_of_birth_status_all").addClass("has-error"); 
				$(".date_status").removeClass("glyphicon-ok"); 
				$(".date_status").addClass("glyphicon-remove"); 
			}
			else{
				if(ans == 0){
					lpy=1;
				}
				else{
					lpy=0;
				}
				day=0;
				if(month<=7){
					if(month == 2 && lpy == 1){
						day = 29;
					}
					else if(month == 2 && lpy == 0){
						day = 28;
					}
					else if(month % 2 == 0){
						day = 30;
					}
					else{
						day = 31;
					}
				}
				else if(month>7 && month<=12){
					if(month % 2==0){
						day=31;
					}
					else{
						day=30;
					}
				}
				i=1;
				while(i<=day){
					$(".date_select").append("<option value='"+ i +"'>"+ i +"</option>");
					i++;
				}				
				$(".date_of_birth_status_all").removeClass("has-error"); 
				$(".date_of_birth_status_all").addClass("has-success"); 
				$(".date_status").removeClass("glyphicon-remove"); 
				$(".date_status").addClass("glyphicon-ok"); 		
			}

		});	
		
		$(".month").change(function(){
			$(".date_select").empty();
			month=$(".month").val();
			year=$(".year").val();
			
			year=year-1952;
			ans=year % 4;
			if(month == 0){
				$(".date_of_birth_status_all").removeClass("has-success"); 
				$(".date_of_birth_status_all").addClass("has-error"); 
				$(".date_status").removeClass("glyphicon-ok"); 
				$(".date_status").addClass("glyphicon-remove"); 
			}
			else{
				if(ans == 0){
					lpy=1;
				}
				else{
					lpy=0;
				}
				day=0;
				if(month<=7){
					if(month == 2 && lpy == 1){
						day = 29;
					}
					else if(month == 2 && lpy == 0){
						day = 28;
					}
					else if(month % 2 == 0){
						day = 30;
					}
					else{
						day = 31;
					}
				}
				else if(month>7 && month<=12){
					if(month % 2==0){
						day=31;
					}
					else{
						day=30;
					}
				}
				i=1;
				while(i<=day){
					$(".date_select").append("<option value='"+ i +"'>"+ i +"</option>");
					i++;
				}				
				$(".date_of_birth_status_all").removeClass("has-error"); 
				$(".date_of_birth_status_all").addClass("has-success"); 
				$(".date_status").removeClass("glyphicon-remove"); 
				$(".date_status").addClass("glyphicon-ok"); 		
			}

		});
		
		$("#phone").keyup(function(){
			if($(this).val().length==0)
			{
				$(".phone_status_all").removeClass("has-success");
				$(".phone_status_all").addClass("has-error"); 
				
				$(".phone_status").removeClass("glyphicon-ok");
				$(".phone_status").addClass("glyphicon-remove"); 
			}
			else
			{
				$(".phone_status_all").removeClass("has-error");
				$(".phone_status_all").addClass("has-success"); 	

				$(".phone_status").removeClass("glyphicon-remove");
				$(".phone_status").addClass("glyphicon-ok"); 				
			}
			
			$('#checked').prop('checked', false)
		});
		$("#address").keyup(function(){
			if($(this).val().length==0)
			{
				$(".address_status_all").removeClass("has-success");
				$(".address_status_all").addClass("has-error"); 
				
				$(".address_status").removeClass("glyphicon-ok");
				$(".address_status").addClass("glyphicon-remove"); 
			}
			else
			{
				$(".address_status_all").removeClass("has-error");
				$(".address_status_all").addClass("has-success"); 	

				$(".address_status").removeClass("glyphicon-remove");
				$(".address_status").addClass("glyphicon-ok"); 				
			}
			
			$('#checked').prop('checked', false)
		});
		$("#password").keyup(function(){
			if($(this).val().length==0)
			{
				$(".password_status_all").removeClass("has-success");
				$(".password_status_all").addClass("has-error"); 
				
				$(".password_status").removeClass("glyphicon-ok");
				$(".password_status").addClass("glyphicon-remove"); 
			}
			else
			{
				$(".password_status_all").removeClass("has-error");
				$(".password_status_all").addClass("has-success"); 	

				$(".password_status").removeClass("glyphicon-remove");
				$(".password_status").addClass("glyphicon-ok"); 				
			}			
			$('#checked').prop('checked', false)
		});
		$("#password_conform").keyup(function(){			
			if($(this).val().length==0 || $("#password").val() != $("#password_conform").val())
			{
				$(".password_conform_status_all").removeClass("has-success");
				$(".password_conform_status_all").addClass("has-error"); 
				
				$(".password_conform_status").removeClass("glyphicon-ok");
				$(".password_conform_status").addClass("glyphicon-remove"); 
			}
			else
			{
				$(".password_conform_status_all").removeClass("has-error");
				$(".password_conform_status_all").addClass("has-success"); 	

				$(".password_conform_status").removeClass("glyphicon-remove");
				$(".password_conform_status").addClass("glyphicon-ok"); 				
			}
			$('#checked').prop('checked', false)
		});
		$("#checked").change(function(){			
			if($(this).is( ":checked" ) == true )
			{				

				if( $("#password").val().length != 0 &&  $("#password").val() == $("#password_conform").val() )
				{
					var x = $("#email").val();	
					if($("#email").val().length == 0)
					{					
						$(".submit_test").attr("disabled","disabled");
					}
					else
					{	
						$.get("email_varification.php", { name: x }, function(data, status){
							if(status == 'success')
							{
								var atpos = x.indexOf("@");
								var dotpos = x.lastIndexOf(".");
								if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length || data==1) {
									$(".submit_test").attr("disabled","disabled");
								}
								else{
									$(".submit_test").removeAttr("disabled");
								}
							}
							else
							{
								alert("Check you internet Conncetion. Problem type is " + status);
							}
						});		
					}
				}
				else
				{
					$(".submit_test").attr("disabled","disabled");
				}

			}
			else
			{
				$(".submit_test").attr("disabled","disabled");
			}
		});
		
	});
	</script>
	<script>
	$(document).ready(function(){
	  $('.dropdown-submenu a.test').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	  });
	});
	</script>

  </head>
  <body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header">
						<a href="index.php"><h1>TOURE <span class="lavel">GUIDE</span></h1></a>
						<ul>
							<li><a href="sign_in_type.php">SIGN IN</a></li>
							<li><a href="registration.php">SIGN UP</a></li>
						</ul>
					</div>
				</div>
			</div>
			