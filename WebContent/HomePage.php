<?php
//session_start();
include "./connect_db.inc";
$connection = db_connect();

if ( ! $connection ) 
{
	print( "cannot connect to database" );
	exit;
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>GameXplorer || Get anything about game.</title>
<link href="Style/Home.css" rel="stylesheet">

<style type="text/css">

</style>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>

  <script type="text/javascript">
$(function(){
$(".cuboid-text").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});
    </script>

<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
<link href="Style/Style.css" rel="stylesheet">
</head>
<body bgcolor="#efefef">

<div class="header1">

		<a href="#" style="border:none;">Top Publishers </a> <a href="Browse.php">Browse Games </a> <a
			href="HomePage.php">Home </a>
</div>
 
<video class="content-row-video" autoplay preload loop width="1348dp" >
<source src="videoplayback.mp4" type="video/mp4">
</video>   

<div class="shroud" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.9)">
<h1>BEST  STOP  TO  BROWSE <span> YOUR  GAMES,ITS REQUIREMENTS<br>RATINGS AND </span>DETAILS.<br></h1>

<div id="cuboid">
	<form action="ViewSingleGame.php" method="post">
		<!-- #1 hover button -->
		<div>
			<p class="cuboid-text" align="center">Search for games</p>
		</div>
		<!-- #2 text input -->
		<div>
			<!-- Label to trigger #submit -->
			<label for="submit" class="submit-icon">
				<i class="fa fa-chevron-right"></i>
			</label>
			<input type="text" id="searchid" class="cuboid-text" name="getName" placeholder="Type Here..." autocomplete="off"/>
			<!-- hidden submit button -->
			<input type="submit" id="submit"  />
            
		</div>
		<!-- #3 loading message -->
	
		<!-- #4 success message -->
	
	</form>
</div>
<div id="result"></div>
</div>

<div class="recents">
<p align="center">RECENTS GAMES</p>


<ul>
<?php 
            
                $query="select * from  gamedetails ORDER BY g_year desc" ;
                $result=mysql_query($query,$connection);
                 $num=mysql_num_rows($result);
				 
   

              $i=0;
                      while ( $i < $num )
              
             {

            $gposter=mysql_result($result,$i,"g_poster");
			$g_name=mysql_result($result,$i,"g_name");
			$grate=mysql_result($result,$i,"g_rate");
			$gyr=mysql_result($result,$i,"g_year");

			 
?>    


<li><form action="ViewSingleGame.php" method="post"><input type="hidden" name="getName" value="<?php echo "$g_name";?>" > <?php echo "<button type='submit' id='getLink'><img src='image/$gposter' width='220dp' height='300dp'></button>"; ?><br><label ><?php echo "$g_name";?><br><span><?php echo "$gyr";?></span><button><?php echo "$grate";?></button></label> </form></li>





<?php 
            $i++; 
            
 }
            ?>
            </ul>
           
</div>

</body>
</html>