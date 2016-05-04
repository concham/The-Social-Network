<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
	<meta charset="utf-8"/>
	<title>HW Admin</title>

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
<!-- <script type="text/javascript" src="JS/HWForm.js"></script> -->
</head>

<h1> The Social Network - Admin Page</h1>

<hr class="style1"><hr class="style2">
<br>
		<fieldset class="fieldset1">	
			<legend> Club Members</legend>
<br>
		<form method="post">
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
<?
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
				
				
	$dbc = connectToDB("kernanc");
	$result = performQuery($dbc, $qry);
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
		$qry="SELECT COUNT(firstname) as count from countries;";
		
		$dbc = connectToDB("kernanc");
		$result = performQuery($dbc, $qry);
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
		
		
</form>

 <table border=\"1\" style=\"width:100%\">
<tr><th>First Name</th><th>Last Name</th><th>School</th><th>Email</th><th>Registration Date</th></tr>

</table>
		</fieldset>	
		<br>

<fieldset class="fieldset2">	
			<legend> Create Group Mail</legend>
<br>
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
</form>
										<?php
										// define variables and set to empty values
										$subjectErr = $messageErr = $schoolErr = $passwordErr = "";
										$subject = $message = $school = $password  = "";

										if ($_SERVER["REQUEST_METHOD"] == "POST") {
										   if (empty($_POST["subject"])) {
											 $subjectErr = "Subject is required";
										   } else {
											 $subject = test_input($_POST["subject"]);
										   }
   
										   if (empty($_POST["message"])) {
											 $messageErr = "Message is required";
										   } else {
											 $message = test_input($_POST["message"]);
										   }
	 
										   if (empty($_POST["school"])) {
											 $schoolErr = "School is required";
										   } else {
											 $school = test_input($_POST["school"]);
										   }

										   if (empty($_POST["password"])) {
											 $passwordErr = "Password is required";
										   } else {
											 $password = test_input($_POST["password"]);
										   }
										}

										function test_input($data) {
										   $data = trim($data);
										   $data = stripslashes($data);
										   $data = htmlspecialchars($data);
										   return $data;
										}
										?>

<!-- 
										<h2>PHP Form Validation Example</h2>
										<p><span class="error">* required field.</span></p>
										<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
										   Name: <input type="text" name="name">
										   <span class="error">* <?php echo $nameErr;?></span>
										   <br><br>
										   E-mail: <input type="text" name="email">
										   <span class="error">* <?php echo $emailErr;?></span>
										   <br><br>
										   Website: <input type="text" name="website">
										   <span class="error"><?php echo $websiteErr;?></span>
										   <br><br>
										   Comment: <textarea name="comment" rows="5" cols="40"></textarea>
										   <br><br>
										   Gender:
										   <input type="radio" name="gender" value="female">Female
										   <input type="radio" name="gender" value="male">Male
										   <span class="error">* <?php echo $genderErr;?></span>
										   <br><br>
										   <input type="submit" name="submit" value="Submit"> 
										</form>
 -->

<!-- 
										<?php
										echo "<h2>Your Input:</h2>";
										echo $name;
										echo "<br>";
										echo $email;
										echo "<br>";
										echo $website;
										echo "<br>";
										echo $comment;
										echo "<br>";
										echo $gender;
										?>
 -->



		<label for="email">Subject </label>
		<input type="text" name="subject" id="subject" size="30" /><span class="error">* <?php echo $subjectErr;?></span>		
		<br><br>


		<label for="message">Your Message: </label>
		<br><br><textarea rows= "6" cols= "100" name= "message"></textarea><span class="error">* <?php echo $messageErr;?></span>
		

		<br><br>
		<label>Name of your school: </label>		<span class="error">* <?php echo $schoolErr;?></span>
		<br><br>
		<input type="radio" name="school" value="A&S" checked class="input2"> Morrissey College of Arts & Sciences 
		<br><br>
		<input type="radio" name="school" value="Law" class="input2"> Law School
		<br><br>
		<input type="radio" name="school" value="Woods"> Woods College of Advancing Studies
		<br><br>
		<input type="radio" name="school" value="Social"> School of Social Work
		<br><br>
		<input type="radio" name="school" value="CSOM"> Carroll School of Management
		<br><br>
		<input type="radio" name="school" value="CSON"> Connell School of Nursing
		<br><br>
		<input type="radio" name="school" value="Lynch"> Lynch School of Education
		<br><br>
		<input type="radio" name="school" value="Theo"> School of Theology & Ministry

		<br><br>
		<label for="email">Mail Password: </label>
		<input type="text" name="password" id="password" size="30" /><span class="error">* <?php echo $passwordErr;?></span>		
		<br><br>
		<button id="GRButton">Send Your Message!</button> 
		</fieldset>	



 </body>
</html>

	