<?php include 'header.php';?>
<section class="main">
	<div class="row">
		<div class="result-title">
			<h2>Search Results for XXX</h2>
		</div>
	</div>
	<div>
		<div class="result-table">
			<table id="searchTable" class="tablesorter"> 
				<thead> 
					<tr> 
						<th>Maze Name</th> 
						<th>Author</th> 
						<th>Creation Date</th> 
						<th>Rating</th> 
						<th>Difficulty</th> 
						<th>Popularity</th> 
					</tr> 
				</thead> 
				<tbody>
					<tr> 
						<td>Smith</td> 
						<td>John</td> 
						<td>jsmith@gmail.com</td> 
						<td>$50.00</td> 
						<td>http://www.jsmith.com</td> 
						<td>Smith</td> 
					</tr> 
					<tr> 
						<td>Test</td> 
						<td>ayyy</td> 
						<td>jsmith@gmail.com</td> 
						<td>$50.00</td> 
						<td>http://www.jsmith.com</td> 
						<td>lmao</td> 
					</tr> 
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php include 'footer.php';?>
<script>
$(document).ready(function() { 
	$("#searchTable").tablesorter(); 
});
</script>

