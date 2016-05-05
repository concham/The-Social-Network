<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> Message Board </title>
	 	<link rel ="stylesheet" href="css/bootW.css">
</head>

<body style="padding:20px;">
		<div class="nav grid_7" align="right">
					<font color="DAA520"><a href="http://cscilab.bc.edu/~concham/Project/homepage960.html"><font color="F5DEB3">Home</font></a> / <a href="http://www.bc.edu/"><font color="F5DEB3">Stay Connected</font></a> / <a href="https://mail.google.com/"> <font color="F5DEB3">Contact Us</font></a> / <a href="LogoutCookie.php"><font color="F5DEB3">Logout</font></a></font>
				</div>

<h1> The Social Network Message Board </h1>
<br>

<ul class="nav nav-tabs" style>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/homepage960.html" data-toggle="tab"><font color="F5DEB3">Home</font></a></li>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/news960.php" data-toggle="tab"><font color="F5DEB3">Get BC News!</font></a></li>
<li class="active"><a href="http://cscilab.bc.edu/~barthch/csciproject960/EmailList.php" data-toggle="tab"><font color="F5DEB3">Send Email</font></a></li>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/messageboard960.php" data-toggle="tab"><font color="F5DEB3">Message Borard</font></a></li>
<li class="disabled"><a href="http://cscilab.bc.edu/~barthch/csciproject960/newlogin960.php" data-toggle="tab"><font color="F5DEB3">Log In</font></a></li>
<li class="disabled"><a href="http://cscilab.bc.edu/~barthch/csciproject960/registrationform960.html" data-toggle="tab"><font color="F5DEB3">Create Account</font></a></li>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/passwordreset960.html" data-toggle="tab"><font color="F5DEB3">Reset Password</font></a></li>

</ul>
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<style>
body {
	background-color: #92000a;
	color: #ff7755; 
	}
h1 {
	color: #DAA520;
	text-align: center;
	}
.style1 {
	width: 50%;
	border-color: #ff7755;
	background-color: #ff7755;
	height: 1px;
}
.style2 {
	width: 90%;
	border-color: #ff7755;
	background-color: #ff7755;
	height: 1px;
}
form {
	background-color: #92000a;
}
label {
	color: #DAA520; 
	font-size: 115%;
}
legend {
	color: #DAA520; 
	font-size: 140%;
}
.fieldset1 {
	border: 3px solid #ff9977;
	height: 300px;
	width: 1175px;
}
.fieldset2 {
	border: 3px solid #ff9977;

	width: 1175px;
}
.button1 {
	background-color: white;
	border: 2px color: black;
	font-size: 14px;
	margin-left: 7px;
}
.style3 {
	display: none;
}
table{
	border-collapse: collapse;
-webkit-column-width: 100px;
}
table, th, td {
	border: 1px solid black;
	width: 100%;
	text-align: center;

}
th{
	height: 10px;
	text-align: center;
}
th, td{
	resize: both;
	width: 200px;
	}
tr:nth-child(even){background-color: #ffcc99; color: #cc0000;}
tr:nth-child(odd){background-color: #ff9977; color: #F5DEB3;}
tr:hover{background-color: #ff7755;}

	
	</style>
<fieldset>
		<legend>Comment Database</legend>

<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" >
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
<br><br>
  	<form id="ajaxRequestForm" method="post">
  	<br><br>
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
	$qry = "SELECT ID, comment FROM Comment
				ORDER BY {$links['orderby']}
				LIMIT $start, $itemsPerPage";
		
	echo "<center><table style='width:60%;' class=\"table\">
				<tr>
					<th class=\"commenttable\"><a href={$links['ID']}>Comment #</a></th>
					<th class=\"commenttable\"><a href={$links['comment']}>Comment</a></th>
					
				</tr>\n";
				
				
	$dbc = connect_to_db("kernanc");
	$result = perform_query($dbc, $qry);
	$class = "alt2";
	while (@extract(mysqli_fetch_array($result, MYSQLI_ASSOC))) {
		$class = ($class=='alt1' ? 'alt2':'alt1');
		echo "	<tr class=\"$class\">
					<td>$ID</td>
					<td>$comment</td>
					
				</tr>\n";
	}
	echo "</table></center>\n";
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
		?> 
		<div class="btn-toolbar">
  <div class="btn-group">	
		<?php
		for ($i=1; $i <= $pages; $i++) {
				if ($i != $currentPage) {
					echo '<a href="'.$thispage.'?s='.(($itemsPerPage * ($i-1))) . 
												'&amp;p=' . $pages . 
												'&amp;sort=' . $sort .
												'" class="btn btn-default btn-xs"> '. $i .'  </a>'."</li>\n";
				}  else {
				
					echo "<class=\"active\"><span class=\"sr-only\">$i </span></a>";
				}
		}
			?> </div>
		<?php
	
		// print next if not on the last page
		if ($currentPage != $pages){
			echo ' <a href="'.$thispage.'?s='.($start + $itemsPerPage) . '&amp;p=' . 
												$pages . '"  aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a>';
		}
		
		echo '  </ul>
				</nav>';
	}
}
?></fieldset>

	<fieldset>
		<legend>Post A Comment</legend>


  		<textarea rows="5" style="background-color:#faedd6" cols="100" id="comment" placeholder="Enter Your Comment Here!"></textarea>
  		<br><br>
  		

  		<button id="commentbutton" class="btn btn-default">Post</button>
  	</form>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#commentbutton").click(function( event ){
				event.preventDefault();
		
                var request = $.post("CommentHandler.php",
                    { 
                    	comment: $("#comment").val()
                    },
                    function(data,status) {      		
                		$("#results").html("data" + data + " status", status);
                	}
                );
                
                
            });
		});
	</script>
	
	       		<div class="nav grid_7" align="left">
<hr>
            <div class="col-md-6 col-xs-12">
                <nav class="">
                    <ul>
<font color="F5DEB3">
							<a href="http://www.bc.edu/sites/accessibility.html">Accessibility       </a>|
                            <a href="http://www.bc.edu/emergency">       Emergency       </a>| 
                            <a href="http://www.bc.edu/bc-web/about/maps-and-directions.html">       Maps       </a>|
                            <a href="https://portal.bc.edu/portal/page/portal/Public/PublicDirectorySearch">       Directories       </a>|
                            <a href="http://www.bc.edu/a-z/directories/contact.html">       Contact       </a></font>
 
                    </ul>
                </nav>
            </div>

                <div class="copyright text-right">
                  <font color="F5DEB3">  Copyright &copy; 2016 Trustees of Boston College </font>


<br><br><b><u><center>    <a href="#"><font color="DAA520">Back To Top</font></a></center></u></b>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>