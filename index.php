<?PHP
 if(isset($_GET['lo']))
 {
	echo "<div class='alert alert-success'><strong>You have logged out.</div>";}
 if (isset($_GET['wp']))
 {
	echo "<div class='alert alert-danger'><strong>Your username or password does not match</div>";}

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
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      
    </div>
  </nav>

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            <i class="fas fa-user"></i> UH Fuel Rate Login</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </section>

  <!-- LOGIN -->
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>User Login</h4>
            </div>
            <div class="card-body">
              <form action="indexScript.php" method="POST">
                <div class="form-group">
                  <label for="userName">User Name</label>
                  <input type="text" name="userName" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <input type="submit" value="Login" class="btn btn-primary btn-block">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark text-white mt-<section id="actions" class="py-4 mb-4 bg-light">
    <a href="registration.php" class="btn btn-light btn-block">
       Registration Form
    </a> 
  </footer>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>


 
 
</body>

</html>