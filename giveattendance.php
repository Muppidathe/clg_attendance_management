<?php

session_start();
include "db.php";
$dept = mysqli_real_escape_string($connection, $_POST['dept']);
$year = mysqli_real_escape_string($connection, $_POST['year']);
$batch = mysqli_real_escape_string($connection, $_POST['batch']);
$hour = mysqli_real_escape_string($connection, $_POST['hour']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give Attendance</title>
    <link rel="stylesheet" href="giveattendance.css">
    <script src="giveattendance.js" defer></script>

</head>

<body>
    <div class="header">
        <span class="classname">
            <?php echo "classname: " . $_POST['year'] . ' ' . $_POST['dept'] . ' ' . $_POST['batch'] . ' batch'; ?>
        </span>
        <span class="giveatt">Give Attendance</span>
        <span class="coursename">
            <?php echo 'coursename: ' . $_POST['cname']; ?>
        </span>
        <span class="date">
            <?php echo 'date: ' . $_POST['date']; ?>
        </span>
    </div>
    <div class="bodycontainer">
        <form action="attendanceinsertion.php" method="post">
            <input type='hidden' name='date' value="<?php echo $_POST['date']; ?>">
            <input type="hidden" name="hour" value="<?php echo $_POST['hour']; ?>">
            <input type="hidden" name="coursename" value="<?php echo $_POST['cname']; ?>">
            <table class="table-fill">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>regno</th>
                        <th>attendance</th>

                    </tr>
                </thead>
                <tbody class="table-hover">

                    <?php
                    $query = "select name,regno from studentinfo where dept='$dept' and year=$year and batch=$batch";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_row($result)) {
                     echo '
                        <tr>
                            <td>
                                '.$row[0].'
                                <input type="hidden" name="names[]" value='.$row[0].'>
                            </td>
                            <td>
                                '.$row[1].'
                                <input type="hidden" name="regnos[]" value='.$row[1].'>
                            </td>
                            <td><input type="checkbox" id="chkbox" class="chkbox" name="attendances[]"
                                    value='.$row[1].'><label for="chkbox1" class="labelchkbox"></label></td>
                        </tr>';

                    }
echo'
                </tbody>

            </table>
            <input type="checkbox" id="chkbox" class="chkbox" name="attendances[]"
                                    value="none" checked>
            <input type="submit" name="giveattendance" value="giveattendance">
        </form>
    </div>
    <div class="confirmation">
        <h3>confirm</h3>
        <label for="absent" id="absentlist">absentlist:</label>
        <ul id="absent">
        </ul>
        <div class="popupbutton"><button name="cancel" value="cancel">cancel</button>
            <button name="confirm" value="confirm">confirm</button>
        </div>
    </div>

</body>

</html>';

                    ?>
