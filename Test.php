<?php
	include('dbconn.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>




<?php
	

	$itemsPerPage=10;
	

	$pages = findpages($itemsPerPage);
	$start = findstart();
		
	$links = createSortLinks();
	
// 	echo '<div class="container"><div class="panel panel-default">
//   		<div class="panel-heading">
//     	<h3 class="panel-title">Table Data</h3>
//   		</div>
//   			<div class="panel-body">';
	createDataTable($start, $itemsPerPage, $links);
	
	 echo '</div>
	 	</div></div>
	 	
	 	<div>';
	
	createPageLinks($start, $pages, $itemsPerPage, $links['orderby']);
	echo  	"</div>";
?>

</body>
</html>
<?php
function createDataTable($start, $itemsPerPage, $links){
	$qry = "SELECT firstname, lastname, school, email FROM Member
				ORDER BY {$links['orderby']}
				LIMIT $start, $itemsPerPage";
		
	echo "<table class=\"table\">
				<tr>
					<th class=\"emailtable\"><a href={$links['firstname']}>First Name</a></th>
					<th class=\"emailtable\"><a href={$links['lastname']}>Last Name</a></th>
					<th class=\"emailtable\"><a href={$links['school']}>School</a></th>
					<th class=\"emailtable\"><a href={$links['email']}>Email</a></th>
				</tr>\n";
				
				
	$dbc = connect_to_db("kernanc");
	$result = perform_query($dbc, $qry);
	$class = "alt2";
	while (@extract(mysqli_fetch_array($result, MYSQLI_ASSOC))) {
		$class = ($class=='alt1' ? 'alt2':'alt1');
		echo "	<tr class=\"$class\">
					<td>$firstname</td>
					<td>$lastname</td>
					<td>$school</td>
					<td>$email</td>
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
		$qry="SELECT COUNT(firstname) as count from Member;";
		
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
	$firstnamelink = "{$_SERVER['PHP_SELF']}?sort=firstnameA";
	$lastnamelink = "{$_SERVER['PHP_SELF']}?sort=lastnameA";   
	$schoollink = "{$_SERVER['PHP_SELF']}?sort=schoolA";   
	$emaillink = "{$_SERVER['PHP_SELF']}?sort=emailA";   
	$orderby="firstname ASC";
	
	$sort = isset($_GET['sort']) ? $_GET['sort']: "firstnameA" ;
	switch ($sort){
		case 'firstnameA':
			$orderby='firstname ASC';
			$firstnamelink = "{$_SERVER['PHP_SELF']}?sort=firstnameD";
			break;
		
		case 'firstnameD':
			$orderby='firstname DESC';
			$firstnamelink = "{$_SERVER['PHP_SELF']}?sort=firstnameA";
			break;
		
		case 'lastnameA':
			$orderby='lastname ASC';
			$lastnamelink = "{$_SERVER['PHP_SELF']}?sort=lastnameD";
			break;
	
		case 'lastnameD':
			$orderby='lastname DESC';
			$lastnamelink = "{$_SERVER['PHP_SELF']}?sort=lastnameA";
			break;		
			
		case 'school A':
			$orderby='school ASC';
			$schoollink = "{$_SERVER['PHP_SELF']}?sort=schoolD";
			break;
	
		case 'schoolD':
			$orderby='school DESC';
			$schoollink = "{$_SERVER['PHP_SELF']}?sort=schoolA";
			break;		
		case 'emailA':
			$orderby='email ASC';
			$emaillink = "{$_SERVER['PHP_SELF']}?sort=emailD";
			break;

		case 'emailD':
			$orderby='email DESC';
			$emaillink = "{$_SERVER['PHP_SELF']}?sort=emailA";
			break;		
		default:
			break;
	}
	$links = array("firstname"=> $firstnamelink,
					"lastname"=> $lastnamelink,
					"school"=> $schoollink,
					"email"=> $emaillink,
					"orderby" => $orderby);
					
	return $links;
}
function createPageLinks($start, $pages, $itemsPerPage, $sort){
	$thispage = "{$_SERVER['PHP_SELF']}";
	$sort = isset($_GET['sort']) ? $_GET['sort']: "";
	echo "This page is $thispage";
	
  		
	// creating page links
	if ($pages > 1) {
		echo '<nav>
  		<ul class="pagination">';
		
		// print Previous if not on the first page
		$currentPage=($start/$itemsPerPage) + 1;
		if ($currentPage != 1){
		
			echo '<li><a href="'.$thispage.'?s='.($start - $itemsPerPage) . 
										'&amp;p=' . $pages . 
										'&amp;sort=' . $sort .
										'"  aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
		}
		
		// print page numbers
		for ($i=1; $i <= $pages; $i++) {
				if ($i != $currentPage) {
					echo '<li><a href="'.$thispage.'?s='.(($itemsPerPage * ($i-1))) . 
												'&amp;p=' . $pages . 
												'&amp;sort=' . $sort .
												'"> '. $i .'  </a>'."</li>\n";
				}  else {
				
					echo "<li class=\"active\"><span class=\"sr-only\">$i </span></a></li>";
				}
		}
	
		// print next if not on the last page
		if ($currentPage != $pages){
			echo ' <li><a href="'.$thispage.'?s='.($start + $itemsPerPage) . '&amp;p=' . 
												$pages . '"  aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a></li>';
		}
		
		echo '  </ul>
				</nav>';
	}
}
?>