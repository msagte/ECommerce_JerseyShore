<?php
session_Start(); ?>

<div class = "container">
	<div class = "row">
		<div class = "col-md-12">
			<h1>Our Products</h1>
			<?php 
			$host = "localhost"; /* Host name */
			$user = "root"; /* User */
			$password = ""; /* Password */
			$dbname = "jerseyshoredb"; /* Database name */
			$con = mysqli_connect($host, $user, $password,$dbname);
			$query = "SELECT * FROM category WHERE 1; " ;
            return $query_run = mysqli_query($con, $query);
			 if(mysqli_num_rows($query) > 0)
			 {
                foreach($query as $item)
				{
					?>
					<h4><?= $item['name']; ?></h4>
					<?php
				}
			 }
			 else{
	            echo "No data available";
			 }
			?>
		</div>
	</div>
</div>
