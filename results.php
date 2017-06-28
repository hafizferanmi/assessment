<?php $pagetitle = 'Student results';?>
<?php include('heading.php');?>

<div class='container'>
	<div class='row'>
		<div class='col-md-12 '>
			<div class='myshadow'>
			<h4> Lecturer </h4>
			<div class=''>
				<ul ='ulist'>
					<li class='lists'><a href="lecturer.php"> Give Assigment </a></li>
					<li class='lists'><a href="lec-check-ass.php"> Check submitted assignment </a></li>
					<li class='lists'><a href="results.php"> Results </a> </li>
					
				</ul>
			</div>
			</div>
		</div>
	</div>
</div>


<div class='container'>
	<div class='row'>
<div class='col-md-12 '>
			<div class=''>
			
				<?php 
				$query = 'SELECT * FROM submitted where score != 0';
				$query = $conn -> prepare($query);
				$query -> execute();
				$hello = ($query->fetchAll());

				

				print "
					<form action='lec-check-ass.php' method='post'>
					<table class='table table-bordered table-striped'>
					<thead><tr>   <td>MATRIC NUMBER</td> <td>ASSIGNMENT</td> <td>SCORE</td> </tr></thead>
					<tbody>";


				foreach ($hello as $value) {
				
			print "<tr><td>".$value['matricno']."</td><td>".$value['content']."</td><td>".$value['score']."</td></td></tr>";
			
		}
		print "</tbody>
		</table>
		<button type='submit' class='btn btn-primary sml-margin' name='mark'>Grade assignment</button>
		</form>
		</div>";
				?>

			</div>
		</div>
	</div>
</div>



<?php include('footer.php');?>