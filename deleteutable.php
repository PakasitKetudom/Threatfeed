<meta charset="UTF-8">
<?php
// if( !isset( $_GET['id']) ){
// 	echo "<script>window.location='index.php';</script>";
// 	exit();
// }
//$id = base64_decode($_GET['id']);
$vendor = $_POST["getvendor"];
$title = $_POST["gettitle"];
$version = $_POST["getversion"];
$edition = $_POST["getedition"];

include('connectdb.php');

 $sqldel = "Delete from utable where vendor='".$vendor."' AND title='".$title."' AND version='".$version."' AND edition='".$edition."' ";
 mysqli_query($conn,$sqldel)
	
?>
<script>
alert('Delete Successfully');
window.location='showutable.php';
</script>