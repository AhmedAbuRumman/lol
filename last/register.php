<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php




// define variables and set to empty values
$nameErr = $passErr = $repassErr= $phoneErr = $error = "";
$name = $pass = $repass = $phone = "";


session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Username is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["pass"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["pass"]);
  }

  if (empty($_POST["repass"])) {
    $repassErr = "Password is required";
  } else {
    $repass = test_input($_POST["repass"]);
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Number Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }
  if(($_POST["repass"])!=($_POST["pass"])){
      $error = "Password Not Matching"; 
  }else{
    if (!empty($name)&&!empty($pass)){
      $new = array('username'=>$name,'password'=>$pass,'role'=>"user");
     array_push($_SESSION["users_data"], $new);
     echo"<pre>";
    }
    
     print_r($_SESSION["users_data"]);
   
      
   
   }
   
  
}

// $users_data[][]=array( 'username' => $name ,
//                        'password' => $pass,
//                         'role' => "user"

// );
// print_r($users_data);



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
    
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
<div class="container">
<div class="dropdown button-dropdown">
<a href="#" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
<span class="button-bar"></span>
<span class="button-bar"></span>
<span class="button-bar"></span>
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-header">Dropdown header</a>
<a class="dropdown-item" href="#">Action</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Separated link</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">One more separated link</a>
</div>
</div>
<div class="navbar-translate">

<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-bar top-bar"></span>
<span class="navbar-toggler-bar middle-bar"></span>
<span class="navbar-toggler-bar bottom-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
</div>
</div>
</nav>
<div class="section section-signup" style="background-image: url('https://cdn.pixabay.com/photo/2018/01/30/22/50/forest-3119826_1280.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
<div class="container">
<div class="row">
<div class="card card-signup" data-background-color="orange">
<form class="form" method="post" action="results.php">
<div class="card-header text-center">
<h3 class="card-title title-up">Sign Up</h3>
<div class="social-line">
<a href="#" class="btn btn-neutral btn-facebook btn-icon btn-round">
<i class="fab fa-facebook-square"></i>
</a>
<a href="#" class="btn btn-neutral btn-twitter btn-icon btn-lg btn-round">
<i class="fab fa-twitter"></i>
</a>
<a href="#" class="btn btn-neutral btn-google btn-icon btn-round">
<i class="fab fa-google-plus"></i>
</a>
</div>
</div>
<div class="card-body">
<div class="input-group no-border">
<div class="input-group-prepend">
<span class="input-group-text">
<i class="now-ui-icons users_circle-08"></i>
</span>
</div>
<input type="text" class="form-control" placeholder="User Name..." name="name">
<span class="error"> <?php echo $nameErr;?></span>
  <br><br>
</div>
<div class="input-group no-border">
<div class="input-group-prepend">
<span class="input-group-text">
<i class="now-ui-icons text_caps-small"></i>
</span>
</div>
<input type="password" placeholder="Password..." class="form-control" name="pass">
<span class="error"> <?php echo $passErr;?></span>
  <br><br>
</div>
<div class="input-group no-border">
<div class="input-group-prepend">
<span class="input-group-text">
<i class="now-ui-icons text_caps-small"></i>
</span>
</div>
<input type="password" placeholder="Password..." class="form-control" name="repass">
<span class="error"> <?php echo $repassErr;?></span>
                         <span class="error"> <?php echo $error;?></span>
  <br><br>
</div>
<div class="input-group no-border">
<div class="input-group-prepend">
<span class="input-group-text">
<i class="now-ui-icons ui-1_email-85"></i>
</span>
</div>
<input type="number" class="form-control" placeholder="Phone...">
<span class="error"> <?php echo $phoneErr;?></span>
  <br><br>
</div>
</div>
<div class="card-footer text-center">
<button type="submit" class="btn btn-neutral btn-round btn-lg">Create Account</button>
</div>
</form>
</div>
</div>
</div>
</div>
<footer class="footer">
<div class=" container ">

<div class="copyright" id="copyright">
<p class="mb-0">Made with <a href="https://demos.creative-tim.com/now-ui-kit/index.html" target="_blank">Now UI Kit</a> by Creative Tim</p>
</div>
</div>
</footer>

</body>
</html>