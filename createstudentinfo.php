<?php



include "db.php";
if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($connection, $_POST['sname']);
  $regno = mysqli_real_escape_string($connection, $_POST['regno']);
  $batch = mysqli_real_escape_string($connection, $_POST['batch']);
  $year = mysqli_real_escape_string($connection, $_POST['year']);
  $department = mysqli_real_escape_string($connection, $_POST['dept']);

  $query = "insert into studentinfo(name,regno,dept,year,batch) values('$name',$regno,'$department',$year,$batch)";
  $result = mysqli_query($connection, $query);
  if ($result) {
    echo json_encode(array("success" => true, "message" => "succesfully create info"));

  } else {
    echo json_encode(array("success" => false, "message" => "cannot create info"));
  }
}



?>