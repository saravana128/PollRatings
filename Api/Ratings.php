<?php
$vote = $_REQUEST['vote'];

$con = mysqli_connect('localhost','root','Sai@159$D19','ratings');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT vote FROM charecter WHERE ID = 101";
$yes = mysqli_query($con,$sql);
$sql2="SELECT vote FROM charecter WHERE ID = 102";
$no = mysqli_query($con,$sql2);

echo($yes);
echo(" "+$no);

if($vote = "101")
{
	$yes = $yes +1;
	$sql3="UPDATE charecter SET vote = $yes WHERE ID = 101";
	mysqli_query($con,$sql3);
}
else
{
	$no =$no+1;
	$sql3="UPDATE charecter SET vote = $no WHERE ID = 102";
	mysqli_query($con,$sql3);
}

mysqli_close($con);

echo(100*round($yes/($no+$yes),2));
echo(" ");
echo(100*round($no/($no+$yes),2));
?>