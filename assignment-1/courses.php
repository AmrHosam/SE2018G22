<?php 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('connect.php');
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Courses</span>
		<button class="button float-right edit_student" id="0">Add Course</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col">Max Degree</th>
				<th scope="col">Study Year</th>
				<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$keyword = str_replace(" ", "%", safeGet('keywords'));
				$query = "SELECT * FROM courses WHERE name like '%$keyword%'";
				if ($result = mysqli_query($link, $query)) {
						while($row = mysqli_fetch_array($result)){
							echo "<tr><td>" . $row[0]. "</td><td>" . $row[1] . "</td><td>" . $row[2] ."</td>
							<td>". $row[3] ."</td>";
			?>
    			<td>
    				<button class="button edit_student" id="<?=$row[0]?>">Edit</button>&nbsp;
    				<button class="button delete_student" id="<?=$row[0]?>">Delete</button>
				</td>
    		</tr>
			<?php }} ?>
    	</tbody>
    </table>
<?php include_once('./components/tail.php') ?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".edit_student").click(function(event) {
			window.location.href = "editcourse.php?id="+$(this).attr('id');
		});
		$(".delete_student").click(function(event) {
			window.location.href = "controllers/deletecourse.php?id="+$(this).attr('id');
		});
	});
</script>
