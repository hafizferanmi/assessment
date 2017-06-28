<?php $pagetitle = "Lecturers area | Student final score"; ?>

<?php include('heading.php');?>
<?php if (!isset($_SESSION['username'])) {
	header('location:index.php');
}?>