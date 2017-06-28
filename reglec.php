<?php $pagetitle = "Register a new lecturer"; ?>
<?php 

try {

    $pass='';
    $username='root';
    $conn = new PDO('mysql:host=localhost; dbname=asesment', $username, $pass);   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully.</br>"; 
    }
catch(PDOException $e){
    echo "Connection failed: ";
    }
?>




<?php 
$error = '';
  if (isset($_POST['register'])) {

    function sanitizeVariable($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }
    
    
    
    $username = sanitizeVariable($_POST['username']);
    $pass = sanitizeVariable($_POST['pass']);
    $conpass = sanitizeVariable($_POST['conpass']);
    $name = sanitizeVariable($_POST['name']);
    $email = sanitizeVariable($_POST['email']);

      if (!empty($username) && !empty($pass) && !empty($conpass) && !empty($name) && !empty($email)) {

        
        
        if ($pass === $conpass) {

          //check if matric no has already existed before in the database
          $query = 'SELECT username FROM lecturers WHERE username = :username';
         
          $query = $conn -> prepare($query);
          $query -> bindParam(':username', $username);
          $query -> execute();
          $results = $query->fetch(PDO::FETCH_ASSOC);
          if ($results['username'] == $username) {
            //rout the person to the homepage and tell the person to remeember the password
            $error = 'You have already registered. Use the login form to login';
          }

          //end of check
          else{

          $query = 'INSERT INTO lecturers(username, password, name, email) VALUE(:username, :pass,  :name, :email) ';
          $query = $conn -> prepare($query);
          $query -> bindParam(':username', $username);
          $query -> bindParam(':pass', $pass);
          $query -> bindParam(':name', $name);
          $query -> bindParam(':email', $email);
          $query -> execute();
          if ($query) {
            $error = 'You have registered sucessflully. You can now login';
          }
          else{
            $error = 'Registration unsuccessful. Try again later!';
          }

          }

          

        }
        else{
          //your passwords does not match
          $error = 'Your password does not match';
        }
      }
      else{
        //empty strings
        $error = 'Fill all the form before you proceed with the registration';
      }


  }


  ?>























<!DOCTYPE html>
<head>
<link href="css/grp.css" rel="stylesheet">
<link href="css/work.css" rel="stylesheet">
<script src="js/assessment.min.js"></script>
<script src="js/.js"></script>
<title><?php print $pagetitle; ?></title>
</head>
<body>
      <hr>
    <header>
        <div class="mWrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="logo">
              ASSESSMENT
            </div>
          </div>
          <div class="col-sm-8 col-md-8" style='padding-right:30px;'>
            <nav class="mainMenu">
              <ul class="nav">
                
                
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

    

      </header>
<hr>



<div class='col-md-12 registration myshadow' >
			<div class='smallwidth'>

				<form class="form-horizontal "  action='reglec.php' method='post' >
		<h1 class='color border-bottom red' > Registration form </h1>
	  <div><p ><h6 class='counter'><?php print $error.'</br>'; ?> </h6></p></div>

	 

 
      <div class='sml-margin'> 
      	<div class="input-group-addon input-group-sm">Enter your Name</div>
      	<input type="text" class="form-control" name="name" placeholder="Name of lecturer" value="" >
      </div>

            <div class='sml-margin'> 
      	<div class="input-group-addon input-group-sm">Enter Username</div>
      	<input type="text" class="form-control" name="username" placeholder="username" value="" >
      </div>

            <div class='sml-margin'> 
      	<div class="input-group-addon">Choose a password</div>
      	<input type="password" class="form-control" name="pass" placeholder="password" value="" >
      </div>

      <div class='sml-margin'> 
      	<div class="input-group-addon">Confirm your password</div>
      	<input type="password" class="form-control" name="conpass" placeholder="Confirm password" value="" >
      </div>

            <div class='sml-margin'> 
      	<div class="input-group-addon">Enter your email address</div>
      	<input type="email" class="form-control" name="email" placeholder="Email" value="" >
      </div>

      
        

      <button type="submit" class="btn btn-primary sml-margin" name='register'>Sign up</button>


	</form>


			</div>