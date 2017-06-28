<?php 
$pagetitle = "Lecturers login"; 
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
		
		$username = sanitizeVariable($_POST['username']);
		$password = sanitizeVariable($_POST['password']);

		if (!empty($username) && !empty($password)) {
			$query = 'SELECT * FROM lecturers WHERE username = :username AND password = :password';
			$query = $conn -> prepare($query);
			$query -> bindParam(':username', $username);
			$query -> bindParam(':password', $password);
			$query -> execute();
			$results = $query->fetch(PDO::FETCH_ASSOC);

			if ($results['username'] == $username && $results['password'] == $password) {
				session_start();
				$_SESSION['username'] = $results['username'];
				header('location:lecturer.php');
			}
			else{
				$errMsg = 'Check username/password combination';
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
          </div>


          <div class="col-sm-4 col-md-4 line">
           
          </div>
        </div>
      </div>
    </div>

    

	</header>

	<hr>



<div class='container'>
	<div class='row'>

		<div class='col-md-12 '>
			<div id='myshadow'>
			<h1 class='red border-bottom '> Lecturer's login </h1>
			<p class='align'> Supply all the information provided to get into the system. Only username and password that have already being registered will only have pass and access into the system. If you have forgotten your username and password. Meet the webmaster for a quick retrieval </p>

			</div>


		</div>


		<div class='leclogin col-md-12'>
		<form class="form-inline" role="form" method='post' action='lec-login.php' class='leclogin'>
					  <div class="form-group">
					    <div class="input-group input-group-sm">
					      <input class="form-control" type="text" placeholder="Username" name='username'>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="input-group input-group-sm">
					      <input class="form-control" type="password" placeholder="Password" name='password'>
					    </div>
					  </div>
					  
					 
					  <button type="submit" class="btn btn-primary btn-sm" name='login'>login</button>

			</form>
		</div>
          	<div class='red'><?php echo $errMsg; ?></div>




	</div>


</div>


<?php include('footer.php');?>
