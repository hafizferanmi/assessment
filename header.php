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

		$errMsg = '';
		$error = '';
	

	if (isset($_POST['login'])) {
		function sanitizeVariable($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }
		
		$matricno = sanitizeVariable($_POST['matricno']);
		$password = sanitizeVariable($_POST['password']);

		if (!empty($matricno) && !empty($password)) {
			$query = 'SELECT * FROM students WHERE matricno = :matricno AND password = :password';
			$query = $conn -> prepare($query);
			$query -> bindParam(':matricno', $matricno);
			$query -> bindParam(':password', $password);
			$query -> execute();
			$results = $query->fetch(PDO::FETCH_ASSOC);

			if ($results['matricno'] == $matricno && $results['password'] == $password) {
				session_start();

				$_SESSION['matricno'] = $results['matricno'];
				header('location:check-assign.php');
			}
			else{
				$errMsg = 'Check matricno/password combination';
			}
		}

		else{
			$errMsg = 'You have to fill the forms to  login';

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

          <div class="col-sm-4 col-md-4 red line">
          	<div class='error'><?php echo $errMsg; ?></div>
          </div>


          <div class="col-sm-4 col-md-4 line">
           <form class="form-inline" role="form" method='post' action='index.php'>
					  <div class="form-group">
					    <div class="input-group input-group-sm">
					      <input class="form-control" type="text" placeholder="Matricno" name='matricno'>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="input-group input-group-sm">
					      <input class="form-control" type="password" placeholder="Password" name='password'>
					    </div>
					  </div>
					  
					 
					  <button type="submit" class="btn btn-primary btn-sm " style='height:25px;' name='login'>Sign In</button>
			</form>

          </div>
        </div>
      </div>
    </div>

    

	</header>

	<hr>




	<?php 
	if (isset($_POST['register'])) {

		function sanitizeVariable($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }
		
		
		
		$matricnum = sanitizeVariable($_POST['matricnumber']);
		$pass = sanitizeVariable($_POST['pass']);
		$conpass = sanitizeVariable($_POST['conpass']);
		$name = sanitizeVariable($_POST['name']);
		$email = sanitizeVariable($_POST['email']);
		$part = sanitizeVariable($_POST['part']);

			if (!empty($matricnum) && !empty($pass) && !empty($conpass) && 
				!empty($name) && !empty($email) && !empty($part) ) {
				
				if (strlen($matricnum) !== 12) {
					$error = 'Not a valid matric number!. Check and try again later';
				}


			
				if ($pass === $conpass) {

					if (strlen($pass) < 6) {
						$error = 'Your password must be at least 6 charcters long';
					}




					//check if matric no has already existed before in the database
					$query = 'SELECT matricno FROM students WHERE matricno = :matricnum';
					$query = $conn -> prepare($query);
					$query -> bindParam(':matricnum', $matricnum);
					$query -> execute();
					$results = $query->fetch(PDO::FETCH_ASSOC);
					if ($results['matricno'] == $matricnum) {
						//rout the person to the homepage and tell the person to remeember the password
						$error = 'You have already registered. Use the login form to login';
					}

					//end of check
					else{

					$query = 'INSERT INTO students(matricno, password, name, email, part) 
							  VALUES(:matricnum, :pass,  :name, :email, :part) ';
					$query = $conn -> prepare($query);
					$query -> bindParam(':matricnum', $matricnum);
					$query -> bindParam(':pass', $pass);
					$query -> bindParam(':name', $name);
					$query -> bindParam(':email', $email);
					$query -> bindParam(':part', $part);
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