<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);

Class ProfileClass
{
	public $post;
	
	public $fullName;
	public $address1;
	public $address2;
	public $city;
	public $state;
	public $zip;
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->id =$_COOKIE['id'];
		$this->fullName = $this->post['fullName'];
		$this->address1 = $this->post['address1'];
		$this->address2 = $this->post['address2'];// $this points to the class property.
		$this->city = $this->post['city'];
		$this->state = $this->post['state'];
		$this->zip = $this->post['zip'];
		

		
		$sql = "SELECT * FROM users WHERE id = '$this->id'";
		$this->db->query($sql);
		$this->result = $this->db->single(); // $this->result->userName
		$this->checkCookie();
		$this->profileFill();
	}
	public function render(){
	  echo "<pre>";
	  print_r($this->result);
	}
	
	public function checkCookie(){
	 if(!$_COOKIE['id']){
		header('Location: index.php');
		}
	}

	
	public function profileFill(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
		$sql = "UPDATE users 
			SET fullName='$this->fullName', address1='$this->address1',address2='$this->address2', city='$this->city', state='$this->state', zip='$this->zip'
			WHERE id ='$this->id' ";
		$this->db->query($sql);
		$this->result = $this->db->execute();
		header("Location: http://www.eatsmenu.com/fuelQuate.php");
		}
	}
}
		
		
		
 
	