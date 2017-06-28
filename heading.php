<?php 
session_start();
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
$query = 'SELECT name FROM students WHERE matricno = :matricno';
      $query = $conn -> prepare($query);
      $query -> bindParam(':matricno', $_SESSION['matricno']);
      $query -> execute();
      $results = $query->fetch(PDO::FETCH_ASSOC);
   


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
                <li><?php print $results['name']; ?></li>
                <li><a href="logout.php"><button class='btn btn-danger'>Logout</button></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

    

	</header>
<hr>


	