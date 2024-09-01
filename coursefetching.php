<?php
include "db.php";
$dept = $_POST['dept'];
$year = $_POST['year'];
$response = array("success" => true);
$myquery = "select course from courses where dept='$dept' and year='$year'";
$myresult = mysqli_query($connection, $myquery);
$arraylen = 0;
while ($row = mysqli_fetch_row($myresult)) {
    array_push($response, $row[0]);
    $arraylen += 1;
}
$response["length"] = $arraylen;
echo json_encode($response);
?>