<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Email</title>


	<link rel ="stylesheet" href="css/bootW.css">
</head>
<body>
<body style="padding:20px;">
<h1> Boston College Email List </h1>
  <a href="LogoutCookie.php">Logout</a>
  <br><br>
  <a href="homepage960.html">Return to Home</a>
<br>

<ul class="nav nav-tabs" style>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/homepage960.html" data-toggle="tab"><font color="F5DEB3">Home</font></a></li>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/news960.php" data-toggle="tab"><font color="F5DEB3">Get BC News!</font></a></li>
<li class="active"><a href="http://cscilab.bc.edu/~barthch/csciproject960/EmailList.php" data-toggle="tab"><font color="F5DEB3">Send Email</font></a></li>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/messageboard960.php" data-toggle="tab"><font color="F5DEB3">Comment</font></a></li>
<li class="disabled"><a href="http://cscilab.bc.edu/~barthch/csciproject960/newlogin960.php" data-toggle="tab"><font color="F5DEB3">Log In</font></a></li>
<li class="disabled"><a href="http://cscilab.bc.edu/~barthch/csciproject960/registrationform960.html" data-toggle="tab"><font color="F5DEB3">Create Account</font></a></li>
<li><a href="http://cscilab.bc.edu/~barthch/csciproject960/passwordreset960.html" data-toggle="tab"><font color="F5DEB3">Reset Password</font></a></li>

</ul>
<br>
<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" >
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
      
      
      
      
      
<br><br>
	<div id= "studenttabble">
	<br>
<?php
	include('dbconn.php');
?>


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
}
table, th, td {
	border: 1px solid black;
	width: 100%;
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
		<legend>Email Database</legend>
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
	echo "";
	
  		
	// creating page links
	if ($pages > 1) {
		echo '<nav>
  		<ul class="pagination pagination-sm">';
		




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
?>
	</form>
	</fieldset>

<br>


	<form id="ajaxRequestForm" method="post">


	<fieldset>
		<legend>Create School Mail</legend>
		<label> <font color="F5DEB3">Subject:</font></label> <br>
		<textarea style="background-color:#faedd6" rows= "2" cols= "60" id="subject" placeholder="Subject of your Email"></textarea>
		<p id="subjecterror"></p>
		
		<br>
		<br>
		<label> <font color="F5DEB3">Your Message:</font></label> <br>
		<textarea style="background-color:#faedd6" rows= "10" cols= "100" id="message" name= "Additional Information"  placeholder="Write the Message of your Email Here!"></textarea>
		<p id="messageerror"></p>
		
	<br>
		<p> <font color="F5DEB3">Choose Your School:</font> </p>
		
		<input type="checkbox" name="school" class="school" id="mcas" value="Morrissey College of Arts & Sciences"><font color="F5DEB3"> Morrissey College of Arts & Sciences</font> <br>
		<input type="checkbox" name="school" class="school" id="law" value="Law School"> <font color="F5DEB3">Law School </font><br>
		<input type="checkbox" name="school" class="school" id="woods" value="Woods College of Advancing Studies"><font color="F5DEB3"> Woods College of Advancing Studies </font><br>
		<input type="checkbox" name="school" class="school" id="social" value="School of Social Work"><font color="F5DEB3"> School of Social Work </font><br>
		<input type="checkbox" name="school" class="school" id="csom" value="Carroll School of Management"> <font color="F5DEB3">Carroll School of Management</font> <br>
		<input type="checkbox" name="school" class="school" id="nursing" value="Connell School of Nursing"><font color="F5DEB3"> Connell School of Nursing </font><br>
		<input type="checkbox" name="school" class="school" id="lynch" value="Lynch School of Education"><font color="F5DEB3"> Lynch School of Education </font><br>
		<input type="checkbox" name="school" class="school" id="theology" value="School of Theology & Ministry"> <font color="F5DEB3">School of Theology & Ministry </font><br>
		<div id="checkboxerror"> </div>
	<br>
		<button id="sendemail" class="btn btn-danger">Send</button>
	</form>
	</fieldset>
	<div id="results"></div>
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function(){
		$("#sendemail").click(function( event ){
			event.preventDefault();
			
				if ($('.school:checked').length) {
          			var schools = '';
          			$('.school:checked').each(function () {
            			schools += "'" + $(this).val() + "',";
          			});
          				schools = schools.slice(0, -1);
   				 }
				
				
                //start ajax request
                var request = $.post("EmailHandler.php",
                    { 
                    	subject: $("#subject").val(),
                    	message: $("#message").val(),
                    	schools: schools	
                    },
                    function(data,status) {      		
                		$("#results").html("data" + data + " status", status);
                	}
                );
                
                
            	});
	});
	
</script>

	
</body>
</html>
	

