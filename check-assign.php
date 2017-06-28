<?php $pagetitle = "Student area | Check available assignment"; ?>

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



<div class='container'>
<div class='row'>
<div class='col-md-12'> 
	<div class='myshadow'>
		<h3>Assignments available for doing</h3>
		<form role="form" method='post' action='check-assign.php'>
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

		  <button type="submit" class="btn btn-danger" name='submit'>Check</button>
		</form>
					   

	</div>
	</div>
	</div>
	</div>

		<?php  
		if (isset($_POST['submit'])) {
				$coursecode = $_POST['coursecode'];
				$query = 'SELECT * FROM assignment WHERE coursecode = :coursecode ORDER BY id DESC';
				$query = $conn -> prepare($query);				
				$query -> bindParam(':coursecode', $coursecode);
				$query -> execute();
			
			echo "<div class='' >";
				
			foreach ($query as $value) {
			echo "<h4 class='assignment'><hr>QUESTON: <br>".$value['assignment'] . "</h4></div>" ;
			}		
		}		
		?>
		




<?php include('footer.php');?>
















