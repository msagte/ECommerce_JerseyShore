</head>
<body>
<h1>Classic Search Results</h1>
<?php
require("include/function.php");
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!stripslashes_deep($searchtype)){
    $searchtype = addslashes($searchtype);
  }
  if (!stripslashes_deep($searchterm)){
    $searchterm = addslashes($searchterm);
  }

  @ $db = new mysqli('localhost', 'root', '', 'jerseyshoredb');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from Product where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of Products found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Name: ";
     echo htmlspecialchars(stripslashes($row['Name']));
     echo "</strong><br />Brand: ";
     echo stripslashes($row['Brand']);
     echo "<br />Category: ";
     echo stripslashes($row['Category']);
     echo "<br />Price: ";
     echo "$";
     echo stripslashes($row['Price']);
     echo "<br />Product_ID: ";
     echo stripslashes($row['Product_ID']);
     echo "</p>";
     
  }

  $result->free();
  $db->close();

?>
</body>
</html>