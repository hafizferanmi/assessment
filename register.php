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
	if (isset($_POST['register'])) {

		function sanitizeVariable($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
		 }
		
		
		
		$matricnumber = sanitizeVariable($_POST['matricnumber']);
		$pass = sanitizeVariable($_POST['pass']);
		$conpass = sanitizeVariable($_POST['conpass']);
		$name = sanitizeVariable($_POST['name']);
		$email = sanitizeVariable($_POST['email']);
		$part = sanitizeVariable($_POST['part']);

			if (!empty($matricnumber) && !empty($pass) && !empty($conpass) && !empty($name) && !empty($email) && empty($part) ) {
				
				if ($pass === $conpass) {
				$query = 'INSERT INTO students(matricnumber, pass, name, email, part) VALUE(:matricno, :pass,  :name, :email, :part';
					$query = $conn -> prepare($query);
					$query -> bindParam(':matricnumber', $matricnumber);
					$query -> bindParam(':pass', $pass);
					$query -> bindParam(':name', $name);
					$query -> bindParam(':email', $email);
					$query -> bindParam(':part', $part);
					$query -> execute();
					if ($query) {
						$error = 'You have registered sucessflully You can now login';
					}
					else{
						$error = 'Registratin unsuccessful';
					}

				}
				else{
					//your passwords does not match
					$error = 'Your password does not match';
				}
			}
			else{
				//empty strings
				$error = 'One of the form is empty';
			}


	}


	?>