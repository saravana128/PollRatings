<?php
$vote = $_REQUEST['vote'];

$con = mysqli_connect('localhost','root','Sai@159$D19','ratings');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ratings");
$sql="SELECT vote FROM charecter WHERE id = 101";
$yes = mysqli_query($con,$sql);
$sql2="SELECT vote FROM charecter WHERE id = 102";
$no = mysqli_query($con,$sql2);

echo($yes);
echo(" ");
echo($no);
echo(" ");

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
echo(" ");
echo(100*round($no/($no+$yes),2));
?>