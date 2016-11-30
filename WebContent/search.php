<?php
//session_start();
include "./connect_db.inc";
$connection = db_connect();

if ( ! $connection ) 
{
	print( "cannot connect to database" );
	exit;
}
$q=$_POST['search'];
$sql_res=mysql_query("select * from gamedetails where g_name like '%$q%' order by ugid LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['g_name'];
$rls=$row['g_year'];
$post=$row['g_poster'];
?>
<div class="show" align="left">
<?php echo "<img src='image/$post' style='width:40px; height:50px; float:left; margin-right:6px;' />"; ?> <span class="name"><?php echo $username; ?></span>&nbsp;<br/><span style="color:#ccc"><?php echo $rls; ?><br/></span>
</div>
<?php
}

?>
