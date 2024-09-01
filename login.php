<?php
if (isset($_POST['submit'])) {
	include "db.php";


	//stafflogin
	if ($_POST['submit'] == 'stafflogin') {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		$query = "select * from stafflogin where username='$username' and password='$password'";
		$result = mysqli_query($connection, $query);

		//staff login success
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			//ini_set('session.name',"mu");
			ini_set('session.cookie_lifetime',3600*5.5);
			ini_set('session.gc_maxlifetime',3600*5.5);
			session_start();
			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['designation'] = $row['designation'];

			echo json_encode(array("success" => true));

		}
		//staff login fail
		else {
			echo json_encode(array("success" => false, "message" => "Invalid username or password"));
		}
	}



	//student login

	if ($_POST['submit'] == 'studentlogin') {
		$regno = mysqli_real_escape_string($connection, $_POST['regno']);
		$query = "select * from studentinfo where regno='$regno'";
		$result = mysqli_query($connection, $query);

		//student login success

		if (mysqli_num_rows($result) == 1) {
			//ini_set('session.name',"mu");
			ini_set('session.cookie_lifetime',60*60*24*365);
			ini_set('session.gc_maxlifetime',60*60*24*365);
			session_start();
			$_SESSION['regno'] = $regno;
			//header("location:studentdashboard.php");
			echo json_encode(array("success" => true));
		}
		//student login fail
		else {
			echo json_encode(array("success" => false, "message" => "Invalid register no"));
		}
	}
}
?>