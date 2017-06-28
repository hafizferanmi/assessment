<?php $pagetitle = "Check Submitted assignment"; ?>


<?php include('heading.php');?>

<?php if (!isset($_SESSION['username'])) {
	header('location:index.php');
}?>


<?php $mark = '';?>



<div class='container' >
	<div class='row'>


		<div class='col-md-12 '>
			<div id='myshadow'>
			<h1 class='red border-bottom color'>Check Submitted assignment</h1>
			<p class='align'> Follow instructions below to specify the particular type of information you wnat and the type of assignment you want to mark at this particular point in time, Okay! </p>

			</div>


		</div>




		<div class='col-md-12 '>
			<div class='myshadow'>
			<div class=''>
				<h6 class= 'mumu'>lecturer</h6>
				<ul ='ulist'>

					<li class='lists'><a href="lecturer.php"> Give Assigment </a></li>
					<li class='lists'><a href="lec-check-ass.php"> Check submitted assignment </a></li>
					<li class='lists'><a href="results.php"> Results </a></li>
					
				</ul>
			</div>
			</div>
		</div>


<div class='col-md-12 ' > 
	<div class='myshadow'>
			<h1 class='red border-bottom '>Pick course assignment of choice</h1>
		<div class=''>
				<form role="form" action='lec-check-ass.php' method='post'>

					<div class="form-group">
					    <label>  Select Course code:   </label>
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
					   <button type="submit" class="btn btn-primary sml-margin" name='submit'>Assignment</button>

					 
					
				</form>
		</div>		 
					   

	</div>
	</div>


		


	
		
		  

<?php 
$error='';
	if (isset($_POST['submit'])) {
			$coursecode = $_POST['coursecode'];
			$lecturer = $_SESSION['username'];
			//$sql = 'SELECT * FROM submitted';
			//$sql = $conn -> prepare($sql);
			//AND lecturer = :lecturer
			//$sql -> bindParam(':coursecode', $coursecode);
			//$query -> bindParam('lecturer', $lecturer);
			//$sql -> execute();
			//$results = $sql->fetch(PDO::FETCH_ALL);


		$query = $conn->prepare("SELECT * FROM submitted WHERE lecturer = :lecturer AND coursecode = :coursecode  ORDER BY id DESC LIMIT 5");
		$query -> bindParam(':lecturer', $lecturer);
		$query -> bindParam(':coursecode', $coursecode);
		$query->execute();		
		$hello = ($query->fetchAll());

			print "<div class='col-md-12'>
					<form action='lec-check-ass.php' method='post'>
					<table class='table table-bordered table-striped'>
					<thead><tr>   <td>MATRIC NUMBER</td> <td>ASSIGNMENT</td> <td>SCORE</td> </tr></thead>
					<tbody>";
		
		 
		
		foreach ($hello as $value) {
			print "<tr><td>".$value['matricno']."</td><td>".$value['content']."</td><td><a href='".'fullgist.php?token='. $value['token'] ."'>Read assigment</a></td></td></tr>";
			
		}

		print "</tbody>
		</table>
		<button type='submit' class='btn btn-primary sml-margin' name='mark'>Grade assignment</button>
		</form>
		</div>";

	
		
			
	}




 ?>
		



	
	
			
						
	

		



		 

</div>
</div>


<?php //include('right.php');?>
<?php include('footer.php');?>


