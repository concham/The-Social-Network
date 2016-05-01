<html>
<head>
    <title>Social Network</title>
	<style>
	body {
	background-color: #ffddcc;
	}
h1 {
	color: #ff7755;
	text-align: center;
	}
form {
	background-color: #ffddcc;
	color: #ff7755; 

}
input{  
margin-right: 950px;
display: inline-block;
float: right;
}
#bcseal{

left: 20px;
width: 200px;
height: 200px;
top: 155px;
margin-left: 610px;
/* margin-right: 500px; */
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
	border: 3px solid #ff7755;	
	height: 400px;
	position: relative;
	top: 10px;
	overflow: auto; 
}
.fieldset2 {
	border: 3px solid #ff7755;	
	height: 200px;
	position: relative;
	top: 10px;
}   
</style>
</head>
<body>
  <?php
  $feeds = array(
  				'http://www.thenecpaper.com/feed/',
  				'http://bcheights.com/feed/',
  				'http://bcgavel.com/feed/'
				);
  
  ?>
  <h1>Boston College Social Network</h1>
  <a href="LogoutCookie.php">Logout</a>
  <img src= 'bcseal.jpg' alt='Boston College Seal' id= "bcseal" >
  <fieldset class="fieldset1">
  <legend> Campus News </legend>

  <?php
  create_form($feeds, "feed");
  
  if ( isset( $_GET['getfeed'] ) ) {
  	handle_form( $_GET['feed'] );	
  }
  
  ?>
  </fieldset>
  
  <fieldset>
  <legend>Boston College E-mail</legend>	
  <a href="cscilab.bc.edu/~kernanc/project/TheSocialNetwork/EmailList.html">Send an email</a>	
  </fieldset>
  
</body>
</html>
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
      	echo "<div class='news'>";
        echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        echo $item->description . "<br><br>\n";
        echo "</div>";
      }
}
function create_form( $farray, $menuname ){
?>
<form method="get">
	<?php create_menu( $farray, $menuname ); ?>
	<input type="submit" name="getfeed" value="Get News!">
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
