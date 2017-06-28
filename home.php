<?php $pagetitle = 'Submit assignment'; ?>

<?php include('heading.php');?>
<?php if (!isset($_SESSION['matricno'])) {
	header('location:index.php');
}?>

<div class='container'>
<div class='row'>
<div class='col-md-12 '>
			<div id='myshadow'>
			<h1 class='red border-bottom color'>Submit your Assignment</h1>
			<p class='align'> This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a  matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application </p>

			</div>


		</div>

</div>
</div>




<?php include('left.php');?>


<?php 
$error='';
if (isset($_POST['submit'])) {



		function sanitizeVariable($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }


		$lecturer = sanitizeVariable($_POST['lecturer']);
		$content = sanitizeVariable($_POST['content']);
		$coursecode = sanitizeVariable($_POST['coursecode']);

		if (!empty($lecturer) && !empty($content) && !empty($coursecode)) {
			//check if the lecturer matches the course selected 

			


			
			$matricno = $_SESSION['matricno'];
			$time =   date("h:i:sa");
			$score= 0;

			$query = 'INSERT INTO submitted(lecturer, matricno, content, time, coursecode, score) VALUES(:lecturer, :matricno, :content, :time, :coursecode, :score)';
			$query = $conn -> prepare($query);
			$query -> bindParam(':lecturer', $lecturer);
			$query -> bindParam(':coursecode', $coursecode);
			$query -> bindParam(':content', $content);
			$query -> bindParam(':matricno', $matricno);
			$query -> bindParam(':time', $time);
			$query -> bindParam(':score', $score);
			$query -> execute();


			if ($query) {
			// tell the person he has successfully submitted his assignment using jquery
				$error = 'Assignment  submitted successfully';
				
			}
			else{
				$error = 'Assignmetnt  not submitted. Try again later';
				//try again assignment not submitted

			}	

			


		}

	else{
		$error = 'Fill all the form to continue';
	}

}







?>

<div class='container'>
<div class='row'>
	<div class='col-md-12 ' > 
		<div class='myshadow'>
		
		<div class='assform'>
				<form role="form" method='post'>
          	<div class='error'><?php echo $error; ?></div>

          	<?php
          	$query = 'SELECT * FROM lecturers order by lecid desc limit 1 ';
          	$query = $conn -> prepare($query);
			$query -> bindParam(':lecturer', $lecturer);
			$query -> execute();
			$res = $query-> fetch(PDO::FETCH_ASSOC);
			$uses = $res['username'];
			$namin = $res['name'];

          	?>
					  

					  <div class="form-group">
					    <label style='width:100px;'> Lecturer :  </label>
					    <select name="lecturer"  class='sml-margin'>
							<option value="">Select lecturer</option>
							<option value="Omidiji">Dr Omidji</option>
							<option value="Akande">DR Akande</option>
							<option value="Akeem">Prof Akeem</option>
							<option value="Akintayo">Prof Akintayo</option>
							<?php print" <option value='".$uses."'>".$namin."</option>"?>
							
							
						</select><br>
					  </div>


					  <div class="form-group">
					    <label style='width:100px;'> Course code:   </label>
					    <select name="coursecode"  class='sml-margin'>
							<option value="">Select coursecode</option>
							<option value="csc301">csc301 - Low level languages</option>
							<option value="csc303">csc303 - Introduction to computer engineering</option>
							<option value="csc307">csc307 - Numerical computation 1</option>
							<option value="csc309">csc309 - Computer engineering lab 1</option>
							<option value="csc305">csc305 - Introduction to database system</option>
							<option value="csc311">csc311 - Introduction to information system</option>
							<option value="csc315">csc315 - Database structure and analysis of algorithm</option>
							<option value="csc317">csc317 - Automata theory and Computability</option>
						</select><br>
					  </div>



					  <div class="form-group">
					    <label for="">Assignment:</label>	
						<textarea name='content' style="resize:none" rows="12" placeholder="Enter Text" class='form-control' ></textarea>


					    
					  </div>
					 
					  <button type="submit" class="btn btn-danger" name='submit'>Submit</button>
				</form>
		</div>
	</div>
	</div>


</div>
</div>

<?php //include('right.php');?>
<?php include('footer.php');?>
	

