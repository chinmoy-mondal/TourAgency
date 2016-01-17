<?php
	require_once ('config.php');
	
	class Data_control
	{
		// stored database connection
		private $mMysqli;
		// constructor opens database connection
		function __construct(){
			$this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}
		// destructor closes database connection
		function __destruct(){
			$this->mMysqli->close();
		}
		
		
		public function email_varification($email){
			return $this->email_varification_check($email);
		}
		private function email_varification_check($email){

			$ans = $this->mMysqli->query("SELECT * FROM user WHERE Email='$email'");
			$result = $ans->fetch_array();
			if ($result == null){
				$request = 0;
			}
			else {
				$request = 1;
			}
			return $request;
		}
		
		private function first_user_check($user_type){
			$result_querry = $this->mMysqli->query("SELECT ID FROM user where User_Type='admin'");
			$row = $result_querry->fetch_array();
			if ($row == null){
				$request = 0;
			}
			else {
				$request = 1;
			}
			return $request;
		}
		
		public function user_registration($name,$father_name,$gender,$email,$year,$month,$day,$phone_number,$address,$user_type,$password,$total_picture_name){
			$this->user_registration_save($name,$father_name,$gender,$email,$year,$month,$day,$phone_number,$address,$user_type,$password,$total_picture_name);
		}		
		private function user_registration_save($name,$father_name,$gender,$email,$year,$month,$day,$phone_number,$address,$user_type,$password,$total_picture_name)
		{	
			// making date of birth
			$birth_day = $year.'-'.$month.'-'.$day;
			$password=md5($password);
			
			// checking first user
			$id = $this->first_user_check($user_type);
			
			if($id==0 && $user_type=='admin'){
				$this->mMysqli->query("INSERT INTO user (Name,Father_Name,Gender,Email,Phone_Number,Picture_Name,Date_Of_Brith,Address,User_Type,Password,Permission)VALUES ('$name', '$father_name', '$gender', '$email', '$phone_number', '$total_picture_name', '$birth_day', '$address', '$user_type', '$password','1')");	
			}
			else{
				$this->mMysqli->query("INSERT INTO user (Name,Father_Name,Gender,Email,Phone_Number,Picture_Name,Date_Of_Brith,Address,User_Type,Password,Permission)VALUES ('$name', '$father_name', '$gender', '$email', '$phone_number', '$total_picture_name', '$birth_day', '$address', '$user_type', '$password','0')");	
			}
		}	
		public function last_ID_check()
		{
			return $this->last_ID_check_private();
		}
		private function last_ID_check_private()
		{
			$result_querry=$this->mMysqli->query("SELECT ID FROM toure_package");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$ans[$count]=$row['ID'];
					$count++;
			}
			
			$i=0;
			while($i<=$count)
			{
				$test=$ans[$i+1]-$ans[$i];
				if($test != 1)
				{
					$funal_result=$ans[$i];
					$i=$count+1;
				}
				else
				{
					$funal_result=$ans[$i];
				}
				$i++;
			}
			return $funal_result;
		}
		
		public function add_package($last_ID,$toure_name,$tour_place,$toure_date,$toure_starts,$toure_duration,$transport_system,$hotel_reservation,$weather,$prequation,$medical_support,$price,$picture_name)
		{
			$this->add_package_private($last_ID,$toure_name,$tour_place,$toure_date,$toure_starts,$toure_duration,$transport_system,$hotel_reservation,$weather,$prequation,$medical_support,$price,$picture_name);
		}		
		private function add_package_private($last_ID,$toure_name,$tour_place,$toure_date,$toure_starts,$toure_duration,$transport_system,$hotel_reservation,$weather,$prequation,$medical_support,$price,$picture_name)
		{
			$this->mMysqli->query("INSERT INTO toure_package (ID,toure_name,tour_place,toure_date,toure_starts,toure_duration,transport_system,hotel_reservation,weather,prequation,medical_support,price,picture_name)VALUES ('$last_ID','$toure_name','$tour_place','$toure_date','$toure_starts','$toure_duration','$transport_system','$hotel_reservation','$weather','$prequation','$medical_support','$price','$picture_name')");	
			
		}		
		public function sign_in_status($email,$password,$option){			
			return $this->sign_in_status_private($email,$password,$option);
		}
		private function sign_in_status_private($email,$password,$option){
			$password =md5($password);
			if($option == 'admin')
			{
				$result_querry = $this->mMysqli->query("SELECT ID FROM user where Email='$email' && Password='$password' && Permission=1 && User_Type='admin'");
				$row = $result_querry->fetch_array();
				if($row == null)
					return 0;
				else
					return 1;	
			}
			else
			{
				$result_querry = $this->mMysqli->query("SELECT ID FROM user where Email='$email' && Password='$password' && Permission=1 && User_Type='tourist'");
				$row = $result_querry->fetch_array();
				if($row == null)
					return 0;
				else
					return 1;
			}
		}
		public function new_user_lookup(){			
			return $this->new_user_lookup_private();
		}
		private function new_user_lookup_private(){
			$result_querry = $this->mMysqli->query("SELECT * FROM user where Permission = 0 && User_Type = 'tourist'");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['Name'];
					$search[$count+3] = $row['Father_Name'];
					$search[$count+4] = $row['Gender'];
					$search[$count+5] = $row['Email'];
					$search[$count+6] = $row['Phone_Number'];
					$search[$count+7] = $row['Picture_Name'];
					$search[$count+8] = $row['Date_Of_Brith'];
					$search[$count+9] = $row['Address'];
					$count = $count+9;
			}
			return $search;
			
		}
		public function user_list_lookup(){			
			return $this->user_list_lookup_private();
		}
		private function user_list_lookup_private(){
			$result_querry = $this->mMysqli->query("SELECT * FROM user where Permission = 1 && User_Type = 'tourist'");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['Name'];
					$search[$count+3] = $row['Father_Name'];
					$search[$count+4] = $row['Gender'];
					$search[$count+5] = $row['Email'];
					$search[$count+6] = $row['Phone_Number'];
					$search[$count+7] = $row['Picture_Name'];
					$search[$count+8] = $row['Date_Of_Brith'];
					$search[$count+9] = $row['Address'];
					$count = $count+9;
			}
			return $search;
			
		}
		public function permit_user($permit_id){
			$this->permit_user_public($permit_id);
		}
		private function permit_user_public($permit_id){
			$this->mMysqli->query("UPDATE user	SET Permission = 1	where ID = '$permit_id'");
		}
		public function block_user($permit_id){
			$this->block_user_public($permit_id);
		}
		private function block_user_public($permit_id){
			$this->mMysqli->query("UPDATE user	SET Permission = 0	where ID = '$permit_id'");
		}
		
		public function delete_user($delete_id){
			$this->delete_user_public($delete_id);
		}
		private function delete_user_public($delete_id){
			$this->mMysqli->query("DELETE FROM user WHERE ID='$delete_id'");
		}	
		
		public function delete_package($delete_id){
			$this->delete_package_public($delete_id);
		}
		private function delete_package_public($delete_id){
			$this->mMysqli->query("DELETE FROM toure_package WHERE ID='$delete_id'");
		}	
		
		public function apply_package($id,$email){
			$this->apply_package_private($id,$email);
		}
		private function apply_package_private($id,$email){
			$this->mMysqli->query("INSERT INTO apply (Package_Id,User_Email)VALUES ('$id','$email')");
		}
		
		public function cancle_booking($id,$email){
			$this->cancle_booking_private($id,$email);
		}
		private function cancle_booking_private($id,$email){
			$this->mMysqli->query("DELETE FROM apply WHERE Package_Id ='$id' && User_Email ='$email'");
		}	
		
		
		public function admin_list_lookup(){			
			return $this->admin_list_lookup_private();
		}
		private function admin_list_lookup_private(){
			$result_querry = $this->mMysqli->query("SELECT * FROM user where Permission = 1 && User_Type = 'admin'");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['Name'];
					$search[$count+3] = $row['Father_Name'];
					$search[$count+4] = $row['Gender'];
					$search[$count+5] = $row['Email'];
					$search[$count+6] = $row['Phone_Number'];
					$search[$count+7] = $row['Picture_Name'];
					$search[$count+8] = $row['Date_Of_Brith'];
					$search[$count+9] = $row['Address'];
					$count = $count+9;
			}
			return $search;
			
		}
		
		public function new_admin_lookup(){			
			return $this->new_admin_lookup_private();
		}
		private function new_admin_lookup_private(){
			$result_querry = $this->mMysqli->query("SELECT * FROM user where Permission = 0 && User_Type = 'admin'");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['Name'];
					$search[$count+3] = $row['Father_Name'];
					$search[$count+4] = $row['Gender'];
					$search[$count+5] = $row['Email'];
					$search[$count+6] = $row['Phone_Number'];
					$search[$count+7] = $row['Picture_Name'];
					$search[$count+8] = $row['Date_Of_Brith'];
					$search[$count+9] = $row['Address'];
					$count = $count+9;
			}
			return $search;
			
		}
		public function permit_admin($permit_id){
			$this->permit_admin_public($permit_id);
		}
		private function permit_admin_public($permit_id){
			$this->mMysqli->query("UPDATE user	SET Permission = 1	where ID = '$permit_id'");
		}
		public function block_admin($permit_id){
			$this->block_admin_public($permit_id);
		}
		private function block_admin_public($permit_id){
			$this->mMysqli->query("UPDATE user	SET Permission = 0	where ID = '$permit_id'");
		}
		
		public function delete_admin($delete_id){
			$this->delete_admin_public($delete_id);
		}
		private function delete_admin_public($delete_id){
			$this->mMysqli->query("DELETE FROM user WHERE ID='$delete_id'");
		}	

		public function package_list_lookup(){			
			return $this->package_list_lookup_private();
		}
		private function package_list_lookup_private(){
			$result_querry = $this->mMysqli->query("SELECT * FROM toure_package");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['toure_name'];
					$search[$count+3] = $row['tour_place'];
					$search[$count+4] = $row['toure_date'];
					$search[$count+5] = $row['toure_starts'];
					$search[$count+6] = $row['toure_duration'];
					$search[$count+7] = $row['transport_system'];
					$search[$count+8] = $row['hotel_reservation'];
					$search[$count+9] = $row['weather'];
					$search[$count+10] = $row['prequation'];
					$search[$count+11] = $row['medical_support'];
					$search[$count+12] = $row['price'];
					$search[$count+13] = $row['picture_name'];
					$count = $count+13;
			}
			return $search;			
		}
		
		public function application_check_lookup($email){			
			return $this->application_check_lookup_private($email);
		}
		private function application_check_lookup_private($email){
			$applyresult = $this->mMysqli->query("SELECT * FROM apply where User_Email='$email'");
			$count=0;
			while($row = $applyresult->fetch_array())
			{
					$search[$count+1] = $row['Package_Id'];
					$search[$count+2] = $row['User_Email'];
					$count = $count+2;
			}
			return $search;			
		}		

		public function application_package_package($application_package_id){			
			return $this->application_package_package_private($application_package_id);
		}
		private function application_package_package_private($application_package_id){
			$result_querry = $this->mMysqli->query("
					SELECT Package_Id,Name,Email,Phone_Number,Picture_Name
					FROM user,apply
					WHERE User_Email=Email && Package_Id = '$application_package_id'  && apply.Permission=0
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['Package_Id'];
					$search[$count+2] = $row['Name'];
					$search[$count+3] = $row['Email'];
					$search[$count+4] = $row['Phone_Number'];
					$search[$count+5] = $row['Picture_Name'];
					$count = $count+5;
			}
			return $search;			
		}	
		
		public function give_permission_package($act_package_id,$act_email){
			$this->give_permission_package_private($act_package_id,$act_email);
		}
		private function give_permission_package_private($act_package_id,$act_email){
			$this->mMysqli->query("UPDATE apply	SET Permission = 1	where Package_Id = '$act_package_id' && User_Email='$act_email'");
		}
		

		public function show_filan_tourist_list($application_package_id){			
			return $this->show_filan_tourist_list_private($application_package_id);
		}
		private function show_filan_tourist_list_private($application_package_id){
			$result_querry = $this->mMysqli->query("
					SELECT Package_Id,Name,Email,Phone_Number,Picture_Name
					FROM user,apply
					WHERE User_Email=Email && Package_Id = '$application_package_id'  && apply.Permission=1
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['Package_Id'];
					$search[$count+2] = $row['Name'];
					$search[$count+3] = $row['Email'];
					$search[$count+4] = $row['Phone_Number'];
					$search[$count+5] = $row['Picture_Name'];
					$count = $count+5;
			}
			return $search;			
		}
		public function set_comment($comment,$comment_by)
		{
			$this->set_comment_private($comment,$comment_by);
		}
		private function set_comment_private($comment,$comment_by)
		{
			$this->mMysqli->query("INSERT INTO comments (comment,comment_by)VALUES ('$comment','$comment_by')");
		}
		public function comment()
		{
			return $this->comment_private();
		}
		private function comment_private()
		{
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM comments
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['comment'];
					$search[$count+3] = $row['comment_by'];
					$search[$count+4] = $row['permission'];
					$count = $count+4;
			}
			return $search;	
		}
		public function comment_act($act)
		{
			$this->comment_act_private($act);
		}
		public function comment_act_private($act)
		{
			$this->mMysqli->query("UPDATE comments	SET permission  = 1	where ID  = '$act'");
		}
		public function comment_blc($blc)
		{
			$this->comment_blc_private($blc);
		}
		public function comment_blc_private($blc)
		{
			$this->mMysqli->query("UPDATE comments	SET permission  = 0	where ID  = '$blc'");
		}
		public function comment_del($del)
		{
			$this->comment_del_private($del);
		}
		public function comment_del_private($del)
		{
			$this->mMysqli->query("DELETE FROM comments WHERE ID='$del'");
		}
		
		public function contact($con)
		{
			$this->contact_private($con);
		}
		public function contact_private($con)
		{
			
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM contact
				");
			$row = $result_querry->fetch_array();
			if($row == null)
				$this->mMysqli->query("INSERT INTO contact (ID,contact)VALUES ('1','$con')");
			else
				$this->mMysqli->query("UPDATE contact	SET contact  = '$con'	where ID  = 1 ");
			
		}
		
		public function contact_show()
		{
			return $this->contact_show_private();
		}
		public function contact_show_private()
		{
			$result_querry=$this->mMysqli->query("
					SELECT contact
					FROM contact
				");
			$row = $result_querry->fetch_array();
			$contact_result=$row['contact'];
			return $contact_result;
		}
		public function reservation($email)
		{
			return $this->reservation_private($email);
		}
		private function reservation_private($email)
		{
			$result_querry = $this->mMysqli->query("
				SELECT * FROM toure_package,apply
				WHERE toure_package.ID=apply.Package_Id && apply.Permission=1 &&
				apply.User_Email='$email'
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['toure_name'];
					$search[$count+3] = $row['tour_place'];
					$search[$count+4] = $row['toure_date'];
					$search[$count+5] = $row['toure_starts'];
					$search[$count+6] = $row['toure_duration'];
					$search[$count+7] = $row['transport_system'];
					$search[$count+8] = $row['hotel_reservation'];
					$search[$count+9] = $row['weather'];
					$search[$count+10] = $row['prequation'];
					$search[$count+11] = $row['medical_support'];
					$search[$count+12] = $row['price'];
					$search[$count+13] = $row['picture_name'];
					$count = $count+13;
			}
			return $search;				
		}
		public function comment_show()
		{
			return $this->comment_show_private();
		}
		private function comment_show_private()
		{
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM comments 
					WHERE permission=1
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['ID'];
					$search[$count+2] = $row['comment'];
					$search[$count+3] = $row['comment_by'];
					$search[$count+4] = $row['permission'];
					$count = $count+4;
			}
			return $search;	
		}
		public function package_show_all()
		{
			return $this->package_show_all_private();
		}
		private function package_show_all_private()
		{
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM toure_package 
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['toure_name'];
					$search[$count+2] = $row['toure_date'];
					$search[$count+3] = $row['tour_place'];
					$search[$count+4] = $row['toure_duration'];
					$search[$count+5] = $row['price'];
					$count = $count+5;
			}
			return $search;	
		}
		public function package_date_show_footer()
		{
			return $this->package_date_show_footer_private();
		}
		private function package_date_show_footer_private()
		{
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM toure_package 
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['toure_date'];
					$count = $count+1;
			}
			return $search;
		}
		public function place_show_footer()
		{
			return $this->place_show_footer_private();
		}
		private function place_show_footer_private()
		{
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM toure_package 
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['tour_place'];
					$count = $count+1;
			}
			return $search;
		}
		public function package_show_footer()
		{
			return $this->package_show_footer_private();
		}
		private function package_show_footer_private()
		{
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM toure_package 
				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search[$count+1] = $row['toure_name'];
					$count = $count+1;
			}
			return $search;
		}
		public function search($search)
		{
			return $this->search_private($search);
		}
		private function search_private($search)
		{
			$result_querry=$this->mMysqli->query("
					SELECT *
					FROM toure_package 
					WHERE
					tour_place = '$search' 

				");
			$count=0;
			while($row = $result_querry->fetch_array())
			{
					$search_result[$count+1] = $row['toure_name'];
					$search_result[$count+2] = $row['toure_date'];
					$search_result[$count+3] = $row['tour_place'];
					$search_result[$count+4] = $row['toure_duration'];
					$search_result[$count+5] = $row['price'];
					$count = $count+5;
			}
			return $search_result;
		}
	}
	
?>