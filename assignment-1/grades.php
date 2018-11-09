<?php 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('connect.php');
?>
<style type="text/css">
	.sort:hover
	{
		cursor: pointer;
	}
</style>
	<div style="padding: 10px 0px 5px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Grades</span>
		<button class="button float-right add" id="0">Add Grade</button>
	</div>
	
	<div style="padding: 0px 0px 10px 0px; vertical-align: text-bottom;">
		<button class="button float-left custom" >Custom View</button>
		<button id="asc" style="background-color: transparent;border-style: none; float: right;">
	    <img  src="ascending.png" class="sort" alt="ascending" style="width: 30px;height: 30px; float: right;"></button>
	    <button id="desc" style="background-color: transparent;border-style: none; float: right;">
	    <img src="descending.png" class="sort" alt="descending" style="margin-right: 10px; width: 30px;height: 30px; float: right;"></button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Student ID</th>
	      		<th scope="col">Course ID</th>
	      		<th scope="col">Grade</th>
	      		<th scope="col">Examine At</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php
		  		$sorted = safeGet('sorted');
		  		if(is_null($sorted))
		  		{
		  			$query = "SELECT * FROM `grades`";
		  		}
		  		else if($sorted=='asc')
		  		{
		  			$query = "SELECT * FROM `grades` ORDER BY `degree` ASC";
		  		}
		  		else
		  		{
		  			$query = "SELECT * FROM `grades` ORDER BY `degree` DESC";
		  		}
		  		if($result=mysqli_query($link,$query))
		  		{
		  			while($row = mysqli_fetch_array($result))
		  			{	

			?>
    		<tr>
    			<td><?php echo $row['id'];?></td>
    			<td><?php echo $row['student_id'];?></td>
    			<td><?php echo $row['course_id'];?></td>
    			<td><?php echo $row['degree'];?></td>
    			<td><?php echo $row['examine_at'];?></td>
    			<td>
    				<button class="button edit" id="<?php echo $row['id'] ?>">Edit</button>&nbsp;
    				<button class="button delete" id="<?php echo $row['id'] ?>">Delete</button>
				</td>
    		</tr>
    	<?php }} ?>
    	</tbody>
    </table>
    <script type="text/javascript">
    	$('.add').click(function(){
    		window.location.href = "editgrade2.php";
    	});
		$('.custom').click(function(){
    		window.location.href = "customview.php";
		});
    	$('.edit').click(function() {
			window.location.href = "editgrade2.php?id="+$(this).attr('id');
		});
		$(".delete").click(function(){
			window.location.href="deletegrade.php?id="+$(this).attr('id');
		});
		$('#asc').click(function(){
			window.location.href="grades.php?sorted=asc";
		});
		$('#desc').click(function(){
			window.location.href="grades.php?sorted=desc";
		});
    </script>

<?php include_once('./components/tail.php') ?>