<?php
session_start();
include "db.php";
if (isset($_POST['dept'])) {
    $dept = mysqli_real_escape_string($connection, $_POST['dept']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);
    $batch = mysqli_real_escape_string($connection, $_POST['batch']);
    $query = "select * from studentinfo where dept='$dept' and year='$year' and batch='$batch'";
    $result = mysqli_query($connection, $query);
    $responsedata = array();
    $indexcounter = 0;
    //one by one regno
    while ($row = mysqli_fetch_row($result)) {
        //finding tottal days
  $myquery = "select distinct date from attendance where regno='$row[1]' and(hour1 IS NOT NULL and hour2 IS NOT NULL and hour3 IS NOT NULL and hour4 IS NOT NULL and hour5 IS NOT NULL)";
  $myresult = mysqli_query($connection, $myquery);
  $totalday = mysqli_num_rows($myresult);
  $myquery = "select distinct date from attendance where regno='$row[1]' and(hour1 IS NOT NULL and hour2 IS NOT NULL and hour3 IS NOT NULL) and (hour4 IS NULL or hour5 IS NULL)";
  $myresult = mysqli_query($connection, $myquery);
  $totalday += (mysqli_num_rows($myresult)*0.5);
  $myquery = "select distinct date from attendance where regno='$row[1]' and(hour1 IS NULL or hour2 IS NULL or hour3 IS NULL) and (hour4 IS NOT NULL and hour5 IS NOT NULL)";
  $myresult = mysqli_query($connection, $myquery);
  $totalday += (mysqli_num_rows($myresult)*0.5);
        $totalpday = 0;
        //full day present
        $query3 = "select count(*) from attendance where regno='$row[1]' and hour1=TRUE and hour2=TRUE and hour3=TRUE and hour4=TRUE and hour5=TRUE";
        $result3 = mysqli_query($connection, $query3);
        $str_result3 = mysqli_fetch_assoc($result3);
        $totalpday += $str_result3['count(*)'];
        //mrg half present
        $query3 = "select count(*) from attendance where regno='$row[1]' and (hour1=TRUE and hour2=TRUE and hour3=TRUE) and (hour4=FALSE or hour5=FALSE or hour4 IS NULL or hour5 IS NULL)";
        $result3 = mysqli_query($connection, $query3);
        $str_result3 = mysqli_fetch_array($result3);
        $totalpday += ($str_result3['count(*)'] * 0.5);
        //afternoon half present
        $query3 = "select count(*) from attendance where regno='$row[1]' and (hour4=TRUE and hour5=TRUE) and (hour3=FALSE or hour2=FALSE or hour1=FALSE or hour3 IS NULL or hour2 IS NULL or hour1 IS NULL)";
        $result3 = mysqli_query($connection, $query3);
        $str_result3 = mysqli_fetch_array($result3);
        $totalpday += ($str_result3['count(*)'] / 2);
        $percentage=0;
        if($totalday!=0){
            $percentage = (int) round(($totalpday / $totalday * 100), 0);    
        }
        
        //arrayresponse
        $responsedata[$indexcounter] = array("name" => $row[0], "regno" => $row[1], "totaldays" => $totalday, "presenteddays" => $totalpday, "percentage" => $percentage);
        $indexcounter += 1;

    }
    echo json_encode(array("success" => true, "responsedata" => $responsedata));
}
?>