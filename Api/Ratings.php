<?php
$vote = $_REQUEST['vote'];

$con = mysqli_connect('localhost','root','Sai@159$D19','ratings');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ratings");
$sql="SELECT * FROM charecter WHERE id = 101";
$vijay = mysqli_query($con,$sql);
$sql2="SELECT * FROM charecter WHERE id = 102";
$ajith = mysqli_query($con,$sql2);

$dataVijay = mysqli_fetch_array($vijay);
$dataAjith = mysqli_fetch_array($ajith);

$yes = $dataVijay['vote'];
$no = $dataAjith['vote'];

if($vote = "101")
{
	$yes = $yes +1;
	$sql3="UPDATE charecter SET vote = $yes WHERE id = 101";
	mysqli_query($con,$sql3);
}
else
{
	$no =$no+1;
	$sql3="UPDATE charecter SET vote = $no WHERE id = 102";
	mysqli_query($con,$sql3);
}

mysqli_close($con);

echo(100*round($yes/($no+$yes),2));
echo(",");
echo($yes);
echo(" ");
echo(100*round($no/($no+$yes),2));
echo(",");
echo($no);
?>