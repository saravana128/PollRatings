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

$sql3="SELECT * FROM charecter WHERE id = 103";
$rajini = mysqli_query($con,$sql3);
$sql4="SELECT * FROM charecter WHERE id = 104";
$surya = mysqli_query($con,$sql4);

$dataVijay = mysqli_fetch_array($vijay);
$dataAjith = mysqli_fetch_array($ajith);
$dataRajini = mysqli_fetch_array($rajini);
$dataSurya = mysqli_fetch_array($surya);

$yes = $dataVijay['vote'];
$no = $dataAjith['vote'];
$raj = $dataRajini['vote'];
$sur = $dataSurya['vote'];

if($vote === "101")
{
	$yes = $yes +1;
	$sql3="UPDATE charecter SET vote = $yes WHERE id = 101";
	mysqli_query($con,$sql3);
}
else
{
	if($vote === "102")
	{
		$no =$no+1;
		$sql3="UPDATE charecter SET vote = $no WHERE id = 102";
		mysqli_query($con,$sql3);
	}
	elseif ($vote === "103") {
		$raj =$raj+1;
		$sql3="UPDATE charecter SET vote = $no WHERE id = 103";
		mysqli_query($con,$sql3);
	}
	else
	{
		$sur =$sur+1;
		$sql3="UPDATE charecter SET vote = $no WHERE id = 104";
		mysqli_query($con,$sql3);
	}
}

mysqli_close($con);

echo(100*round($yes/($no+$yes+$raj+$sur),2));
echo(",");
echo($yes);
echo(" ");
echo(100*round($no/($no+$yes+$raj+$sur),2));
echo(",");
echo($no);

//rajini
echo(100*round($raj/($no+$yes+$raj+$sur),2));
echo(",");
echo($raj);

//surya
echo(100*round($sur/($no+$yes+$raj+$sur),2));
echo(",");
echo($sur);
?>