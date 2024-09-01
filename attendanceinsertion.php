<?php
session_start();
include "db.php";
if ($_POST['hour']) {
    $hour = $_POST['hour'];
    $date = $_POST['date'];
    $regnos = $_POST['regnos'];
    $names = $_POST['names'];
    $coursename = $_POST['coursename'];
    function checkforattendance($hour, $date, $regno = 1)
    {
        global $connection;
        $query = "select * from attendance where date='$date' and regno='$regno' and hour$hour IS NOT NULL";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 0) {
        }
    }


    function insertorupdate($hour)
    {

        $attendances = $_POST['attendances'];
        $staffname = $_SESSION['name'];
        global $regnos;
        global $date;
        global $connection;

        global $names;
        global $coursename;
        $regno_name = array_combine($regnos, $names);

        $columnhourname = "hour" . $hour;
        $columnclassname = "classname" . $hour;
        $columnstaffname = "staffname" . $hour;

        foreach ($regnos as $regno) {
            $boo = 1;
            $query = "select * from attendance where date='$date' and regno='$regno' and ($columnhourname=FALSE or $columnhourname=TRUE) ";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) != 0) {
                return 0;

            }
            $query = "select * from attendance where date='$date' and regno='$regno'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) == 0) {
                //insert query
                $name = $regno_name[$regno];
                if (in_array($regno, $attendances)) {
                    //present
                    $query = "insert into attendance(name,regno,date,$columnhourname,$columnclassname,$columnstaffname) values('$name','$regno','$date',1,'$coursename','$staffname')";

                    if ($result = mysqli_query($connection, $query)) {
                        $boo *= 1;
                    } else {
                        $boo *= 0;
                    }
                } else {
                    //absent
                    $query = "insert into attendance(name,regno,date,$columnhourname,$columnclassname,$columnstaffname) values('$name','$regno','$date',0,'$coursename','$staffname')";

                    if ($result = mysqli_query($connection, $query)) {
                        $boo *= 1;
                    } else {
                        $boo *= 0;
                    }
                }
            } else {
                //update query
                $name = $regno_name[$regno];
                if (in_array($regno, $attendances)) {
                    //present
                    $query = "update attendance set $columnhourname=1,$columnclassname='$coursename',$columnstaffname='$staffname' where date='$date' and regno='$regno'";

                    if ($result = mysqli_query($connection, $query)) {
                        $boo *= 1;
                    } else {
                        $boo *= 0;
                    }
                } else {
                    //absent
                    $query = "update attendance set $columnhourname=0,$columnclassname='$coursename',$columnstaffname='$staffname' where date='$date' and regno='$regno'";
                    if ($result = mysqli_query($connection, $query)) {
                        $boo *= 1;
                    } else {
                        $boo *= 0;
                    }
                }

            }
        }

        return $boo;
    } //end func


    if (insertorupdate($hour) == 1) { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
            <title>Document</title>
            <style>
                body {
                    padding: 0;
                    margin: 0;
                    background-color: gray;
                    min-height: 100%;
                }

                .successcontainer {
                    width: 20vw;
                    height: 20vh;
                    background-color: white;
                    position: absolute;
                    top: 40vh;
                    left: 40vw;
                }

                .successcontainer span {
                    width: 100%;
                    height: 5vh;
                    background-color: green;
                    display: block;
                    text-align: center;
                    font-size: 30px;
                    color: white;
                    letter-spacing: .4rem;
                }

                p {
                    font-size: 20px;
                    color: green;
                    text-align: justify;
                }

                button {
                    color: white;
                    width: 100%;
                    height: 5vh;
                    background-color: green;
                    display: block;
                    position: absolute;
                    bottom: 0;
                    font-size: 25px;
                    letter-spacing: .3rem;
                    padding: 2px;
                    cursor: pointer;
                }
            </style>
        </head>

        <body>
            <div class="successcontainer">
                <span>success</span>
                <p>attendance created successfully</p>
                <form action="dashboard.html">
                    <button>go back</button>
                </form>
            </div>
        </body>

        </html>
        <?php
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
            <title>Document</title>
            <style>
                body {
                    padding: 0;
                    margin: 0;
                    background-color: gray;
                    min-height: 100%;
                }

                .successcontainer {
                    width: 20vw;
                    height: 20vh;
                    background-color: white;
                    position: absolute;
                    top: 40vh;
                    left: 40vw;
                }

                .successcontainer span {
                    width: 100%;
                    height: 5vh;
                    background-color: red;
                    display: block;
                    text-align: center;
                    font-size: 30px;
                    color: white;
                    letter-spacing: .4rem;
                }

                p {
                    font-size: 20px;
                    color: red;
                    text-align: justify;
                }

                button {
                    color: white;
                    width: 100%;
                    height: 5vh;
                    background-color: red;
                    display: block;
                    position: absolute;
                    bottom: 0;
                    font-size: 25px;
                    letter-spacing: .3rem;
                    padding: 2px;
                    cursor: pointer;
                }
            </style>
        </head>

        <body>
            <div class="successcontainer">
                <span>error</span>
                <p>cannot create attendance successfully</p>
                <form action="dashboard.html">
                    <button>go back</button>
                </form>
            </div>
        </body>

        </html>
        <?php
    }

}
?>