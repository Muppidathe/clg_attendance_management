<?php
include "db.php";
if (isset($_POST['submit'])) {
  $coursename = mysqli_real_escape_string($connection, $_POST['cname']);
  $year = mysqli_real_escape_string($connection, $_POST['year']);
  $department = mysqli_real_escape_string($connection, $_POST['dept']);
  $query = "insert into courses(dept,year,course) values('$department',$year,'$coursename')";
  $result = mysqli_query($connection, $query);
  if ($result) {
    echo json_encode(array("success" => true, "message" => "course succesfully created"));
  } else {
    echo json_encode(array("success" => false, "message" => "cannot create course"));
  }
}

?>