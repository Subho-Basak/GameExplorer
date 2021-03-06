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
<title>GameXplorer || Browse games</title>

<link href="Style/thumbnail-slider.css" rel="stylesheet" />
<link href="Style/Home.css" rel="stylesheet">
<script src="js/thumbnail-slider.js" type="text/javascript"></script>
<style type="text/css">
.title{
width:500px;
list-style:none;
margin:150px 300px;	
}
.title li{
display:inline-block;
margin-right:0px;
margin-bottom:20px;
width:200px;
font-size:40px;	
overflow:hidden;
}
.title li:nth-child(1){
color:#555;
}

#toleft{
margin-left:200px;	
}
#toright{
margin-left:-200px;	
}
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
<body bgcolor="#333">
<img src="Images/HITMAN Gameplay Trailer HD E3 2015 - YouTube.MP4_20160909_190535.160.jpg" width="1348dp" height="400dp" style="z-index:-1;-webkit-filter:blur(2px)">
<div class="header1">

		<a href="#" style="border:none;">BOOK AMBULANCE </a> <a href="BrowseGames.php">Browse Games </a> <a
			href="HomePage.php">Home </a>
</div>
 

<div class="searchPanel">
<ul class="title">
	<li><p id="toleft">BROWSE</p></li><li><p id="toright">GAMES</p></li>
	<form action="ViewSingleGame.php" method="post">


			<input type="text" id="searchid" class="cuboid-text" name="getName" placeholder="Type Here..." autocomplete="off"/>

			<input type="submit" class="find"  />

	
	</form>
    <div id="result"></div>

</div>
<?php 
            
                $query="select count(ugid) as num from  gamedetails" ;
                $result=mysql_query($query,$connection);
                 $num=mysql_num_rows($result);
				$a=0;
				 $rownum=mysql_result($result,$a,"num");
				 ?>


<div style="padding:50px 0;background:#eee;" class="genre">

		<h4>Genre</h4><br>
		
        <div id="thumbnail-slider">
            <div class="inner">
                <ul>
                    <li>
                        <div style="background:rgba(10,10,10,0.5);"><p align="center">ACTION</p><img class="thumb" src="img/actn.jpg" ></div><br>
                        
                    </li>
                    <li>
                        <div style="background:rgba(190,180,77,0.5);"><img class="thumb" src="img/fntsy.jpg"></div>
                    </li>
                    <li>
                        <div style="background:rgba(10,10,10,0.5);"><img class="thumb" src="img/stlth.jpg"></div>
                    </li>
                    <li>
                        <div style="background:rgba(180,80,190,0.5);"><img class="thumb" src="img/advntre.jpg"></div>
                    </li>
                    <li>
                       <div style="background:rgba(10,10,10,0.5);"> <img class="thumb" src="img/fps.jpg"></div>
                    </li>
                      <li>
                       <div style="background:rgba(255,255,255,0.5);"> <img class="thumb" src="img/tps.jpg"></div>
                    </li>
                      <li>
                        <div style="background:rgba(100,190,80,0.5);"><img class="thumb" src="img/sprt.jpg"></div>
                    </li>
                      <li>
                       <div style="background:rgba(50,120,190,0.5);"> <img class="thumb" src="img/race.jpg"></div>
                    </li>
                      <li>
                        <div style="background:rgba(190,30,80,0.5);"><img class="thumb" src="img/horror.png"></div>
                    </li>
                      <li>
                        <div style="background:rgba(25,190,170,0.5);"><img class="thumb" src="img/strtgy.jpg"></div>
                    </li>
                    </ul>
            </div>
        </div>
     </div>


<div class="recents" style="position:absolute;top:700px;">

<p align="left" style="font-size:18px;font-weight:200"><?php echo "$rownum" ?> &nbsp; Results found.</p>
<label>Sort by:</label>
<div class="dropdown" style="float:right;">
  <button class="dropbtn">Alphabetic &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>
  <div class="dropdown-content">
    <a href="#">Alphabetic</a>
    <a href="#">Newest</a>
    <a href="#">Oldest</a>
    <a href="#">Popularity</a>
  </div>
</div>

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
<script type="text/javascript">

$(document).ready(function(){
	$(function(){
	$('#toright').animate({'margin-left':'0px'},"slow");
	$('#toleft').animate({'margin-left':'0px'},"slow");
});
	$(document).click( function(){
		$('.dropdown-content').removeClass('active');
    });
    
$('.dropdown').click(function(){
	event.stopPropagation();
	$('.dropdown-content').addClass('active');
});

});

</script>


</body>
</html>