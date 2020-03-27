<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);

Class FuelQuoteClass{
	
	public $post;
	
	public $gallonsRequested;
	public $deliveryDate;
	public $suggestedPrice;
	public $totalAmountDue;
	public $address1;
	public $address2;
	public $city;
	public $state;
	public $zip;
	public $userId;
	
	
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->userId =$_COOKIE['id'];
		$this->gallonsRequested = $this->post['gallonsRequested'];
		$this->deliveryDate = $this->post['deliveryDate'];
		$this->suggestedPrice = $this->post['suggestedPrice'];// $this points to the class property.
		$this->totalAmountDue = $this->post['totalAmountDue'];
		$this->address1 = $this->post['address1'];
		$this->address2 = $this->post['address2'];// $this points to the class property.
		$this->city = $this->post['city'];
		$this->state = $this->post['state'];
		$this->zip = $this->post['zip'];
		

		
		$sql = "SELECT * FROM users WHERE id = '$this->id'";
		$this->db->query($sql);
		$this->result = $this->db->single(); // $this->result->userName
		$this->checkCookie();
		$this->fuelInfo();
		
	}
	public function checkCookie(){
	 if(!$_COOKIE['id']){
		header('Location: index.php');
		}
	}
	
	
	public function fuelInfo(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$sql = "INSERT INTO history(userId, address1, city, state, zip, gallonsRequested, suggestedPrice, totalAmountDue, deliveryDate) VALUES ('$this->userId','$this->address1', '$this->city', '$this->state','$this->zip','$this->gallonsRequested', '$this->suggestedPrice', '$this->totalAmountDue','$this->deliveryDate')";
	
	//echo $sql;die;
	$this->db->query($sql);
	$this->db->execute();	
	header("Location: http://www.eatsmenu.com/posts.php");
		}
	}
	
	
 
 }	
	