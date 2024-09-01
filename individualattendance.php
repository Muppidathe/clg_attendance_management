<?php
include "db.php";
session_start();
if (isset($_POST['regno'])) {
  $regno = $_POST['regno'];


  //name fecth from regno to name
  $myquery = "select name from studentinfo where regno='$regno'";
  $myresult = mysqli_query($connection, $myquery);
  $myresultarray = mysqli_fetch_assoc($myresult);
  $name = $myresultarray['name'];
  //finding tottal days
  $myquery = "select distinct date from attendance where regno='$regno' and(hour1 IS NOT NULL and hour2 IS NOT NULL and hour3 IS NOT NULL and hour4 IS NOT NULL and hour5 IS NOT NULL)";
  $myresult = mysqli_query($connection, $myquery);
  $totalday = mysqli_num_rows($myresult);
  $myquery = "select distinct date from attendance where regno='$regno' and(hour1 IS NOT NULL and hour2 IS NOT NULL and hour3 IS NOT NULL) and (hour4 IS NULL or hour5 IS NULL)";
  $myresult = mysqli_query($connection, $myquery);
  $totalday += (mysqli_num_rows($myresult)*0.5);
  $myquery = "select distinct date from attendance where regno='$regno' and(hour1 IS NULL or hour2 IS NULL or hour3 IS NULL) and (hour4 IS NOT NULL and hour5 IS NOT NULL)";
  $myresult = mysqli_query($connection, $myquery);
  $totalday += (mysqli_num_rows($myresult)*0.5);


  //select all unique date of user ->totalday
  $myquery = "select distinct date from attendance where regno='$regno' order by date desc";
  $myresult = mysqli_query($connection, $myquery);

  //total presented days
  $totalpday = 0;
  //full day present
  $query3 = "select count(*) from attendance where regno='$regno' and hour1=TRUE and hour2=TRUE and hour3=TRUE and hour4=TRUE and hour5=TRUE";
  $result3 = mysqli_query($connection, $query3);
  $str_result3 = mysqli_fetch_assoc($result3);
  $totalpday += $str_result3['count(*)'];
  //mrg half present
  $query3 = "select count(*) from attendance where regno='$regno' and (hour1=TRUE and hour2=TRUE and hour3=TRUE) and (hour4=FALSE or hour5=FALSE or hour4 IS NULL or hour5 IS NULL)";
  $result3 = mysqli_query($connection, $query3);
  $str_result3 = mysqli_fetch_array($result3);
  $totalpday += ($str_result3['count(*)'] * 0.5);
  //afternoon half present
  $query3 = "select count(*) from attendance where regno='$regno' and (hour4=TRUE and hour5=TRUE) and (hour3=FALSE or hour2=FALSE or hour1=FALSE or hour3 IS NULL or hour2 IS NULL or hour1 IS NULL)";
  $result3 = mysqli_query($connection, $query3);
  $str_result3 = mysqli_fetch_array($result3);
  $totalpday += ($str_result3['count(*)'] / 2);
  $percentage=0;
  if($totalday!=0){
    $percentage = (int) round(($totalpday / $totalday * 100), 0);    
}
  

  //table data

  $myquery = "select distinct date from attendance where regno='$regno' order by date desc";
  $myresult = mysqli_query($connection, $myquery);
  //one by one date
  $responseattendance = array();
  $indexcounter = 0;
  while ($date_array = mysqli_fetch_assoc($myresult)) {
    $date = $date_array['date'];
    $newDate = date("d-m-Y", strtotime($date));
    $query = "select * from attendance where regno='$regno' and date='$date'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {

      $responseattendance[$indexcounter] = mysqli_fetch_assoc($result);
      $indexcounter += 1;
    }
  }

  if ($_POST['submit'] == 'pagedata') {
    echo json_encode(array("success" => true, "name" => $name, "totalday" => $totalday, "presentedday" => $totalpday, "percentage" => $percentage, "tabledata" => $responseattendance, "tabledatalength" => $indexcounter));
  }


}