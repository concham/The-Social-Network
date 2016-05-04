<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Email</title>
<style>
	body {
		background-color: #ffddcc;
		color: #ff7755;
		}
	h1 {
		color: #ff7755;
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
		background-color: #ffccbb;
	}
	label {
		color: #ff7755; 
		font-size: 115%;
	}
	legend {
		color: #ff7755; 
		font-size: 140%;
	}
	fieldset {
		border: 3px solid #ff9977;	
		}
	button{
		background-color: white;
		border: 2px color: black;
		font-size: 15px;
	}
</style>
</head>
<body>
<h1> Email List </h1>
	<div id= "studenttabble">
	<br>
<?php
	include('dbconn.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<style>
body {
	background-color: #ffddcc;
	color: #ff7755; 
	}
h1 {
	color: #ff7755;
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
	background-color: #ffddcc;
}
label {
	color: #ff7755; 
	font-size: 115%;
}
legend {
	color: #ff7755; 
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
tr:nth-child(even){background-color: #ffcc99;}
tr:nth-child(odd){background-color: #ff9977;}
tr:hover{background-color: #ff7755;}
	
	</style>


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

<form id="ajaxRequestForm" method="post">
	<fieldset>
		<legend>Create School Mail</legend>
		<label> Subject:</label> <br>
		<textarea rows= "2" cols= "60" id="subject" placeholder="Subject of your Email"></textarea>
		<p id="subjecterror"></p>
		
		<br>
		<br>
		<label> Your Message:</label> <br>
		<textarea rows= "10" cols= "100" id="message" name= "Additional Information"  placeholder="Write the Message of your Email Here!"></textarea>
		<p id="messageerror"></p>
		
	<br>
		<p> Choose Your School: </p>
		
		<input type="checkbox" name="school" class="school" id="mcas" value="Morrissey College of Arts & Sciences"> Morrissey College of Arts & Sciences <br>
		<input type="checkbox" name="school" class="school" id="law" value="Law School"> Law School <br>
		<input type="checkbox" name="school" class="school" id="woods" value="Woods College of Advancing Studies"> Woods College of Advancing Studies <br>
		<input type="checkbox" name="school" class="school" id="social" value="School of Social Work"> School of Social Work <br>
		<input type="checkbox" name="school" class="school" id="csom" value="Carroll School of Management"> Carroll School of Management <br>
		<input type="checkbox" name="school" class="school" id="nursing" value="Connell School of Nursing"> Connell School of Nursing <br>
		<input type="checkbox" name="school" class="school" id="lynch" value="Lynch School of Education"> Lynch School of Education <br>
		<input type="checkbox" name="school" class="school" id="theology" value="School of Theology & Ministry"> School of Theology & Ministry <br>
		<p id="checkboxerror"> </p>
	<br><br>
		<button id="sendemail">Send</button>
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
	
<script>
	function validation() {
	
	var subject = document.getElementById("subject").value;
	var message = document.getElementById("message").value;
	var errorsubject=document.getElementById("subjecterror");
	var errormessage = document.getElementById("messageerror");
	var errorcheckbox= document.getElementById("checkboxerror");
	//subject validation
	if (subject==""){
				errorsubject.innerHTML = "Please enter an Email";
				}
	//message validation
	if (message=="") {
		errormessage.innerHTML= "Please enter a message to send";
		}
					
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
    if(okay) {}
    else { 
    	
    	errorcheckbox.innerHTML = "Please check a major"}
}
</script>
