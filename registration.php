<?PHP

if(isset($_GET['ue'])){
	echo "<div class='alert alert-danger'><strong>User Already Exists. Please select a different username.</div>";
}

if(isset($_GET['nm'])){
	echo "<div class='alert alert-danger'><strong>Password does not match.</div>";
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
</head>

<body>
  

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            Registration Form</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="index.php" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left"></i> Back To Log In Page
          </a>
          </div>
      </div>
    </div>
  </section>

  <!-- DETAILS -->
 
  <section id="details">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Create Profile</h4>
                </div>
                  <div class="card-body">
                    <form action="login.php" method="POST">
                      <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" name="userName" minlength=4 maxlength=50 class="form-control" required>
                      </div>
                      <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" minlength=3 maxlength=10 class="form-control" required>
                      </div>
                      <div class="form-group">
                      <label for="passwordConfirm">Confirm Password</label>
                      <input type="password" name="passwordConfirm" minlength=3 maxlength=10 class="form-control"  required>
                      </div>
                      <input type="submit" value="Login" class="btn btn-primary btn-block">
                    </form>
            </section>
  


  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
      
    </div>
  </footer>


  


  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  
</body>

</html>