<?php $pagetitle = 'Welcome to the accessment'; ?>
<?php include('header.php');?>

<script>
	
</script>


	<div class='container'>
		<div class='row'>
		<div class='col-md-12 '>
			<div id='myshadow'>
			<h1 class='red border-bottom color right-align'>Welcome to our assessments</h1>
			<p class='align'> This is an applicaion where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a  matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application </p>

			</div>


		</div>

		<div class='col-md-7' style='width:730px'>
			<div id='myshadow'>
			<h1 class='red border-bottom'> Student submit </h1>
			<p class='align'> This application creates an avenue for student to submit their assignment through the internet. They  do that by login into their account and selecting the course code, title, name of lecturer the assignment is being submitted to. </p>

			</div>
			

			<div id='myshadow'>
			<h1 class='red border-bottom '>Lecturers check submitted assignment</h1>
			<p class='align'> <a href="lec-login.php"><b>Lecturers</b> </a>  login into the system to check the assignment submitted by various students in the department by clicking on the check assignment button </p>

			</div>


			<div id='myshadow'>
			<h1 class='red border-bottom'> Lecturers grade assignment </h1>
			<p class='align'> This application also creates a platform where lecturers can also grade assignment after assignments have been checked. Solving the problem of lecturers grading assignment on paper </p>

			</div>
			

 
		
		</div>
		

		<div class='col-md-4 registration myshadow' >
			<div class='smallwidth'>

				<form class="form-horizontal "  action='index.php' method='post' >
		<h1 class='color border-bottom red' > Registration form </h1>
	  <div><p ><h6 class='counter'><?php print $error.'</br>'; ?> </h6></p></div>
	  

	 

 
      <div class='sml-margin'> 
      	<div class="input-group-addon input-group-sm">Enter your Name</div>
      	<input type="text" class="form-control" name="name" placeholder="First and last Name" value="" >
      </div>

            <div class='sml-margin'> 
      	<div class="input-group-addon input-group-sm">Enter your matric number</div>
      	<input type="text" class="form-control" name="matricnumber" placeholder="MATRIC NO" value="" >
      </div>

            <div class='sml-margin'> 
      	<div class="input-group-addon">Choose a password</div>
      	<input type="password" class="form-control" name="pass" placeholder="Password (Must be at least 6 characters)" value="" >
      </div>

      <div class='sml-margin'> 
      	<div class="input-group-addon">Confirm your password</div>
      	<input type="password" class="form-control" name="conpass" placeholder="Confirm password" value="" >
      </div>

            <div class='sml-margin'> 
      	<div class="input-group-addon">Enter your email address</div>
      	<input type="email" class="form-control" name="email" placeholder="Email" value="" >
      </div>

      
      <div class='sml-margin'>
      	<label> Select part: </label>
      	<select name="part">
			<option value="">Select part</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
	</select><br>

      </div>
      

      

      <button type="submit" class="btn btn-primary sml-margin" name='register'>Sign up</button>


	</form>


			</div>
		</div>


		</div>
	</div>



<?php include('footer.php');?>

