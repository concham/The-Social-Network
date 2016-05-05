<?php

  include("dbconn.php");
  
	$comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
	
	$query = "INSERT INTO Comment(comment) VALUES('$comment');";
	
	$dbc = connect_to_db("kernanc");
	if (true == perform_query( $dbc, $query ) ) {
			$returnstatus = array( 'status'=> "success", 'data'=> "You have successfully posted your comment");
	} else {
			$returnstatus = array( 'status'=> "failure", 'data'=> "Error: " . $sql . "<br>" . mysqli_error($connect));
	}
		
	echo json_encode( $returnstatus );

?>
