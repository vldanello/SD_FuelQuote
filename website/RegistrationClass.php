<?PHP
include "Database.php";

Class RegistrationClass
{
	public $post;
	
	public $userName;
	public $password;
	public $passwordConfirm;
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		
		$this->userName = $this->post['userName'];
		$this->password = $this->post['password'];
		$this->passwordConfirm = $this->post['passwordConfirm'];// $this points to the class property.

		
		$sql = "SELECT * FROM users WHERE userName = '$this->userName'";
		$this->db->query($sql);
		$this->result = $this->db->single(); // $this->result->userName
		$this->checkUsrNm();
		$this->checkpwd();
		$this->setUserCookie();
		$this->setClient();
		
	}
	
	public function render(){
	  echo "<pre>";
	  print_r($this->post);
	}
	public function checkUsrNm(){
		
		if($this->result->userName){
			
		header("Location: http://www.eatsmenu.com/registration.php?ue=1");
	 }
	}
	public function checkpwd(){
		if ($this->password == $this->passwordConfirm && !empty($this->userName) ) {
			
			$sql = "INSERT INTO users (userName,password) VALUES ('$this->userName', '$this->password') ";
			$this->db->query($sql);
			$this->db->execute();
			
			} else {
			  header("Location: http://www.eatsmenu.com/registration.php?nm=1"); /* Redirect browser */
			
			}
		}
	public function setUserCookie(){
		setcookie('id',$this->db->lastInsertId,time()+(60*60),'/');
	}
	
	public function setClient(){
			$lastId = $this->db->lastInsertId;
			$sql = "INSERT INTO client_information (login_id) VALUES ('$lastId') ";
			$this->db->query($sql);
			$this->db->execute();
			
			header("Location: http://www.eatsmenu.com/profile.php"); /* Redirect browser */
		
	}
	
		
		
		
 }
	
