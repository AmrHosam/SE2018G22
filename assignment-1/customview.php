<?php 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('connect.php');
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Custom View</span>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">Name</th>
	      		<th scope="col">Course</th>
				<th scope="col">Degree</th>
	      		<th scope="col">Max Degree</th>
				<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$keyword = str_replace(" ", "%", safeGet('keywords'));
				$query = "SELECT students.name, courses.name, grades.degree, courses.max_degree FROM grades
				JOIN students ON students.id = grades.student_id JOIN courses ON courses.id = grades.course_id
				WHERE students.name like '%$keyword%' or courses.name like '%$keyword%' 
				ORDER BY students.name, courses.name";
				if ($result = mysqli_query($link, $query)) {
						while($row = mysqli_fetch_array($result)){
							echo "<tr><td>" . $row[0]. "</td><td>" . $row[1] . "</td><td>" . $row[2] ."</td>
							<td>". $row[3] ."</td></tr>";}}
			?>
    	</tbody>
    </table>
<?php include_once('./components/tail.php') ?>
