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

<?php
$name = $_POST['getName'];


$query="select * from  gamedetails where g_name='$name'" ;
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);

$i=0;

$gposter=mysql_result($result,$i,"g_poster");
$g_name=mysql_result($result,$i,"g_name");
$gdev=mysql_result($result,$i,"g_dev");
$gyr=mysql_result($result,$i,"g_year");
$gpub=mysql_result($result,$i,"g_pub");
$gsyn=mysql_result($result,$i,"g_synops");
$gnr1=mysql_result($result,$i,"g_gnr1");
$gnr2=mysql_result($result,$i,"g_gnr2");
$gnr3=mysql_result($result,$i,"g_gnr3");
$plat1=mysql_result($result,$i,"g_plat1");
$plat2=mysql_result($result,$i,"g_plat2");
$plat3=mysql_result($result,$i,"g_plat3");
$gcover=mysql_result($result,$i,"g_covr");
$grate=mysql_result($result,$i,"g_rate");
$gshot1=mysql_result($result,$i,"g_shot1");
$gshot2=mysql_result($result,$i,"g_shot2");
$gshot3=mysql_result($result,$i,"g_shot3");

$gmos=mysql_result($result,$i,"m_os");
$gmcpu=mysql_result($result,$i,"m_cpu");
$gmram=mysql_result($result,$i,"m_ram");
$gmgpu=mysql_result($result,$i,"m_gpu");

$gros=mysql_result($result,$i,"r_os");
$grcpu=mysql_result($result,$i,"r_cpu");
$grram=mysql_result($result,$i,"r_ram");
$grgpu=mysql_result($result,$i,"r_gpu");
$glink=mysql_result($result,$i,"g_link");
$gtrailer=mysql_result($result,$i,"g_trailer");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>GameXplorer | <?php echo "$g_name"; ?></title>
<link href="Style/Home.css" rel="stylesheet">

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="Style/YouTubePopUp.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="js/jquery-2.1.4.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
<link href="Style/Style.css" rel="stylesheet">
    <script type="text/javascript" src="js/YouTubePopUp.jquery.js"></script>
    <script type="text/javascript">
        jQuery(function(){
            jQuery("a.bla-1").YouTubePopUp();
        });
    </script>
</head>
<body bgcolor="#efefef">


<div class="header1">

		<a href="#" style="border:none;">Top Publisher </a> <a href="Browse.php">Browse Games </a> <a
			href="HomePage.php">Home </a>
</div>
 
<?php echo "<img src='image/$gcover' width='1348dp' height='700dp' style='-webkit-filter: blur(5px);-moz-filter: blur(5px);-o-filter: blur(5px);-ms-filter: blur(5px);filter: blur(5px);'>"; ?>

<div class="gameDetailPanel" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.9)">

<?php echo "<img src='image/$gposter' width='280dp' height='400dp'>"; ?>
<ul>
<li><p><?php echo "$g_name"; ?></p></li>
<li><?php echo "$gyr"; ?></li>
<li><?php echo "$gnr1  "; ?> <?php echo "$gnr2 "; ?> <?php echo "$gnr3 "; ?></li>
<li><span><?php echo "$plat1"; ?></span>&nbsp;<span><?php echo "$plat2"; ?></span>&nbsp;<span><?php echo "$plat3"; ?></span></li>
<li>Developers :<label><?php echo "$gdev"; ?></label></li>
<li>Publishers :<label><?php echo "$gpub"; ?></label></li>
</ul>

 			<canvas id="canvas" width="300dp" height="300dp"></canvas>
            <label id="rt" style="position:absolute;top:220px;right:220px;color:#CC9;font-size:45px;"><?php echo "$grate"; ?></label>

	<a href="<?php echo $glink; ?>" id="link" target="_blank"><i class="fa fa-magnet" aria-hidden="true"></i> &nbsp;Download</a>


</div>

<div class="shots">
    <p align="center" style="border:0"><?php echo "<img src='image/$gcover' width='400dp' height='270dp'>"; ?><a class="bla-1" href=<?php echo "'$gtrailer'"; ?>><i class="fa fa-play" aria-hidden="true"></i></a></p>
<p align="center">SCREEN SHOTS</p>

<?php echo "<img src='image/$gshot1' width='400dp' height='270dp'>"; ?>
<?php echo "<img src='image/$gshot2' width='400dp' height='270dp'>"; ?>
<?php echo "<img src='image/$gshot3' width='400dp' height='270dp'>"; ?>
   
</div>

<div class="require">
<h2>Synopsis</h2>
<p><?php echo "$gsyn"; ?></p>

<h2>System Specs</h2>
<table >
<tr><th></th><th>OS</th><th>CPU</th><th>RAM</th><th>GPU</th></tr>

<tr>
<td>Minimum</td>
<td><?php echo "$gmos"; ?></td>
<td><?php echo "$gmcpu"; ?></td>
<td><?php echo "$gmram"; ?></td>
<td><?php echo "$gmgpu"; ?></td>


</tr>

<tr>
<td>Recommended</td>
<td><?php echo "$gros"; ?></td>
<td><?php echo "$grcpu"; ?></td>
<td><?php echo "$grram"; ?></td>
<td><?php echo "$grgpu"; ?></td>


</tr>

</table>


</div>

<script type="text/javascript">
window.onload = function(){
	//canvas initialization
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	//dimensions
	var W = canvas.width;
	var H = canvas.height;
	
	ctx.beginPath();
	ctx.strokeStyle = "#222";
	ctx.lineWidth=5;
	ctx.arc(W/2, H/2, 100, 0, Math.PI*2, false); //you can see the arc now
	ctx.stroke();
	
	//gauge will be a simple arc
	//lets draw a 200 degree arc. we need to specify degrees in radians
	var rate=document.getElementById("rt").innerHTML;
	var degrees = rate*36;
	//Angle in radians = angle in degrees * PI / 180
	var radians = degrees * Math.PI / 180;
	ctx.beginPath();
	ctx.strokeStyle = "lightgreen";
	ctx.lineWidth=5;
	ctx.arc(W/2, H/2, 100, 0-90*Math.PI/180, radians-90*Math.PI/180, false); //you can see the arc now
	ctx.stroke();
	
}

</script>





</body>
</html>