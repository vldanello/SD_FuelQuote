<?PHP
session_start();

include "Database.php";


$db = new Database();

$sql="SELECT * from users where id = '$_COOKIE[id]'";
$db->query($sql);
$user = $db->single();

if(!$_COOKIE['id']){
	header('Location: index.php');
}


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
  <link rel="stylesheet" href="css/style.css">
  <title>COSC 4353 </title>
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
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
              <form action="fuelQuoteScript.php" method="POST" autocomplete="off">
                <div class="form-group">
                  <label for="gallonsRequested">GallonsRequested </label>
                  <input type="text" min=0 onkeyup="document.getElementById('suggestedPrice').value=pricing(this.value)"  name = "gallonsRequested" placeholder="0" required class="form-control">
                </div>
                <div class="form-group">
                  <label for="address1">Address1</label>
                    <input type="text" name="address1" autocomplete="off" placeholder="Address1" maxlength=100 required class="form-control" value ="<?PHP echo $user->address1; ?>" onclick="noEdit(event)" onfocus="noEdit(event)" onkeydown="noEdit(event);">
                </div>
                <div class="form-group">
                  <label for="address2">Address2 </label>
                  <input type="text" name="address2" autocomplete="off" placeholder="Address2 (Optional)" maxlength=100 class="form-control"value ="<?PHP echo $user->address2; ?>" onkeydown="noEdit(event);">
                </div>
                <div class="form-group">
                  <label for="city">City </label>
                  <input type="text" name="city" autocomplete="off" placeholder="City" maxlength=100 required class="form-control" value ="<?PHP echo $user->city; ?>" onkeydown="noEdit(event);" >
                </div>
                <div class="form-group">
                  <label for="state">State</label>  
                  <input type="text" name="state" autocomplete="off" placeholder="State" maxlength=100 required class="form-control" value ="<?PHP echo $user->state; ?>" onkeydown="noEdit(event);" >
                </div>
                <div class="form-group">
                  <label for="zip">Zip Code</label>
                  <input type="text" name = "zip" autocomplete="off" placeholder="Zip" maxlength=100 required class="form-control" value ="<?PHP echo $user->zip; ?>" onkeydown="noEdit(event);" >
                </div>
                <div class="form-group">
                  <label for="deliveryDate">Delivery Date</label>
                  <input type="date" name = "deliveryDate" placeholder="yyyy-mm-dd" required class="form-control"> 
                </div>
                <div class="form-group">
                  <label for="suggestedPrice">Suggested price</label>
                  <input type="text" onkeydown="noEdit(event);" id="suggestedPrice"   name = "suggestedPrice"   class="form-control">
                </div>
                <div class="form-group">
                  <label for="totalAmountDue">Total Amount Due</label>
                  <input type="text" onkeydown="noEdit(event);" id="totalAmountDue" name = "totalAmountDue"    class="form-control">
                </div> 
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
   
   <script src="price.js"> </script>
   
</body>

</html>