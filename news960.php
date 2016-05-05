<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title> BC News </title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			<link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
		<link rel ="stylesheet" href="css/bootW.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

		<div class="nav grid_7" align="right">
					<font color="DAA520"><a href="#home"><font color="F5DEB3">Home</font></a> / <a href="http://www.bc.edu/"><font color="F5DEB3">Stay Connected</font></a> / <a href="https://mail.google.com/"> <font color="F5DEB3">Contact Us</font></a> / <a href="LogoutCookie.php"><font color="F5DEB3">Logout</font></a></font>
				</div>
<body style="padding:20px;">
<h1 align=center> Boston College Latest News </h1>
<br>

<ul class="nav nav-tabs" style>

<li><a href="http://cscilab.bc.edu/~concham/Project/homepage960.html" data-toggle="tab" style=".navbar-toggle:focus{background-color:#272b2e}"><font color="F5DEB3">Home</font></a></li>
<li class="active"><a href="http://cscilab.bc.edu/~concham/Project/news960.php?" data-toggle="tab"><font color="F5DEB3">Get BC News!</font></a></li>
<li class="disabled"><a href="" data-toggle="tab"><font color="F5DEB3">Send Email</font></a></li>
<li class="disabled"><a href="" data-toggle=""><font color="F5DEB3">Message Borard</font></a></li>
<li><a href="http://cscilab.bc.edu/~concham/Project/newlogin960.php" data-toggle="tab"><font color="F5DEB3">Log In</font></a></li>
<li><a href="http://cscilab.bc.edu/~concham/Project/registrationform960.html" data-toggle="tab"><font color="F5DEB3">Create Account</font></a></li>
<li class="disabled"><a href="" data-toggle="tab"><font color="F5DEB3">Reset Password</font></a></li>

</ul>

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
	</style>

<br><br>			
				
				<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <div class="carousel-inner" role="listbox" >
    <div class="item active">
      <img class="first-slide center-block" src="bcseal.jpg" alt="Boston College Logo" class="img-rounded" height="300" width="300">
       <div class="container">
       <div class="carousel-caption">
      	<h3></h3>
      	</div>
    </div>
    </div>

    <div class="item">
    <br>    <br>    <br>    <br>    <br>    <br>
      <img class="second-slide center-block" src="pic5.jpg" alt="NEC News" height="300" width="600">
      <br>    <br><br>    <br><br>
       <div class="container">
       <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
    </div>

    <div class="item">
          <br>    <br><br>    <br>
      <img class="third-slide center-block" src="pic6.jpg" alt="Boston College Campus" height="600" width="600">
      <br>    <br><br>    <br>
       <div class="container">
       <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
    </div>

    <div class="item">
    <br>    <br><br>    <br>    
      <img class="fourth-slide center-block" src="pic7.jpg" alt="Stokes Hall" height="600" width="600" >
<br>    <br><br>    
       <div class="container">
       <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
  </div>
  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br>



	  <?php
  $feeds = array(
  				'http://www.thenecpaper.com/feed/',
  				'http://bcheights.com/feed/',
  				'http://bcgavel.com/feed/'
				);
  
  ?>
  
  <fieldset class="fieldset1">
  <legend> Campus News </legend>

  <?php
  create_form($feeds, "feed");
  
  if ( isset( $_GET['getfeed'] ) ) {
  	handle_form( $_GET['feed'] );	
  }
  
  ?>
  </fieldset>
	
	
	
	<?php
function handle_form( $myfeed ) {
	  $rss = simplexml_load_file( $myfeed );
 	  
      $title =  $rss->channel->title;
      echo "<h1>$title</h1>";
      # I would like to do this:
      #     foreach ($rss->channel->item as $item) {
      # or this:
      #     foreach ($rss->item as $item) {
      # but which one depends on the rss version in use.
      $items = $rss->channel->item; # try, works some versions
      if (!$items)
        $items = $rss->item; # works other versions
      foreach ( $items as $item ) {
      	echo " <div class='news' >";
        echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        echo $item->description . "<br><br>\n";
        echo "</div>";
      }
}
function create_form( $farray, $menuname ){
?>
<form method="get">
	<?php create_menu( $farray, $menuname ); ?>
	 &nbsp; <input type="submit"  class="btn btn-default" name="getfeed" value="Get News!">
</form>
<?php
}
function create_menu($farray, $menuname){
	$current_feed = isset( $_GET['feed'] ) ?  $_GET['feed'] : "";
	echo "<select name='$menuname'>";
	foreach ( $farray as $f ) {
		if ( $current_feed == $f )  {
			echo "<option value='$f' selected>$f</option>";
		} else {
			echo "<option value='$f'>$f</option>";
		}
	}
	echo '</select>';
}
?>

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
<script>
	$('.carousel').carousel({
		interval: 5000
	})
</script>
	</body>
</html>
