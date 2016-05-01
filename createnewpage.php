<?php
include("dbconn.php");
$title = isset( $_POST['title'] ) ? $_POST['title'] : "";

// sql to create table
$query = "CREATE TABLE $title (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
comment VARCHAR(30),
email VARCHAR(30),
reg_date TIMESTAMP
)";

// Create connection
$dbc = connect_to_db("kernanc"); //connect to database
if (true == perform_query( $dbc, $query ) ) { //run the query
	$result = mysqli_query($dbc, $query);
  	
		}
}



if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>