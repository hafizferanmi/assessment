<?php $pagetitle = "Give out assignment"; ?>

<?php include('heading.php');?>
<?php 

if (!isset($_SESSION['username'])) {
	header('location:index.php');
}?>


<?php 
$error='';
if (isset($_POST['submit'])) {



		function sanitizeVariable($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }


		$content = sanitizeVariable($_POST['content']);
		$coursecode = sanitizeVariable($_POST['coursecode']);
		$lecturer = $_SESSION['username'];

		if (!empty($lecturer) && !empty($content) && !empty($coursecode)) {
			//check if the lecturer matches the course selected 

			


			
			
			$time =  date("h:i:sa");

			$query = 'INSERT INTO assignment(lecturer, assignment, time, coursecode) VALUES(:lecturer,:content, :time, :coursecode)';
			$query = $conn -> prepare($query);
			$query -> bindParam(':lecturer', $lecturer);
			$query -> bindParam(':coursecode', $coursecode);
			$query -> bindParam(':content', $content);
			$query -> bindParam(':time', $time);
			$query -> execute();


			if ($query) {
			// tell the person he has successfully submitted his assignment using jquery
				$error = 'Assigment has beec given out to student';
				
			}
			else{
				$error = 'Assigment not given out. There is an error.';
				//try again assignment not submitted

			}	

			


		}

	else{
		$error = 'Supply all needed information and try again later';
	}

}







?>






<div class='container' >
	<div class='row'>


		<div class='col-md-12 '>
			<div id='myshadow'>
			<h1 class='red border-bottom color'>Give out assignment</h1>
			<p class='align'> This is the site where different assessment for the semester are being recorded as long as every lecturer in the department is concerned as a  matter of fact, we well continue to give you the best and feel free to talk to the admin of the site if at all there is any problem encountered in the usage of this application </p>

			</div>


		</div>




		<div class='col-md-12 '>
			<div class='myshadow'>
		
			<div class=''>
				<ul ='ulist'>
					<li class='lists'><a href="lecturer.php"> Give Assigment </a></li>
					<li class='lists'><a href="lec-check-ass.php"> Check submitted assignment </a></li>
					<li class='lists'><a href="results.php"> Results </a></li>
					
				</ul>
			</div>
			</div>
		</div>


<div class='col-md-12 ' > 
	<div class='myshadow'
			<h4 class='red'><?php print $error; ?></h4>
		
		<div class=''>
				<form role="form" action='lecturer.php' method='post'>

					<div class="form-group">
					    <label> Course code:   </label>
					    <select name="coursecode"  class='sml-margin'>
							<option value="">Select course code</option>
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

					 
					 <div class="form-group" >
					    <label >Assignment title</label>
					    <textarea type=""  name='content'  style="resize:none;" rows="4" class="form-control"></textarea>
					  </div>

					

					


					  
					 
					  <button type="submit" class="btn btn-primary sml-margin" name='submit'>Give out assignment</button>

				</form>
		</div>
		</div>
	</div>


</div>
</div>


<?php //include('right.php');?>
<?php include('footer.php');?>


