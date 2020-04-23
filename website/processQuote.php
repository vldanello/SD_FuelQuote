<?PHP
include 'FuelQuote.php';

// ini_set("display_errors",E_ALL);


$gallonsRequested = $_POST['gallonsRequested'];
$deliveryDate = $_POST['deliveryDate'];
$uid = $_POST['uid'];

$f = new FuelQuote($uid,$gallonsRequested,$deliveryDate);

$info = [	
			"suggestedPrice"=>$f->getRate(),
			"totalAmountDue"=>$f->getRate()*$gallonsRequested
		];

echo json_encode($info); 






?>