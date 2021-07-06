<?php
include 'database.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$date=$_POST['date'];
		$start=$_POST['start'];
		$end=$_POST['end'];
		$username=$_POST['username'];
		$issue=$_POST['issue'];
		$room=$_POST['room'];
		$contact=$_POST['contact'];
		$status=$_POST['status'];
		$engeenier=$_POST['engeenier'];
		$remarks=$_POST['remarks'];
		$sql = "INSERT INTO `eoffice`( `date`, `start`,`end`,`username`,`issue`, `room`,`contact`,`status`,`engeenier`,`remarks`) 
		VALUES ('$date','$start','$end','$username','$issue','$room','$contact','$status','$engeenier','$remarks')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$date=$_POST['date'];
		$start=$_POST['start'];
		$end=$_POST['end'];
		$username=$_POST['username'];
		$issue=$_POST['issue'];
		$room=$_POST['room'];
		$contact=$_POST['contact'];
		$status=$_POST['status'];
		$engeenier=$_POST['engeenier'];
		$remarks=$_POST['remarks'];
		$sql = "UPDATE `eoffice` SET `date`='$date',`start`='$start',`end`='$end',`username`='$username',`issue`='$issue',`room`='$room',`contact`='$contact',`status`='$status',`engeenier`='$engeenier',`remarks`='$remarks' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `eoffice` WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM eoffice WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>