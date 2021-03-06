<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('connect.php');
	$id = safeGet('id');
	$query = "SELECT name FROM students WHERE id = '".$id."'";
	if ($result = mysqli_query($link, $query)){
		$row = mysqli_fetch_array($result);}
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> Student</h2>

    <form action="controllers/savestudent.php" method="post">
		<input type="hidden" name="id" value="<?=$id?>">
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="name" value="<?=$row[0]?>" required>
					</div>
				</div>
		    	<div class="form-group">
		    		<button class="button float-right" type="submit"><?=($id)?"Edit":"Add"?></button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>