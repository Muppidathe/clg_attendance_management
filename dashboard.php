<?php
include "db.php";
session_start();
if(isset($_SESSION['designation'])){
	if ($_SESSION['designation'] == 'hod' || $_SESSION['designation'] == 'staff') {
		echo json_encode(array("success" => true, "message" => $_SESSION['name']));
	} else {
		echo json_encode(array("success" => false));
	}

}
else {
	echo json_encode(array("success" => false));
}



?>