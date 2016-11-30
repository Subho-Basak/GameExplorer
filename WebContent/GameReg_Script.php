<?php	
include "./connect_db.inc";
$connection = db_connect();

	if ( ! $connection ) 
        {
		print( "cannot connect to database" );
		exit;
	}
$g_id = $_POST['ugid'];
$g_name=$_POST['name'];
$g_rls=$_POST['rlsdt'];
$g_pub=$_POST['pub'];
$g_syn=$_POST['synop'];
$g_rate=$_POST['rate'];
$g_dev=$_POST['dev'];
$g_gn1=$_POST['gnr1'];
$g_gn2=$_POST['gnr2'];
$g_gn3=$_POST['gnr3'];
$g_pl1=$_POST['pl1'];
$g_pl2=$_POST['pl2'];
$g_pl3=$_POST['pl3'];

//minimum
$g_mos=$_POST['m_os'];
$g_mcpu=$_POST['m_cpu'];
$g_mram=$_POST['m_ram'];
$g_mgpu=$_POST['m_gpu'];

//recommend
$g_ros=$_POST['r_os'];
$g_rcpu=$_POST['r_cpu'];
$g_rram=$_POST['r_ram'];
$g_rgpu=$_POST['r_gpu'];



if(is_array($_FILES)) {
$fileName=array();	
foreach ($_FILES['image']['name'] as $name => $value){
if(is_uploaded_file($_FILES['image']['tmp_name'][$name])) {
$sourcePath = $_FILES['image']['tmp_name'][$name];
$targetPath = "image/".$_FILES['image']['name'][$name];
$fileName[]=$_FILES['image']['name'][$name];


$m=move_uploaded_file($sourcePath,$targetPath);

}
}}

$sql="insert into gamedetails(ugid,g_name,g_dev,g_year,g_pub,g_synops,g_rate,g_gnr1,g_gnr2,g_gnr3,g_plat1,g_plat2,g_plat3,m_os,m_cpu,m_ram,m_gpu,r_os,r_cpu,r_ram,r_gpu,g_poster,g_covr,g_shot1,g_shot2,g_shot3) values('$g_id','$g_name','$g_dev','$g_rls','$g_pub','$g_syn','$g_rate','$g_gn1','$g_gn2','$g_gn3','$g_pl1','$g_pl2','$g_pl3','$g_mos','$g_mcpu','$g_mram','$g_mgpu','$g_ros','$g_rcpu','$g_rram','$g_rgpu','$fileName[0]','$fileName[1]','$fileName[2]','$fileName[3]','$fileName[4]')";



//echo $sql;
$result=mysql_query($sql,$connection);

if($result)
{
	header("location:AddGame.php");
	
}
else
{
	echo "error";
}
