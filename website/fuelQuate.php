<?PHP
session_start();

include "Database.php";

date_default_timezone_set("America/Chicago");
$db = new Database();

$sql="SELECT * from users where login_id = '$_COOKIE[id]'";
$db->query($sql);
$user = $db->single();

$sql="SELECT * from client_information where login_id = '$_COOKIE[id]'";
$db->query($sql);
$info_user = $db->single();
#echo"<PRE>";
#print_r($_COOKIE[id]); die;

if(!$_COOKIE['id']){
	header('Location: index.php');
}


$sql="SELECT city from client_information where login_id = '$_COOKIE[id]'";
$db->query($sql);
$city = $db->single();


$today = new DateTime();








?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
 <!-- <link rel="stylesheet" href="css/style.css">-->
 
 
 
 
  <script>
		function noEdit(event){
			event.preventDefault();
		}

  </script>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <a href="index.html" class="navbar-brand"></a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="fuelQuate.php" class="nav-link active">Fuel Quote</a>
          </li>
          <li class="nav-item px-2">
            <a href="posts.php" class="nav-link">Fuel Quote History</a>
          </li>
          
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user"></i> Welcome <?PHP echo $user->userName; ?>
            </a>
            <div class="dropdown-menu">
              <a href="profile.php" class="dropdown-item">
                <i class="fas fa-user-circle"></i> Profile
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="logoutScript.php" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            <i class="fas fa-folder"></i> Fuel Quote</h1>
        </div>
      </div>
    </div>
  </header>
  

			
								   <!-- input info form here -->
								   <section id="profile">
									<div class="container">
									  <div class="row">
										<div class="col-md-9">
										  <div class="card">
											<div class="card-header">
										   
											</div>
											
											<div class="card-body">
											  <form onsubmit="return validateF()" action="fuelQuoteScript.php" method="POST" autocomplete="off">
												<input type="hidden" name="uid" id="uid" value="<?= $_COOKIE['id']; ?>">
												<div class="form-group">
												  <label for="gallonsRequested">GallonsRequested </label>
												  <input type="text" min=0 onkeyup="document.getElementById('suggestedPrice').value=pricing(this.value)"  name = "gallonsRequested" id = "gallonsRequested" placeholder="0" required class="form-control">
												</div>
												<div class="form-group">
												  <label for="address1">Address1</label>
													<input type="text" name="address1" autocomplete="off" placeholder="Address1" maxlength=100 required class="form-control" value ="<?PHP echo $info_user->address1; ?>" onclick="noEdit(event)" onfocus="noEdit(event)" onkeydown="noEdit(event);">
												</div>
												<div class="form-group">
												  <label for="address2">Address2 </label>
												  <input type="text" name="address2" autocomplete="off" placeholder="Address2 (Optional)" maxlength=100 class="form-control"value ="<?PHP echo $info_user->address2; ?>" onkeydown="noEdit(event);">
												</div>
												<div class="form-group">
												  <label for="city">City </label>
												  <input type="text" name="city" autocomplete="off" placeholder="City" maxlength=100 required class="form-control" value ="<?PHP echo $info_user->city; ?>" onkeydown="noEdit(event);" >
												</div>
												<div class="form-group">
												  <label for="state">State</label>  
												  <input type="text" name="state" autocomplete="off" placeholder="State" maxlength=100 required class="form-control" value ="<?PHP echo $info_user->state; ?>" onkeydown="noEdit(event);" >
												</div>
												<div class="form-group">
												  <label for="zip">Zip Code</label>
												  <input type="text" name = "zip" autocomplete="off" placeholder="Zip" maxlength=100 required class="form-control" value ="<?PHP echo $info_user->zip; ?>" onkeydown="noEdit(event);" >
												</div>
												<div class="form-group">
												  <label for="deliveryDate">Delivery Date</label>
												  <input type="date" name = "deliveryDate" id = "deliveryDate" placeholder="yyyy-mm-dd" required class="form-control datepickstart" min="<?= $today->format('Y-m-d')?>" value="<?= $today->format('Y-m-d')?>">
												</div>
												<div class="form-group">
												  <label for="suggestedPrice">Suggested price</label>
												  <input type="text" onkeydown="noEdit(event);" id="suggestedPrice"   name = "suggestedPrice"   class="form-control" required onkeydown="noEdit(event);">
												</div>
												<div class="form-group">
												  <label for="totalAmountDue">Total Amount Due</label>
												  <input type="text" onkeydown="noEdit(event);" id="totalAmountDue" name = "totalAmountDue"    class="form-control" required onkeydown="noEdit(event);">
												</div>
									
												<button onclick="getPrice(event);" class="btn btn-warning btn-block">Get Price</button>	
												
												<input type="submit" value="Submit" class="btn btn-primary btn-block">
												
											  </form>
											</div>
										</div>
										</div>
										 </section>
											 
 
  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
      <div class="row">
        <div class="col"> 
        </div>
      </div>
    </div>
  </footer>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
   
   <!--<script src="price.js"> </script>-->
   <script>
		function getPrice(event){
			event.preventDefault();
			var uid = document.getElementById('uid');
			var deliveryDate = document.getElementById('deliveryDate');
			var gallonsRequested = document.getElementById('gallonsRequested');
			var suggestedPrice = document.getElementById('suggestedPrice');
			var totalAmountDue = document.getElementById('totalAmountDue');
			
			var data = {"gallonsRequested":gallonsRequested.value,"deliveryDate":deliveryDate.value,"uid":uid.value};

		var r = $.ajax({
				url:'processQuote.php',
				type:'POST',
				data:data,
				dataType: 'json',
				success:function(msg){
					suggestedPrice.value = formatNum(msg.suggestedPrice,2);
					totalAmountDue.value = formatNum(msg.totalAmountDue,2);
					
				}
			})
		}
		function validateF(){
			
			var suggestedPrice = document.getElementById('suggestedPrice');
			var totalAmountDue = document.getElementById('totalAmountDue');
			if (suggestedPrice.value == "" || totalAmountDue.value =="") {
				return false; 
			}else{
				return true;
			}
			
		}
		function formatNum(num,digits) {
                num=num*1;
			return num.toFixed(digits).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1")
		}
		
		$('#deliveryDate').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            clearBtn : true,
            startDate : new Date()
        })
					
					
   </script>

   
</body>



</html>