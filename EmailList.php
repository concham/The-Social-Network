<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Email</title>
	<link rel ="stylesheet" href="css/bootW.css">
	<script src="./js/functions.js"></script>
</head>
<body>
<body style="padding:20px;">
		<div class="nav grid_7" align="right">
					<font color="DAA520"><a href="http://cscilab.bc.edu/~concham/Project/homepage960.html"><font color="F5DEB3">Home</font></a> / <a href="http://www.bc.edu/"><font color="F5DEB3">Stay Connected</font></a> / <a href="https://mail.google.com/"> <font color="F5DEB3">Contact Us</font></a> / <a href="LogoutCookie.php"><font color="F5DEB3">Logout</font></a></font>
				</div>

<h1> Boston College Email List </h1>
<br>

<ul class="nav nav-tabs">
	<li><a href="http://cscilab.bc.edu/~concham/Project/homepage960.html" >Home</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/news960.php" >Get BC News!</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/EmailList.php" >Send Email</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/messageboard960.php" >Message Board</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/newlogin960.php" >Log In</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/registrationform960.html">Create Account</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/passwordreset960.html">Reset Password</a></li>
</ul>
<br>
	<fieldset>
		<legend>Email Database</legend>
<form class="navbar-form navbar-left" role="search" method="get">
        <div class="form-group">
          <input type="text" name="searchterm" class="form-control" placeholder="Search" >
        </div>
        <input class="btn btn-default" type="submit" value="Submit"/>
      </form>
      
      <br>
      
<br><br>
	<div id= "studenttabble">
	<br>
<?php
	include('dbconn.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>




<?php


	$itemsPerPage=10;

	$pages = findpages($itemsPerPage);
	$start = findstart();
		
	$links = createSortLinks();

	if (isset($_GET['searchterm'])) {
		$trm = $_GET['searchterm'];
		$full = "SELECT firstname, lastname, school, email FROM Member
				where firstname like '%".$trm."%' or lastname like '%".$trm."%'
				ORDER BY {$links['orderby']}
				LIMIT $start, $itemsPerPage";
	}
	else {
		$full = "SELECT firstname, lastname, school, email FROM Member
				ORDER BY {$links['orderby']}
				LIMIT $start, $itemsPerPage";
	}

	
	
	
	
	createDataTable($full, $start, $itemsPerPage, $links);
	
	 echo '</div>
	 	</div></div>
	 	
	 	<div>';
	
	
	createPageLinks($start, $pages, $itemsPerPage, $links['orderby']);
	echo  	"</div>";
?>


<?php
function createDataTable($query, $start, $itemsPerPage, $links){
// 	$qry = "SELECT firstname, lastname, school, email FROM Member
// 				ORDER BY {$links['orderby']}
// 				LIMIT $start, $itemsPerPage";
// 		
	echo "<table id='dataTable' class=\"table\">
				<tr>
					<th class=\"emailtable\"><a href={$links['firstname']}>First Name</a></th>
					<th class=\"emailtable\"><a href={$links['lastname']}>Last Name</a></th>
					<th class=\"emailtable\"><a href={$links['school']}>School</a></th>
					<th class=\"emailtable\"><a href={$links['email']}>Email</a></th>
				</tr>\n";
				
				
	$dbc = connect_to_db("kernanc");
	$result = perform_query($dbc, $query);
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
		<button id="sendemail" class="btn btn-default">Send</button>
	</form>
	</fieldset>
	<div id="results"></div>
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function(){
		$("#sendemail").click(function( event ){
			event.preventDefault();
			var subject = document.getElementById("subject").value;
			var message = document.getElementById("message").value;
			var errorsubject=document.getElementById("subjecterror");
			var errormessage = document.getElementById("messageerror");
			var errorcheckbox= document.getElementById("checkboxerror");
					
	//checkbox validation
  	var checkboxs=document.getElementsByName("school");
    	var okay=false;
    	for(var i=0,l=checkboxs.length;i<l;i++)
    	{
        if(checkboxs[i].checked)
        {
            okay=true;
            break;
        }
    	}
    		if (okay==false){
    			errorcheckbox.innerHTML = "Please check a major"
    		}
			else if (subject==""){
				errorsubject.innerHTML = "Please enter a subject";
				}
				else if (message=="") {
				errormessage.innerHTML= "Please enter a message to send";
					}
		else{
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
                
                
            	}});
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
	

