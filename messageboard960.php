<!DOCTYPE html>
<html>
	<head>
	<title> Message Board </title>
	  <a href="LogoutCookie.php">Logout</a>
  	<br><br>
	 <a href="homepage960.html">Return to Home</a>
	</head>
	<body>
	<h1> Message Board </h1>
  	<form id="ajaxRequestForm" method="post">
  	
  	<?php
	include('dbconn.php');
?>
  	<?php
	
	$itemsPerPage=10;
	$pages = findpages($itemsPerPage);
	$start = findstart();
		
	$links = createSortLinks();
	
	createDataTable($start, $itemsPerPage, $links);
	
	 echo '</div>
	 	</div></div>
	 	
	 	<div>';
	
	createPageLinks($start, $pages, $itemsPerPage, $links['orderby']);
	echo  	"</div>";
?>


<?php
function createDataTable($start, $itemsPerPage, $links){
	$qry = "SELECT ID, comment, commentdate FROM Comment
				ORDER BY {$links['orderby']}
				LIMIT $start, $itemsPerPage";
		
	echo "<table class=\"table\">
				<tr>
					<th class=\"commenttable\"><a href={$links['ID']}>Comment #</a></th>
					<th class=\"commenttable\"><a href={$links['comment']}>Comment</a></th>
					<th class=\"commenttable\"><a href={$links['commentdate']}>Comment Date</a></th>
				</tr>\n";
				
				
	$dbc = connect_to_db("kernanc");
	$result = perform_query($dbc, $qry);
	$class = "alt2";
	while (@extract(mysqli_fetch_array($result, MYSQLI_ASSOC))) {
		$class = ($class=='alt1' ? 'alt2':'alt1');
		echo "	<tr class=\"$class\">
					<td>$ID</td>
					<td>$comment</td>
					<td>$commentdate</td>
				</tr>\n";
	}
	echo "</table>\n";
}
function findpages($itemsPerPage){
	if (isset($_GET['p'])){
		// get it from the URL if we've already been here
		$pages=$_GET['p'];
	} else {
	
		// starting new, so get it from the database
		$qry="SELECT COUNT(comment) as count from Comment;";
		
		$dbc = connect_to_db("kernanc");
		$result = perform_query($dbc, $qry);
		extract((array)mysqli_fetch_array($result, MYSQLI_ASSOC));
			
		if ($count > $itemsPerPage)
			$pages=ceil($count/$itemsPerPage);
		else
			$pages=1;
	}
	return $pages;
}
function findstart(){
    // figure out where to start
	if (isset($_GET['s']))
		$start=$_GET['s'];
	else
		$start=0; // at the beginning
		
 	return($start);
}
function createSortLinks(){
	$IDlink = "{$_SERVER['PHP_SELF']}?sort=IDA";
	$commentlink = "{$_SERVER['PHP_SELF']}?sort=commentA";
	$commentdatelink = "{$_SERVER['PHP_SELF']}?sort=commentdateA";    
	$orderby="ID ASC";
	
	$sort = isset($_GET['sort']) ? $_GET['sort']: "IDD" ;
	switch ($sort){
		case 'commentA':
			$orderby='comment ASC';
			$commentlink = "{$_SERVER['PHP_SELF']}?sort=commentD";
			break;
		
		case 'commentD':
			$orderby='comment DESC';
			$commentlink = "{$_SERVER['PHP_SELF']}?sort=commentA";
			break;
		
		case 'commentdateA':
			$orderby='commentdate ASC';
			$commentdatelink = "{$_SERVER['PHP_SELF']}?sort=commentdateD";
			break;
	
		case 'commentdateD':
			$orderby='commentdate DESC';
			$commentdatelink = "{$_SERVER['PHP_SELF']}?sort=commentdateA";
			break;
			
		case 'IDA':
			$orderby='ID ASC';
			$IDlink = "{$_SERVER['PHP_SELF']}?sort=IDD";
			break;
	
		case 'IDD':
			$orderby='ID DESC';
			$IDlink = "{$_SERVER['PHP_SELF']}?sort=IDA";
			break;			

	}
	$links = array(	"ID"=> $IDlink,
					"comment"=> $commentlink,
					"commentdate"=> $commentdatelink,
					"orderby" => $orderby);
					
	return $links;
}
function createPageLinks($start, $pages, $itemsPerPage, $sort){
	$thispage = "{$_SERVER['PHP_SELF']}";
	$sort = isset($_GET['sort']) ? $_GET['sort']: "";
	echo "";
	
  		
	// creating page links
	if ($pages > 1) {
		echo '<nav>
  		<ul class="pagination">';
		
		// print Previous if not on the first page
		$currentPage=($start/$itemsPerPage) + 1;
		if ($currentPage != 1){
		
			echo '<a href="'.$thispage.'?s='.($start - $itemsPerPage) . 
										'&amp;p=' . $pages . 
										'&amp;sort=' . $sort .
										'"  aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a>';
		}
		
		// print page numbers
		for ($i=1; $i <= $pages; $i++) {
				if ($i != $currentPage) {
					echo '<a href="'.$thispage.'?s='.(($itemsPerPage * ($i-1))) . 
												'&amp;p=' . $pages . 
												'&amp;sort=' . $sort .
												'"> '. $i .'  </a>'."</li>\n";
				}  else {
				
					echo "<class=\"active\"><span class=\"sr-only\">$i </span></a>";
				}
		}
	
		// print next if not on the last page
		if ($currentPage != $pages){
			echo ' <a href="'.$thispage.'?s='.($start + $itemsPerPage) . '&amp;p=' . 
												$pages . '"  aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a>';
		}
		
		echo '  </ul>
				</nav>';
	}
}
?>
<br>
<br>
  		<p>Your Comment</p>
  		<textarea rows="5" cols="100" id="comment" placeholder="Enter your comment here"></textarea>
  		<br><br>
  		<p>Today's Date: mm/dd/yyyy</p>
  		<input type="text" name="commentdate" id="commentdate" placeholder="Today's date" />
  		<br> <br>

  		<button id="commentbutton">Post</button>
  	</form>
	</body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#commentbutton").click(function( event ){
				event.preventDefault();
		
                var request = $.post("commenthandler.php",
                    { 
                    	comment: $("#comment").val(),
                    	date: $('#commentdate').val()
                    },
                    function(data,status) {      		
                		$("#results").html("data" + data + " status", status);
                	}
                );
                
                
            });
		});
	</script>
