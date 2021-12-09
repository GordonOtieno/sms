<?php 

  
class project2
	
{
	public $server = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "smsv2";
	public $connectdb;
	
	function __construct()
	{
		$this->connectdb = new mysqli($this->server,$this->username,$this->password,$this->dbname);
		if($this->connectdb->connect_error)
		{
			die("connection failed");
		}
	}
	
    public function hackme()
    {
        $this->connectdb = new mysqli($this->server,$this->username,$this->password,$this->dbname);
        return $this->connectdb;
    }
	/* public function student_login_check($st_username,$st_password)
	{ 
		$st_login_check = "SELECT  * from students where st_username = '$st_username' and st_password='$st_password'";
		$st_login_run = $this->connectdb->query($st_login_check);
		$st_login_num = $st_login_run->num_rows;
		return $st_login_num;
	}

	public function student_info_select($st_username)
	{
		$student_info_sel = "SELECT * from st_info where st_username='$st_username'";
		$student_info_run = $this->connectdb->query($student_info_sel);
		
		return $student_info_run;
	}
	*/
	public function student_count()
	{
		$student_info_sel = "SELECT * from students";
		$student_info_run = $this->connectdb->query($student_info_sel);
		
		return $student_info_run;
	}
		
	
	/////////////////////////////// ADMINNNNNNNNNNNNNNNNN--------------------------
	
	public function meadmin_check($admin_username,$admin_password)
	{
		$meadin_login_select = "SELECT * from teaching_staff where username='$admin_username' AND pass='$admin_password'";
		$meadmin_login_run = $this->connectdb->query($meadin_login_select);
		// var_dump($meadmin_login_run);
		if($meadmin_login_run){
		$meadmin_login_num = $meadmin_login_run->num_rows;
		return $meadmin_login_num;
		}
		
	}
	public function meadmin_username($adminname)
	{
		$meadmin_username_select = "SELECT * from teaching_staff where username='$adminname'";
		$meadmin_username_run = $this->connectdb->query($meadmin_username_select);
		return $meadmin_username_run;
	}

	public function meadmin_updatepassword($password_update,$username)
	{
		$admin_password_update = "UPDATE teaching_staff set pass='$password_update' where username='$username'";
		$password_update_run = $this->connectdb->query($admin_password_update);
		return $password_update_run;
	}
	
	//////////////////////////////////Teacher Info ////////////////////////////////
	public function teacher_info($adminname,$t_staff_type)
	{
		switch($t_staff_type)
		{
			case "admin":
			$teacher_info_select = "SELECT * from teaching_staff where designation='$t_staff_type' AND username='$adminname'";
			break;
			case "teacher":
			$teacher_info_select = "SELECT * from teaching_staff where designation='$t_staff_type' AND username='$adminname'";
			break;
			default :
				echo "no teacher found";
		}
		$teacher_info_select_run = $this->connectdb->query($teacher_info_select);
		return $teacher_info_select_run;
		
	
		
	}
	public function teacher_info_display_admin()
	{
		$teacher_info_admin = "SELECT * from teaching_staff where status='active'";
		$teacher_info_admin_run = $this->connectdb->query($teacher_info_admin);
		return $teacher_info_admin_run;
	}
	///// display teacher info in  student panel
	public function teacher_info_instudent($st_grade)
	{
		$teacher_info_instudent_select = "SELECT * from subjects_info where grade='$st_grade'";
		$teacher_info_instudent_run = $this->connectdb->query($teacher_info_instudent_select);
		return $teacher_info_instudent_run;
		
	}
	////////////////////////End Teacher Info ------------//////////////////////
	
	///////////////////////// student password update //////////
	
	public function student_password_change($st_password_update,$st_username)
	{
		$student_password_update = "UPDATE st_info set st_password='$st_password_update' where st_username='$st_username'";
		$student_password_update_run = $this->connectdb->query($student_password_update);
		return $student_password_update_run;
	}
	
	
	
	///////////////////------- end student password update --------------//////////////
	
	///////////////////-------- display subject in admin ----------------////////
	public function subject_info()
	{
		
		$subject_info_admin = "SELECT * from departments";
		$subject_info_admin_run = $this->connectdb->query($subject_info_admin);
		return $subject_info_admin_run;
	}
	
	////////////  edit teacher information ////////////////////
	
	public function edit_teacherid($teacher_id)
	{
		$edit_teacherid = "SELECT * from teaching_staff where staff_id='$teacher_id'";
		$edit_teacherid_run = $this->connectdb->query($edit_teacherid);
		return $edit_teacherid_run;
	}
	///////////////// update teacher info from admin/////////////
	public function update_teacher_info($up_fullname,$up_address,$up_email,$up_father,$up_mother,$up_dob,$up_qualification,$up_contact,$up_staff,$up_gender,$teacher_id)
	{
		$update_teacher_info_select = "UPDATE teacher_info set t_fullname='$up_fullname',t_address='$up_address',t_email='$up_email',t_father='$up_father',t_mother='$up_mother',t_dob='$up_dob',t_qualification='$up_qualification',t_contact='$up_contact',t_staff_type='$up_staff',t_gender='$up_gender' where t_id='$teacher_id'";
		$update_teacher_info_run = $this->connectdb->query($update_teacher_info_select);
		return $update_teacher_info_run;
	}
	
	////////// add new teacher form admin ////////////////////////
	public function add_teacher($add_idno,$add_fname,$add_lname,$add_tscno,$new_dob,$add_gender,$new_doe,$add_email,$add_username,$add_password,$add_qualification,$add_phone,$add_staff_type,$add_designation,$add_department)
	{
	$add_teacher = "insert into teaching_staff(staff_id,f_name,l_name,tsc_no,gender,email,username,pass,Highest_qualification,phone_no,staff_type,designation,department) value ('$add_idno','$add_fname','$add_lname','$add_tscno','$add_gender','$add_email','$add_username','$add_password','$add_qualification','$add_phone','$add_staff_type','$add_designation','$add_department')";
	$add_teacher_run = $this->connectdb->query($add_teacher);
		return $add_teacher_run;
	}
	
	//////// delete teacher form admin //////////////////////
	public function delete_teacher($del_teacher)
	{
	$delete_teacher_info = " delete from teacher_info where t_id='$del_teacher'";
	$delete_teacher_info_run = $this->connectdb->query($delete_teacher_info);
	return $delete_teacher_info_run;
	}
	////////////////////// looping class from subject info table////////////////
	public function grade($grade)
	{
		$grade_select = "SELECT grade_name, grade_id from class";
		$grade_run = $this->connectdb->query($grade_select);
		return $grade_run;
	}
	
	
	///////////// display data from st_info select st-grade ///////////
	public function grade_st_info($grade_st_data)
	{
		$grade_st_info_select = "SELECT * from st_info where st_grade='$grade_st_data'";
		$grade_st_info_run = $this->connectdb->query($grade_st_info_select);
		return $grade_st_info_run;
	}
	////////// active student info display by class //////////////////////////
	public function student_info_display_admin($class_students_data)
	{
		$student_info_display_admin_select = "SELECT * from students where grade_id ='$class_students_data' AND status='active'";
		$student_info_display_admin_run = $this->connectdb->query($student_info_display_admin_select);
		return $student_info_display_admin_run;
	}
    ///////// all student info display by class //////////////////////////
	public function student_info_display_all($class_students_data)
	{
		$student_info_display_admin_select = "SELECT * from students where grade_id ='$class_students_data'";
		$student_info_display_admin_run = $this->connectdb->query($student_info_display_admin_select);
		return $student_info_display_admin_run;
	}

	/////////// add student from admin panel /////////////////////
	public function add_student($std_number,$v_fname,$v_lname,$std_gender,$newDate,$std_grade,$admin_date,$std_precondition,$std_residential,$std_guardianName,$guardian_contact1,$guardian_contact2, $guardian_email)
	{   $add_student_insert ="INSERT INTO students (student_no,f_name,l_name,gender,dob,grade_id,admission_date,pre_condition,residential_area,guardian_name,guardian_contact1,guardian_contact2,guardian_email) VALUES ('$std_number', '$v_fname'', '$v_lname', '$std_gender', '$newDate', '$std_grade', '$admin_date', '$std_precondition', '$std_residential', '$std_guardianName', '$guardian_contact1', '$guardian_contact2', '$guardian_email')";
		//$add_student_insert = "insert into students(student_no,f_name,l_name,gender,dob,grade_id,admission_date,pre-condition,residential_area,guardian_name,guardian_contact1,guardian_contact2,guardian_email) value ('$std_number','$v_fname','$v_lname','$std_gender','$newDate','$std_grade','$admin_date','$std_precondition','$std_residential','$std_guardianName','$guardian_contact1','$guardian_contact2', '$guardian_email')";
		$add_student_run = $this->connectdb->query($add_student_insert);
		return $add_student_run;
	}
	
	///////////// General Information about website ///////////
	public function general_setting($web_name,$web_address,$web_phone1,$web_phone2,$web_email1,$web_email2,$web_start,$web_about)
	{
		$general_setting_insert = "insert into general_setting(website_name,website_address,website_phone1,website_phone2,website_email1,website_email2,website_start,web_about) value('$web_name','$web_address','$web_phone1','$web_phone2','$web_email1','$web_email2','$web_start','$web_about')";
		$general_setting_run = $this->connectdb->query($general_setting_insert);
		return $general_setting_run;
	}
	public function general_setting_check()
	{
		$general_setting_check = "SELECT * from general_setting";
		$general_setting_run = $this->connectdb->query($general_setting_check);
		return $general_setting_run;
	}
	public function general_setting_update($upweb_name,$upweb_address,$upweb_phone1,$upweb_phone2,$upweb_email1,$upweb_email2,$upweb_start,$upweb_about)
	{
		$update_general_setting = "UPDATE general_setting set website_name='$upweb_name',website_address='$upweb_address',website_phone1='$upweb_phone1',website_phone2='$upweb_phone2',website_email1='$upweb_email1',website_email2='$upweb_email2',website_start='$upweb_start',web_about='$upweb_about'";
	 $update_general_run = $this->connectdb->query($update_general_setting);
		return $update_general_run;
	}
	public function meravi_add_table($Nepdev_table_Name,$Nepdev_student_name,$Nepdev_student_grade,$Nepdev_subject1,$Nepdev_subject2,$Nepdev_subject3,$Nepdev_subject4,$Nepdev_subject5,$Nepdev_subject6,$Nepdev_subject7,$Nepdev_subject8,$Nepdev_subject9,$Nepdev_subject10,$Nepdev_subject11)
	{
		$Meravi_database = "CREATE TABLE $Nepdev_table_Name(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,$Nepdev_student_name varchar(250) Null,$Nepdev_student_grade varchar(10) null,$Nepdev_subject1 varchar(250) null,$Nepdev_subject2 varchar(250) null,$Nepdev_subject3 varchar(250) null,$Nepdev_subject4 varchar(250) null,$Nepdev_subject5 varchar(250) null,$Nepdev_subject6 varchar(250) null,$Nepdev_subject7 varchar(250) null,$Nepdev_subject8 varchar(250) null,$Nepdev_subject9 varchar(250) null,$Nepdev_subject10 varchar(250) null,$Nepdev_subject11 varchar(250) null)";
		$Meravi_run = $this->connectdb->query($Meravi_database);
		return $Meravi_run;
	}
	public function Nepdev_Exam_Term($Nepdev_exam_term)
	{
		$Nepdev_Select = "SELECT * FROM exam_term where name='$Nepdev_exam_term'";
		$Nepdev_Run = $this->connectdb->query($Nepdev_Select);
		if($Nepdev_Run->num_rows>0)
		{
			echo "<script>alert('You Have ALready Added $Nepdev_exam_term');</script>";
		}
		else
		{
			$Nepdev_Add = "INSERT INTO exam_term(name) VALUES('$Nepdev_exam_term')";
			$Nedev_Add_Run = $this->connectdb->query($Nepdev_Add);
			if($Nedev_Add_Run==true)
			{
				echo "<script>alert('Success Added $Nepdev_exam_term');</script>";
				}
			}
			return 	$Nepdev_Run;
	}

	public function department($department)
	{
		$department_select = "SELECT  department_id, department_name from departments";
		$department_run = $this->connectdb->query($department_select);
		return $department_run;
	}

    public function department_head()
	{
		$department_head_select = "SELECT  staff_id, username from teaching_staff where status='active'";
		$department_run = $this->connectdb->query($department_head_select);
		return $department_run;
	}
     
	public function add_department($dept_id,$dept_name,$dept_head){
		{   $add_department ="INSERT INTO departments (department_id,department_name,department_head) value ('$dept_id','$dept_name','$dept_head')";
			$add_department_run= $this->connectdb->query($add_department);
			echo $add_department_run;
		}

	}
	public function department_update(){
		{   $select_department ="SELECT department_id, department_name from departments";
			$select_department_run= $this->connectdb->query($select_department);
			return $select_department_run;
		}

	}
	public function get_departments(){
		{   $select_departments ="SELECT * from departments";
			$select_departments_run= $this->connectdb->query($select_departments);
			return $select_departments_run;
		}

	}
		public function get_department($dep_id){
			{   $select_department ="SELECT * from departments where department_id='$dep_id'";
				$select_department_run= $this->connectdb->query($select_department);
				return $select_department_run;
			}

	}
	public function student_get($classid){
		{   $student_select ="SELECT student_no, f_name,l_name FROM students WHERE grade_id='$classid'"; 
			$select_student_run= $this->connectdb->query($student_select);
			return $select_student_run;
		}

	}
	

	public function students_results_info($grade){
		{   $students_results ="SELECT * FROM results WHERE class_id ='$grade'"; 
			$select_students_results_run= $this->connectdb->query($students_results);
			return $select_students_results_run;
		}

	}

	}
$ravi = new project2;
