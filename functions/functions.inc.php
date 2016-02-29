<?php

include_once("$_SERVER[DOCUMENT_ROOT]/UASS/connection/connect.php");
require_once "$_SERVER[DOCUMENT_ROOT]/UASS/functions/vendor/autoload.php";

//session_start();
class User
{
	private $user_db;
	/**
	*User class constructor
	*/
	public function __construct()
	{
		try
		{
			$this->user_db= new Connection();
			
			$this->user_db=$this->user_db->dbConnect();
			
			$this->user_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "Error! Could not connect to Server. Please try later.".$e;
		}//end of try-catch statement
		
	}//end of constructors
	
	public function adminLogin($user_id, $password){
		try
		{
			//query
			$query = $this->user_db->prepare("SELECT * FROM users WHERE user_id =? AND password =?");
		
			//bind parameters
			$query ->bindParam(1, $user_id);
			
			$query ->bindParam(2, $password);	
			
			//executes the query.
			$query->execute();
			
			$results = $query ->fetch();
			
			//check if user exist.
			if($results >0){
				
				//user name
				$_SESSION['admin_user'] = $results['user_id'];
				$_SESSION['user_name'] = $results['firstname'].' '.$results['lastname'];
				$_SESSION['level'] = $results['level'];
				//echo 	$_SESSION['user_name'];exit;
				//redirects to home page, index.php
				header('location:index.php');
			}else{
				header('location:signin.php?login=failed');
				
			}//end of if-else statement
		}
		catch(PDOException $e)
		{
			echo "Error! Something went wrong. Try later.";
		}//end of try-catch statement
	}//end of admin login function
	
	public function addUser($firstname,$lastname,$email,$emp_id,$sex){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, 8 );
		//echo $password;
		$password = md5($password);
		$query = $this->user_db->prepare("insert into users (user_id, firstname, lastname, email, sex, password)
		 		values (?,?,?,?,?,?)");
		$query->bindParam(1, $emp_id);
		$query->bindParam(2, $firstname);
		$query->bindParam(3, $lastname);
		$query->bindParam(4, $email);
		$query->bindParam(5, $sex);
		$query->bindParam(6, $password);
		$query->execute();
	}
	
	public function viewUsers($totalPerPage){
		//echo $totalPerPage;exit;
		$query = $this->user_db->prepare("SELECT * FROM users");
			
		$query->execute();
			
		$rows = $query->rowCount();
			
		//get page number from url.
		$page_number = 1;
			
		//filter page number
		if(isset($_GET['page_number'])) {
			$page_number = preg_replace("#[^0-9]#","",$_GET['page_number']);
		}
		//get value of the last page
		$lastPage = ceil($rows/$totalPerPage);
		
		//be sure page number is not less than 1 and not greater than $lastPage;
		if($lastPage < 1)
		{
			$lastPage = 1;
		}
		
		//this line sets the limit range...the 2 values we place to choose the range of rows from database
		$limit = 'LIMIT '.($page_number - 1)*$totalPerPage.','.$totalPerPage;
		//echo $limit;exit;
		//run the query as above but add $limit onto the end 0f the syntax
		$query2 = $this->user_db->prepare("SELECT * FROM users ORDER BY user_id ASC $limit");
			
		$query2->execute();

		//display setup
		$paginationDisplay = "";
			
		if($lastPage != 1)
		{
			if($page_number > 1) {
			$prev = $page_number - 1;
			
			$paginationDisplay .='<li class="previous"><a href = "'.$_SERVER['PHP_SELF'].'?page_number='.$prev.'">&larr; Prev</li></a>';
			for($i = $page_number-4; $i < $page_number; $i++) {
				if($i > 0) {
					$paginationDisplay .='<li><a href = "'.$_SERVER['PHP_SELF'].'?page_number='.$i.'">'.$i.'</a></li>';
				}
			}
		} 
		$paginationDisplay .=''.$page_number.'&nbsp;';
			for($i = $page_number + 1; $i <= $lastPage; $i++) {
				$paginationDisplay .= '<li><a href="'.$_SERVER['PHP_SELF'].'?page_number='.$i.'">'.$i.'</a></li>';
				if($i> $page_number+4) {
					break;
				}
			}
		}
		if($page_number != $lastPage)
		{
			$next = $page_number + 1;
			
			$paginationDisplay .='<li class="next"><a href = "'.$_SERVER['PHP_SELF'].'?page_number='.$next.'">Next &rarr;</li></a>';
		}
			
		$_SESSION['page'] = $paginationDisplay;
			
		//build output section
		$results = $query2->fetchAll(PDO::FETCH_ASSOC);
			
		foreach($results as $result)
		{
			$_SESSION['users'] = $results;
		}
	}//end of view user function
	/**
	*Allows user to login
	*@param user name, password;
	*@return array;
	*/
	public function login($username,$password)
	{
		$password = md5($password);
		//echo $username;die();
		try
		{
			//query
			$user = $this->user_db->prepare("SELECT * FROM applicants_users WHERE user_name =? AND password =?");
		
			//bind parameters
			$user ->bindParam(1, $username);
			
			$user ->bindParam(2, $password);	
			
			//executes the query.
			$user->execute();
			
			$rows = $user ->fetch();
			
			//check if user exist.
			if($rows >0){
				//user name
				$_SESSION['user_id'] = $rows['user_name'];
				$_SESSION['user_name'] = $rows['first_name'].' '.$rows['last_name'];
								
				//redirects to home page, index.php
				header('location:index.php');
			}else{
				$_SESSION['login_error'] = true;
				
			}//end of if-else statement
		}
		catch(PDOException $e)
		{
			$_SESSION['db_err'] = true;
		}//end of try-catch statement
		
	}//end of login function
	
	public function checkPassword($userName){
		$query =$this->user_db->prepare("select password from users_applicants where exam_id = ?");
		$query->bindParam(1, $userName);
		$query->execute();
		$results = $query->fetch(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['checked_pass'] = $result;
		}	
	}
	
		public function getId($name) 
	{
		
		try
		{
			//query
			$sql = $this->user_db->prepare("SELECT * FROM users_applicants WHERE first_name=?");
			$sql ->bindParam(1, $name);
			
			$sql->execute();
			$rows = $sql->fetch();
			
				$_SESSION['userId'] = $rows['exam_id'];
						
		}
		catch(PDOException $e)
		{
			echo "Error! Something went wrong. Try later.";
		}//end of try-catch statement
		
	}

	
	/**
	*Function that creates new accounts for applicants to the system.
	*@param firstname, lastname, username, email, exam number.
	*@return default password.
	*/
	public function createAccount($exam_number,$firstname, $lastname, $email,$applicant_dob,$sex){
		
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, 8 );
		$pass=$password;
		$password = md5($pass);
		
		$sql_query = $this->user_db->prepare("INSERT INTO users_applicants (exam_id,first_name,last_name,email,dob,sex,password )
						 VALUES(?,?,?,?,?,?,?)");
		$sql_query->bindParam(1, $exam_number);
		$sql_query->bindParam(2, $firstname);
		$sql_query->bindParam(3, $lastname);
		$sql_query->bindParam(4, $email);
		$sql_query->bindParam(5, $applicant_dob);
		$sql_query->bindParam(6, $sex);
		$sql_query->bindParam(7, $password);
		
		
		if ($sql_query->execute()){
			$_SESSION['successfully_registered'] = true;
			header('location:feedback.php?registered='.$pass);
		}else{echo 'not registered';}
		
	}//end of createAccount function.
	
	public function sendEmail($email,$firstname, $lastname, $exam_number,$applicant_dob,$sex){
	
	//generate password
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, 8 );
		$pass=$password;
  
			$m = new PHPMailer;
			$m -> isSMTP();
			$m -> SMTPAuth = true;
			//$m -> SMTPDebug = 2;
			$m -> Host = 'smtp.gmail.com';
			$m -> Username = 'onlineuniversity.application@gmail.com';
			$m -> Password = 'Bsc/74/10';
			$m -> SMTPSecure = 'ssl';
			$m -> Port = 465;
  
			//include the parameters for sending email
			$m -> From = 'phirichiku@gmail.com';
			$m -> FromName = 'National Council of Higher Learning';
			$m -> addReplyTo('phirichiku@gmail.com','chiku');
			$m -> Subject = "login credentials";
			
			//some fields e.g addCC have been removed/jumped
			$m -> addAddress($email,$firstname);

			//want to send an html email
			$m -> isHTML(true);
			$body = 'Dear <h2>'.$firstname.'</h2> <br />';
			$body .= "your password is:  $pass ";
			$m -> Body = $body;
			$users = new User();
		
			if ($m -> send()){
				$users->createAccount($exam_number,$firstname, $lastname, $email,$applicant_dob,$sex,$pass);
			}else{ echo 'please confirm you have entered the right email address';}
		
	}
	/**
	*Function that allows users change their password
	*@param old password;
	*@return new password;
	*/
	public function changePassword($password){
		/** change password function goes here */
	}//end of change password function.
	
	/**
	*check if user name already exist.
	*@param user name;
	*/
	public function checkUsername($username){
		
		$query = $this->user_db->prepare("SELECT * FROM applicants_users WHERE user_name =? ");
		
		$query->bindparam(1, $username);
		
		$query->execute();
		
		if($query->rowCount() >0)
		{
			$row=$query->fetch();
			
			echo $row['user_name'];
		
		}//end of if-statement
	}
	
	/**
	*check if user already exist in Maneb database.
	*@param user name,;
	*/
	public function checkUser($userId,$fname,$lname,$dob,$sex){
		
		$query = $this->user_db->prepare("SELECT reg_number FROM msce_student_details WHERE reg_number =? and first_name = ? and last_name = ?
					and date_of_birth = ? and gender = ?");
		
		//bind parameter
		
		$query->bindparam(1, $userId);
		$query->bindparam(2, $fname);
		$query->bindparam(3, $lname);
		$query->bindparam(4, $dob);
		$query->bindparam(5, $sex);
		
		$query->execute();
		
		if($query->rowCount() > 0)
		{
			$row=$query->fetch();
			echo $row['reg_number'];
			
		}
	}
	public function updatePassword($pass,$name){
		$pass = md5($pass);
		try{
			//query
			$query = $this->user_db->prepare("UPDATE users_applicants set password=? WHERE exam_id = ? ");
			$query ->bindParam(1, $pass);
			$query ->bindParam(2, $name);
				
			if ($query->execute()){
				$_SESSION['pass_changed'] = true;
			}
		}
		catch(PDOException $e){
			
			echo "Error! Something went wrong. Try later.";
			
		}//end of try-catch statement
		
	}//end of update function
	
	public function updateStatus($user,$status) {
		//echo 'We are here folks';die();
		$query = $this->user_db->prepare('update users set status = ? where user_id = ?');
		$query->bindParam(1, $status);
		$query->bindParam(2, $user);
		$query->execute();
	}//end of update status function
	
}//end of user class

/** This class is used to get all the applicant's details */
Class Application{
	
	private $application_db;
	
	/**
	*Application class constructor
	*/
	public function __construct(){
		try{
			
			$this->application_db= new Connection();
			
			$this->application_db=$this->application_db->dbConnect();
			
			$this->application_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "Error! Could not connect to Server. Please try later.".$e;
		}//end of try-catch statement
		
	}//end of constructors
	
	public function getimageExtension($imagetype)
	{
		if(empty($imagetype))
			echo false;
		switch($imagetype)
		{
			case 'image/bmp': return '.bmp';
			
			case 'image/jpeg': return '.jpeg';
			
			case 'image/gif': return '.gif';
			
			case 'image/png': return '.png';
			
			default: echo false;	
		}
		
	}//end of get image extension function.
	
	public function checkApplication($exam_id)
	{
		//echo 'Die';die();
		try
		{
			//query
			$user = $this->application_db->prepare("SELECT * FROM candidate_details WHERE exam_id =?");
		
			//bind parameters
			$user ->bindParam(1, $exam_id);
			
			//executes the query.
			$user->execute();
			
			$rows = $user ->fetch();
			
			//check if user exist.
			if($rows >0){
				//user name
				$_SESSION['applicant_err'] = true;
				//$_SESSION['id'] = $rows['user_id'];
					//die();
			}
		}
		catch(PDOException $e)
		{
			echo "Error! Something went wrong. Try later.";
		}//end of try-catch statement
		
	}//end of login function
	
	/**
	* Function to add applicant's details
	*@param applicant's information
	*@return feedback;
	*/
	public function addApplicantsDetails($exam_id,$firstname, $surname, $initial, $sex, $dob, $nationality, $pass_photo) {
		$query = $this->application_db->prepare("insert into candidate_details 
					(exam_id,first_name,last_name,initials,photo, sex,dob,nationality)
					values(?,?,?,?,?,?,?,?)");
		$query->bindParam(1, $exam_id);
		$query->bindParam(2, $firstname);
		$query->bindParam(3, $surname);
		$query->bindParam(4, $initial);
		$query->bindParam(5, $pass_photo);
		$query->bindParam(6, $sex);
		$query->bindParam(7, $dob);
		$query->bindParam(8, $nationality);
		$query->execute();
	}//end of add applicants details function.
	
	/**
	* Function to add next of kin details.
	* @param next of kin details;
	* @return feedback;
	*/
	public function addNextofkinDetails($exam_id,$nok_name,$occupation,$nok_addr,$nok_tel,$nok_mobile,$nok_email){
		$query = $this->application_db->prepare("insert into next_of_kin 
			(exam_id,full_name,occupation,contact_address,tel,mobile,email ) VALUES (?,?,?,?,?,?,?)");
		$query->bindParam(1, $exam_id);
		$query->bindParam(2, $nok_name);
		$query->bindParam(3, $occupation);
		$query->bindParam(4, $nok_addr);
		$query->bindParam(5, $nok_tel);
		$query->bindParam(6, $nok_mobile);
		$query->bindParam(7, $nok_email);
		$query->execute();
	
	}//end of add next of kin details.
	
	/**
	* function to add academic record.
	* @param academic information
	* @return feedback;
	*/
	public function addExamDetails($exam_id,$c_name,$c_number,$cand_number, $year){
		
		$query = $this->application_db->prepare("insert into exam_details (exam_id,centre_name,centre_number,candidate_number, year)
				values (?,?,?,?,?) ");
		$query->bindParam(1, $exam_id);
		$query->bindParam(2, $c_name);
		$query->bindParam(3, $c_number);
		$query->bindParam(4, $cand_number);
		$query->bindParam(5, $year);
		$query->execute();
	}//end of add academic details function.
	
	
	public function addContacts($exam_id,$district,$t_a,$village,$addr,$tel,$mobile,$email){
		$query = $this->application_db->prepare("insert into contacts
		 (exam_id,traditional_authority,village,contact_address,tel,mobile,email,district) 
					VALUES (?,?,?,?,?,?,?,?)");
		$query->bindParam(1, $exam_id);
		$query->bindParam(2, $t_a);
		$query->bindParam(3, $village);
		$query->bindParam(4, $addr);
		$query->bindParam(5, $tel);
		$query->bindParam(6, $mobile);
		$query->bindParam(7, $email);
		$query->bindParam(8, $district);
		$query->execute();
		
	
	}//end of add contact details function
	
	public function addAcademicHistory($exam_id, $prev_school, $sc_district){
		$query = $this->application_db->prepare("insert into academic_history (exam_id, previous_school, district)
					values (?,?,?)");
		$query->bindParam(1, $exam_id);
		$query->bindParam(2, $prev_school);
		$query->bindParam(3, $sc_district);
		$query->execute();
	
	}//end of add academic history function
	
	public function addChoices($exam_id,$choice, $priority){
		$query = $this->application_db->prepare("insert into choice (candidate_id, choice, priority) values (?, ?, ?)");
		$query->bindParam(1, $exam_id);
		$query->bindParam(2, $choice);
		$query->bindParam(3, $priority);
		$query->execute();
	}// end of add choices function
	
	public function addPaymentDetails($exam_id, $bank_name, $bank_branch, $dep_name, $dep_number, $dep_slip) {
		$query = $this->application_db->prepare("insert into payment_details (candidate_id, bank, branch, depositors_name, depositors_mobile, deposit_slip)
				values (?,?,?,?,?,?)");
		$query->bindParam(1, $exam_id);
		$query->bindParam(2, $bank_name);
		$query->bindParam(3, $bank_branch);
		$query->bindParam(4, $dep_name);
		$query->bindParam(5, $dep_number);
		$query->bindParam(6, $dep_slip);
		$query->execute();
	}//end of add payment details
	
	public function viewApplications($totalPerPage){
		$query = $this->application_db->prepare('select c.exam_id as exam_number, c.first_name as firstname, c.last_name as lastname,
					co.email as email, c.sex as sex, d.name as district, sum(grade) as points
					FROM candidate_details c
					inner join contacts co on(c.exam_id = co.exam_id)
					inner join district d on(district = id)
					inner join student_grades on(c.exam_id = student_grades.student_id)
					group by exam_number');
		$query->execute();
			
		$rows = $query->rowCount();
			
		//get page number from url.
		$page_number = 1;
			
		//filter page number
		if(isset($_GET['page_number'])) {
			$page_number = preg_replace("#[^0-9]#","",$_GET['page_number']);
		}
		//get value of the last page
		$lastPage = ceil($rows/$totalPerPage);
		
		//be sure page number is not less than 1 and not greater than $lastPage;
		if($lastPage < 1)
		{
			$lastPage = 1;
		}
		
		//this line sets the limit range...the 2 values we place to choose the range of rows from database
		$limit = 'LIMIT '.($page_number - 1)*$totalPerPage.','.$totalPerPage;
		//echo $limit;exit;
		//run the query as above but add $limit onto the end 0f the syntax
		$query2 = $this->application_db->prepare("select c.exam_id as exam_number, c.first_name as firstname, c.last_name as lastname,
					co.email as email, c.sex as sex, d.name as district, sum(grade) as points
					FROM candidate_details c
					inner join contacts co on(c.exam_id = co.exam_id)
					inner join district d on(district = id)
					inner join student_grades on(c.exam_id = student_grades.student_id)
					group by exam_number $limit");
			
		$query2->execute();

		//display setup
		$paginationDisplay = "";
			
		if($lastPage != 1)
		{
			if($page_number > 1) {
			$prev = $page_number - 1;
			
			$paginationDisplay .='<li class="previous"><a href = "'.$_SERVER['PHP_SELF'].'?page_number='.$prev.'">&larr; Prev</a></li>';
			for($i = $page_number-4; $i < $page_number; $i++) {
				if($i > 0) {
					$paginationDisplay .='<li><a href = "'.$_SERVER['PHP_SELF'].'?page_number='.$i.'">'.$i.'</a></li>';
				}
			}
		} 
		$paginationDisplay .='<li><a style="color: #000">'.$page_number.'</a></li>';
			for($i = $page_number + 1; $i <= $lastPage; $i++) {
				$paginationDisplay .= '<li><a href="'.$_SERVER['PHP_SELF'].'?page_number='.$i.'">'.$i.'</a></li>';
				if($i> $page_number+4) {
					break;
				}
			}
		}
		if($page_number != $lastPage)
		{
			$next = $page_number + 1;
			
			$paginationDisplay .='<li class="next"><a href = "'.$_SERVER['PHP_SELF'].'?page_number='.$next.'">Next &rarr;</a></li>';
		}
			
		$_SESSION['application_pages'] = $paginationDisplay;
			
		//build output section
		$results = $query2->fetchAll(PDO::FETCH_ASSOC);
			
		foreach($results as $result)
		{
			$_SESSION['applications'] = $results;
		}
	
	}//end of view application function
	
	public function getTotalApplications(){
		$query = $this->application_db->prepare("select count(exam_id) as total from candidate_details");
		$query->execute();
		$result = $query->fetch();
		return $result['total'];
	}
	public function applicantsPerDistrict(){
		$query = $this->application_db->prepare("select name as distr, count(id) as count from district inner join contacts on (district.id = contacts.district) group by id");
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['app_per_distr'] = $results;
		}
	}
	
	public function getApplicationData($appl_id){
		$query = $this->application_db->prepare("select * from candidate_details a inner join contacts b on(a.exam_id = b.exam_id) inner join next_of_kin c on (a.exam_id = c.exam_id) inner join academic_history d on(a.exam_id = d.exam_id) inner join payment_details e on (a.exam_id = e.candidate_id) where a.exam_id = ?");
		$query->bindParam(1, $appl_id);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['application_data'] = $results;
		}
	}
	public function getYear($year){
		$query = $this->application_db->prepare("select year from year_sat_msce where id = ?");
		$query->bindParam(1, $year);
		$query->execute();
		$result = $query->fetch();
		return $result['year'];
	}
	public function getMsceSitting($appl_id){
		//echo $appl_id;
		$query = $this->application_db->prepare("select * from exam_details where exam_id = ?");
		$query->bindParam(1, $appl_id);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['msce_sitting'] = $results;
		}
	}
	public function setApplicationPeriod($year, $start_date, $end_date){
		$query = $this->application_db->prepare("insert into application_period (app_period_id,start_date,end_date)
					values (?,?,?)");
		$query->bindParam(1,$year);
		$query->bindParam(2, $start_date);
		$query->bindParam(3, $end_date);
		$query->execute();
	}
	public function getApplicationPeriod(){
		$query = $this->application_db->prepare("select * from application_period order by app_id desc limit 1");
		$query->execute();
		$results = $query->fetchAll();
		foreach($results as $result){
			$_SESSION['start_date'] = $result['start_date'];
			$_SESSION['end_date'] = $result['end_date'];
		}
		
	}//end of get application period function
	
}//end of application class.

Class System{
	
	private $system_db;
	
	/**
	*System class constructor
	*/
	public function __construct(){
		try{
			
			$this->system_db= new Connection();
			
			$this->system_db=$this->system_db->dbConnect();
			
			$this->system_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "Error! Could not connect to Server. Please try later.".$e;
		}//end of try-catch statement
		
	}//end of constructors
	public function encrypt($plaintext){
		$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
		
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);

    # prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);

    return  $ciphertext_base64;
	}
	
	public function decrypt($ciphertext){
		$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
		$ciphertext_dec = base64_decode($ciphertext);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    //echo $iv_size;die();
    	# retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    	$iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    	# retrieves the cipher text (everything except the $iv_size in the front)
    	$ciphertext_dec = substr($ciphertext_dec, $iv_size);

    	# may remove 00h valued characters from end of plain text
    	$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    
    	echo  $plaintext_dec; 
	}
	public function getYear(){
		$query = $this->system_db->prepare("select * from year_sat_msce");
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $rows){
			$_SESSION['year'] = $results;
		}
	}
	
	public function getUniversity(){
		$query = $this->system_db->prepare("SELECT name as university_name, code as uni_code FROM university");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['university'] = $results;
		}
	}
	
	public function getProgrammes($university) {
		//echo 'HELK!!!!@@@@@';die();
		$query = $this->system_db->prepare("SELECT programmes.programme as programme FROM programmes 
				INNER JOIN faculty ON(programmes.faculty = faculty.id) 
				INNER JOIN university ON(faculty.university = university.code) where university.code = ? ");
		$query->bindParam(1, $university);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['this_uni'] = $result;
		}
		
	}
	public function getDistrict($order){
		//echo $order;
		$query = $this->system_db->prepare("select district.id as id, district.name as district, district.population, count(contacts.exam_id) as total from  contacts inner join district on(contacts.district = district.id) group by district.id order by ?");
		$query->bindParam(1, $order);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['district'] = $results;
		}
	}
	public function getDistricts(){
		//echo $order;
		$query = $this->system_db->prepare("select district.id as id, district.name as district, district.population, count(contacts.exam_id) as total from  contacts inner join district on(contacts.district = district.id) group by district.id");
		//$query->bindParam(1, $order);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['district'] = $results;
		}
	}
	
	public function retrieveDistricts() {
		$query = $this->system_db->prepare("select * from district");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['districts'] = $results;
		}
	}	
	
	/**public function selectList() {
		$query = $this->system_db->prepare();
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$name = $result['name'];
			$district = $result['district'];
			$points = $result['points'];
			$query2 = $this->system_db->prepare();
			$query2->bindParam(1, $name);
			$query2->bindParam(2, $district);
			$query2->bindParam(3, $points);
			$query2->execute();
		}
	}*/
	
	public function getSpace($district){
		$query = $this->system_db->prepare("select sum(population) as total_pop from district");
		$query->execute();
		$results = $query->fetch(PDO::FETCH_ASSOC);
		$total_population = $results['total_pop'];
		$space = (20-5)*($district/$total_population);
		$_SESSION['distr_space'] = intval($space);
		echo intval($space);
	}
}//end of system class
Class University{
	
	private $uni_db;
	
	/**
	*System class constructor
	*/
	public function __construct(){
		try{
			
			$this->uni_db= new Connection();
			
			$this->uni_db=$this->uni_db->dbConnect();
			
			$this->uni_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "Error! Could not connect to Server. Please try later.".$e;
		}//end of try-catch statement
		
	}//end of constructors
	/**
	*add college function
	*@param code, name, address
	*/
	public function addCollege($Code,$Name,$Address){
		try{
			//query
			$query = $this->uni_db->prepare("INSERT INTO university(code,name,address) VALUES (?,?,?)");
			$query ->bindParam(1, $Code);
			$query ->bindParam(2, $Name);
			$query ->bindParam(3, $Address);
				
			$query->execute();
		}
		catch(PDOException $e){
			
			echo "Error! Something went wrong. Try later.";
			
		}//end of try-catch statement
		
	}//end of add college function
	/**
	*add faculty function
	*@param name, university_id
	*/
	public function addFaculty($name,$uni_id){
		//try{
			//query
			$query = $this->uni_db->prepare("INSERT INTO faculty(name,university) VALUES (?,?)");
			$query ->bindParam(1, $name);
			$query ->bindParam(2, $uni_id);
				
			$query->execute();
		//}
		//catch(PDOException $e){
			
		//	echo "Error! Something went wrong. Try later.";
			
		//}//end of try-catch statement
		
	}//end of add class function
	
	public function retrieve() 
	{
		
		try
		{
			//query
			$sql = $this->uni_db->prepare("SELECT * FROM university");
			$sql->execute();
			$row = $sql ->fetchAll(PDO::FETCH_ASSOC);
			foreach($row as $unima){
				$_SESSION['unima'] = $row;
			}			
		}
		catch(PDOException $e)
		{
			echo "Error! Something went wrong. Try later.";
		}//end of try-catch statement
		
	}
	
}//end of university class

class Programs{
	
	private $program_db;
	/**
	*User class constructor
	*/
	public function __construct(){
		try{
			
			$this->program_db= new Connection();
			
			$this->program_db=$this->program_db->dbConnect();
			
			$this->program_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			
			echo "Error! Could not connect to Server. Please try later. Contact support";
			
		}//end of try-catch statement
		
	}//end of constructors
	
	/**
	*View programmes function
	*
	*@return list of programmes;
	*/
	public function viewPrograms(){
		try{
			
			$query = $this->program_db->prepare("SELECT p.code as code, p.programme as programme, university.name as un_name, p.description as description, p.requirements as requirements, p.duration as duration FROM programmes p 
			INNER JOIN faculty ON(p.faculty = faculty.id) 
				INNER JOIN university ON(faculty.university = university.code)");
			$query->execute();
			$row = $query ->fetchAll(PDO::FETCH_ASSOC);
			foreach($row as $programmes){
				$_SESSION['programmes'] = $row;
			}			
		}
		catch(PDOException $e){
			
			echo "Error! Something went wrong. Contact support.";
			
		}//end of try-catch statement
	}//end of view programmes function
	public function getProgramDetails($id) {
		$query = $this->program_db->prepare("SELECT p.code as code, p.programme as programme, university.name as un_name, f.name as faculty, p.description as description, 				p.requirements as requirements, p.duration as duration FROM programmes p INNER JOIN faculty f ON(p.faculty = f.id) INNER JOIN university ON(f.university = university.code) WHERE p.code=?");
		$query->bindParam(1, $id);
		$query->execute();
		//$query->fetch();
		if($query->rowCount() > 0){
			$details = $query->fetchAll(PDO::FETCH_ASSOC);
			//print_r($details);
			foreach($details as $detail){
				$_SESSION['program_details'] = $details;
			}
		}else {
			header('location:programmes.php');
		}
	
	}
	/**
	*retrieve faculty list function
	*@return list of faculties
	*/
	public function retrieveFaculty(){
		try{
			//query
			$query = $this->program_db->prepare("SELECT * FROM faculty");
			$query->execute();
			$results = $query ->fetchAll(PDO::FETCH_ASSOC);
			foreach($results as $result){
				$_SESSION['faculty'] = $results;
			}			
		}
		catch(PDOException $e){
			
			echo "Error! Something went wrong. Try later.";
			
		}//end of try-catch statement
		
	}//end of retrieve faculty function
	
	
	public function getId($name){
		try{
			//query
			$query = $this->program_db->prepare("SELECT * FROM users WHERE username=?");
			$query ->bindParam(1, $name);
			
			$query->execute();
			$results = $query->fetch();
			
				$_SESSION['userId'] = $results['user_id'];
						
		}
		catch(PDOException $e){
			
			echo "Error! Something went wrong. Try later.";
			
		}//end of try-catch statement
		
	}//end of get id function
	public function availableProgrms(){
		$query = $this->program_db->prepare("select * from programmes");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['prog_avail'] = $results;
		}
	}
	
	
	public function getPass($name){
		try{
			//query
			$query = $this->program_db->prepare("SELECT * FROM users_applicants WHERE exam_id=? ");
			$query ->bindParam(1, $name);
	
				
			$query->execute();
			
			$results = $query->fetch();
		

				$_SESSION['password']	= $results['password'];
	
		}
		catch(PDOException $e){
			
			echo "Error! Something went wrong. Try later.";
			
		}//end of try-catch statement
		
	}//end of get pass function 
	
	/**
	*add programmes function
	*@param program code, university id, program name, description, requirements and duration
	*/
	public function addProgram($prog_code,$fac_id,$description,$program,$duration){
		
		try{
			//query
			
			//echo $prog_code.'   '.$uni_id.'  '.$program.'     '.$description.'     '.$duration;
			//die();
			$query = $this->program_db->prepare("INSERT INTO programmes(code,faculty,description,programme,duration) VALUES (?,?,?,?,?)");
			$query ->bindParam(1, $prog_code);
			$query ->bindParam(2, $fac_id);
			$query ->bindParam(3, $description);
			$query ->bindParam(4, $program);
			$query ->bindParam(5, $duration);
			$query->execute();
	}
	catch(PDOException $e){
			
			echo "Error! Something went wrong here. Try later.";
			
		}//end of try-catch statement
		
	}//end of add program function
	
	//add program requirements
	public function addRequirements($prog,$subj){
		try{
			//query
			$query = $this->program_db->prepare("INSERT INTO requirements(program,subject) VALUES (?,?)");
			$query ->bindParam(1, $prog);
			$query ->bindParam(2, $subj);
			$query->execute();
		}
		catch(PDOException $e){
			
			echo "Error! Something went wrong. Try later.";
			
		}//end of try-catch statement
		
	}//end of add program requirements function function
	
	public function getProgram($q) {
		//echo $q;
		$query = $this->program_db->prepare("select programme, p.code as code from university u inner join faculty f on (u.code = f.university) inner join programmes p on (f.id = p.faculty) where u.code = ?");
		$query->bindParam(1, $q);
		$query->execute();
		$results= $query->fetchAll(PDO::FETCH_ASSOC);

		echo "<option>--select program--</option>";
		foreach($results as $result){
			echo "<option value=".$result['code'].">".$result['programme']."</option>";
		}
		//echo "</select>";
	}//end of get program function
	public function getFaculty($q) {
		//echo $q;
		$query = $this->program_db->prepare("select f.name, f.id from faculty f inner join university u on (f.university = u.code) where u.code = ?");
		$query->bindParam(1, $q);
		$query->execute();
		$results= $query->fetchAll(PDO::FETCH_ASSOC);

		echo "<option>--select program--</option>";
		foreach($results as $result){
			echo "<option value=".$result['id'].">".$result['name']."</option>";
		}
		//echo "</select>";
	}//end of get program function
	
	public function getProgram_requirements()
	{
		
		try
		{
			//get subject name and code
			$sql = $this->program_db->prepare("select * from subjects");
			$sql->execute();
			$row = $sql ->fetchAll(PDO::FETCH_ASSOC);
			foreach($row as $subject){
				$_SESSION['subject']=$row;
			}			
		}
		catch(PDOException $e)
		{
			echo "Error! Something went wrong. Try later.";
		}//end of try-catch statement
		
	}
	
	public function listUniversities(){
		$query = $this->program_db->prepare("select * from university");
		$query->execute();
		$results = $query->fetchAll();
		foreach($results as $result){
			$_SESSION['univ'] = $results;
		}
	}
	public function getTotalUniversities(){
		$query = $this->program_db->prepare("select count(code) as code from university");
		$query->execute();
		$result = $query->fetch();
		return $result['code'];
	}
	public function getTotalPrograms(){
		$query = $this->program_db->prepare("select count(code) as code from programmes");
		$query->execute();
		$result = $query->fetch();
		return $result['code'];
	}
	
}//end of program's class
class Selection{
	private $selection_db;
	
	public function __construct(){
		try{
			$this->selection_db = new Connection();
			$this->selection_db = $this->selection_db->dbConnect();
			$this->selection_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo 'Could not connect to database, try later or contact support';
			die();
		}
		
	}//end of selection constructor
	
	/**
	*/
	public function select($district, $space){
		//echo$district.' '.$space;die();
		$query = $this->selection_db->prepare("select candidate_details.exam_id as student_ID,candidate_details.first_name as 	first_name,candidate_details.last_name as lastname, candidate_details.dob as date_of_birth, candidate_details.sex as sex,	sum(student_grades.grade) as points from candidate_details 
					  	inner join contacts on(candidate_details.exam_id = contacts.exam_id) 
					  	inner join student_grades on (candidate_details.exam_id = student_grades.student_id)
					  	where district = ? 
					  	group by student_ID 
					  	order by points 
					  ");
		$query->bindParam(1, $district);
		//$query->bindParam(2, $space);
		if($query->execute()){
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach($results as $result){
				$stud_id = $result['student_ID'];
				$firstname = $result['first_name'];
				$lastname = $result['lastname'];
				$dob = $result['date_of_birth'];
				$sex = $result['sex'];
				$points = $result['points'];
				
				$temp_query = $this->selection_db->prepare('select * from selection_pool where student_id = ?');
				$temp_query->bindParam(1, $stud_id);
				$temp_query->execute();
				$temp_query->fetch();
				if($temp_query->rowCount() == 0){
				$query2 = $this->selection_db->prepare("insert into selection_pool (student_id, firstname, lastname, dob, sex, points, district) 
							values (?,?,?,?,?,?,?)");
				$query2->bindParam(1, $stud_id);
				$query2->bindParam(2, $firstname);
				$query2->bindParam(3, $lastname);
				$query2->bindParam(4, $dob);
				$query2->bindParam(5, $sex);
				$query2->bindParam(6, $points);
				$query2->bindParam(7, $district);
				$query2->execute();
				}else {
					echo 'Already exist!';
				}
				
			}
		}
			else {
				echo 'Query failed. Try later.';die();
			}
	
	}//end of select function
	
	/**
	*/
	public function getSelectedList(){
		$query = $this->selection_db->prepare("select * from selection_pool inner join district on(district = id)");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['pool'] = $results;
		}
	}//end of get selected list
	
	public function getStudentInfo($stud_id){
		$query = $this->selection_db->prepare("select * from selection_pool where student_id = ?");
		$query->bindParam(1, $stud_id);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$_SESSION['stud_info'] = $results;
		}
	}//end of select program function
	public function getRequiements(){
		$query = $this->selection_db->prepare("select requirements from programmes where code = 'LNR-FORE'");
		$query->execute();
		$results = $query->fetch();
		$string1 = $results[0];
		$string = str_replace(' ', '","',$string1);
		$result = explode(" ", $string);
		
		for($i=0; $i<count($result); $i++) {
		echo $result[$i]."<br>";
	}
		$target = array('Physical','Science');
		if(count(array_intersect($target, $result))){
			echo 'Yes';
		}
	}
	public function sortByChoices($progID){
		$requirements = array();
		$query2 = $this->selection_db->prepare("select subject from requirements where program = ?");
		$query2->bindParam(1, $progID);
		$query2->execute();
		$fetch = $query2->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($fetch as $req){
			array_push($requirements,$req['subject']);
		}
		$requirement = "'".implode("','", $requirements)."'";//exit;
		$progIDs=$progID;
		$query = $this->selection_db->prepare("select p.table as prog_table, firstname, lastname, b.student_id,priority,g_score,sum(grade) as grade_score 								from choice a 
							inner join selection_pool b 
							inner join sex c 
							inner join student_grades r on (a.candidate_id=b.student_id) 
							inner join programmes p on(a.choice = p.code) 
							where b.selected='no' and choice= ? and b.sex=c.sex and r.student_id=b.student_id and subject IN($requirement)  
							group by student_id order by points limit 1");
		$query->bindParam(1, $progID);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $result){
			$id = $result['student_id'];
			$name = $result['firstname'];
			$scores = $result['priority'] + $result['g_score'] + $result['grade_score'];
			$program = $result['prog_table'];
			
			//inserts selected students into law table
			$query2 = $this->selection_db->prepare("insert into $program (id,name,scores) values(?,?,?)");
			//$query2->bindParam(1, $progID);
			$query2->bindParam(1, $id);
			$query2->bindParam(2, $name);
			$query2->bindParam(3, $scores);
			$query2->execute();
		
			//update the pooled column to keep track of the selected students
			$query3 = $this->selection_db->prepare("update selection_pool pool set pool.program=? where pool.student_id=?");
			$query3->bindParam(1, $progID);
			$query3->bindParam(2, $id);
			$query3->execute();
		}
	}
		public function getSelectedStudents(){
		
		//selects selected student's details
		//	$query = $this->selection_db->prepare("select student_id,firstname,lastname,previous_school,programme from selection_pool s inner join programmes p on (s.program=p.code) inner join academic_history a on (s.student_id=a.exam_id)");
		$query = $this->selection_db->prepare("select student_id,firstname,lastname,previous_school,programme,email from selection_pool s 
		inner join programmes p on (s.program=p.code) inner join academic_history a on (s.student_id=a.exam_id) 
		inner join users_applicants u on(u.exam_id=a.exam_id)");
		$query->execute();
			$row = $query ->fetchAll(PDO::FETCH_ASSOC);
			foreach($row as $students){
				$_SESSION['students'] = $row;
			}
		}
}//end of selection class

?>