<?PHP
include 'Database.php';

Class FuelQuote
{
	private $customer;
	private $customerHistory;
	private $pricePerGallon = 1.50;
	private $locationFactor;
	private $rateHistoryFactor;
	private $gallonsRequestedFactor;
	private $outofstate; //boolean
	private $rateFluctuation; 
	public $gallonsRequested; 
	private $dateRequested; 
	
	private $db;
	
	public $COMPANYPROFITFACTOR = 0.10;
	
	public function __construct(int $id, float $gallonsRequested,string $dateRequested)
	{	
		$this->gallonsRequested = $gallonsRequested;
		$this->dateRequested = $dateRequested;
		
		$this->db = new Database();
		$this->db->query("SELECT * FROM client_information WHERE login_id = '$id' ");
		$this->customer = $this->db->single();	
		
		$this->db = new Database();
		$this->db->query("SELECT * FROM fuelQuote WHERE login_id = '$id' ");
		$this->customerHistory = $this->db->resultSet();	
		
		$this->setLocationFactor();
		$this->setHistoryFactor();
		$this->setGallonsRequestedFactor();
		$this->setRateFluctuation();
		
	}
	
	public function getRate()
	{
		return $this->pricePerGallon * ($this->locationFactor - $this->rateHistoryFactor + $this->gallonsRequestedFactor 
		+ $this->COMPANYPROFITFACTOR + $this->rateFluctuation) + $this->pricePerGallon;
	}
	
	public function setLocationFactor()
	{
		$this->outofstate = 	($this->customer->state != "TX") ? true : false;
		$this->locationFactor = ($this->outofstate) ? 0.04 : 0.02;
		
	}
	
	public function setHistoryFactor()
	{	
		$this->rateHistoryFactor = (!empty($this->customerHistory)) ? 0.01 : 0;		
	}

	public function setGallonsRequestedFactor()
	{	
		$this->gallonsRequestedFactor = (($this->gallonsRequested) > 1000) ? 0.02 : 0.03;		
	}
	
	public function setRateFluctuation()
	{	
		$requestedDate = new DateTime($this->dateRequested);
		
		$month = $requestedDate->format('m');
		
		if($month >=6 && $month <=8){
			$this->rateFluctuation = 0.04;
		}else{
			$this->rateFluctuation = 0.03;
		}				
	}
		
	function showSettings(){
		echo "const ".$this->COMPANYPROFITFACTOR."<BR>";
		echo "Price per gallon: " .$this->pricePerGallon . "<BR>";
		echo "Location Factor: ". $this->locationFactor . "<BR>";
		echo "Rate History Factor: " .$this->rateHistoryFactor . "<BR>";
		echo "Gallons Requested Factor: ". $this->gallonsRequestedFactor . "<BR>";
		echo "Out of state Factor: " .($this->outofstate) ? "True" : "False" . "<BR>";
		echo "Rate Fluctuation Factor: " .$this->rateFluctuation . "<BR>";
		echo "Gallons Requested: " . $this->gallonsRequested . "<BR>";
		echo "Date Requested: " . $this->dateRequested . "<BR>";
	}

}
?>
