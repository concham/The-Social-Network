<!DOCTYPE html>
<html>
	<head>
	<title> News </title>
	</head>
	<body>	
	  <?php
  $feeds = array(
  				'http://www.thenecpaper.com/feed/',
  				'http://bcheights.com/feed/',
  				'http://bcgavel.com/feed/'
				);
  
  ?>
  <h1>Latest News</h1>
  <a href="LogoutCookie.php">Logout</a>
  <br><br>
  <a href="homepage960.html">Return to Home</a>
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
