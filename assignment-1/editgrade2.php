<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('connect.php');
	$id = safeGet('id');
	if(!is_null($id))
	{
	$query = "SELECT * FROM `grades` WHERE `id`='$id'";
	if($result = mysqli_query($link,$query))
	{
		$row = mysqli_fetch_array($result);
		$pre_grade = $row['degree'];
		$pre_course = $row['course_id'];
		$pre_student = $row['student_id'];
		$pre_date = $row['examine_at'];
	}
	}
?>
<style type="text/css">
	label
	{
		margin-bottom: 10px;
	}
	.field
	{
		margin-bottom: 10px;
	}
</style>
    <h2 class="mt-4"><?php if(is_null($id))echo "Add";else echo "Edit"; ?> Grade</h2>

    <form action="edit.php" method="post">
    	<input type="hidden" name="id" value="<?php if(!is_null($id))echo $row['id']; ?>">
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="student" class="col-sm-2 col-form-label">Student ID</label>
					<div class="col-sm-10 field">
						<input class="form-control" type="text" value="<?php if(!is_null($id))echo $pre_student; ?>" name="student" required>
					</div>
					<label for="course" class="col-sm-2 col-form-label">Course ID</label>
					<div class="col-sm-10 field">
						<input class="form-control" type="text" value="<?php if(!is_null($id))echo $pre_course; ?>" name="course" required>
					</div>
					<label for="grade" class="col-sm-2 col-form-label">Grade</label>
					<div class="col-sm-10 field">
						<input class="form-control" type="text" value="<?php if(!is_null($id))echo $pre_grade; ?>" name="grade" required>
					</div>
					<label for="grade" class="col-sm-2 col-form-label">Date</label>
					<div class="col-sm-10 field">
						<input class="form-control" type="text" id="datepicker" value="<?php if(!is_null($id))echo $pre_date; ?>" name="date" required>
					</div>
				</div>
		    	<div class="form-group">
		    		<button class="button float-right" type="submit" name="edit"> <?php if(is_null($id))echo "Add";else echo "Edit" ?></button>
		    	</div>
		    </div>
		</div>
    </form>
<script type="text/javascript">
	  //$( function() {
    $( "#datepicker" ).datepicker({
         dateFormat: 'yy-mm-dd'
     });
  </script>
</script>
<?php include_once('./components/tail.php') ?>