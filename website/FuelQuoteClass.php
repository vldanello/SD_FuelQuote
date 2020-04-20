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
	public $cl_id;
	public $login_id;
	
	
	public $db;
	public $result;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->id =$_COOKIE['id'];
		$this->gallonsRequested = $this->post['gallonsRequested'];
		$this->deliveryDate = $this->post['deliveryDate'];
		$this->suggestedPrice = $this->post['suggestedPrice'];// $this points to the class property.
		$this->totalAmountDue = $this->post['totalAmountDue'];
		$this->address1 = $this->post['address1'];
		$this->address2 = $this->post['address2'];// $this points to the class property.
		$this->city = $this->post['city'];
		$this->state = $this->post['state'];
		$this->zip = $this->post['zip'];
		
		$sql = "SELECT client_id FROM client_information where login_id = '$this->id' ";
		$this->db->query($sql);
		$this->cl_result = $this->db->single(); 
		$cl_id = $this->cl_result;
		//echo"<PRE>";
		//print_r($cl_id);
		
		$sql = "SELECT * FROM users WHERE login_id = '$this->id'";
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
			$sql = "INSERT INTO fuelQuote(client_id,
			address1,
			city, 
			state, 
			zip, 
			gallonsRequested,
			suggestedPrice,
			totalAmountDue,
			deliveryDate,
			login_id) 
			VALUES ('3',
			'$this->address1',
			'$this->city', 
			'$this->state',
			'$this->zip',
			'$this->gallonsRequested',
			'$this->suggestedPrice',
			'$this->totalAmountDue',
			'$this->deliveryDate',
			'$this->id')";
	
	//echo $sql;die;
	$this->db->query($sql);
	$this->db->execute();	
	  exit(header("Location: http://www.eatsmenu.com/posts.php"));
		}
	}
	
	
 
 }	
	