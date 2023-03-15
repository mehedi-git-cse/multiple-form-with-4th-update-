<?php
session_start();
$connection = mysqli_connect("localhost","root","","test");

if(isset($_POST['save_multiple_data']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $salary = $_POST['salary'];
    $session = "Admin";
    $set_uid=(mysqli_query($connection,"select MAX(uid) as uid from emp"));

    if (mysqli_num_rows($set_uid) > 0) {
        // Fetch the result
        $row = mysqli_fetch_assoc($set_uid);
        $uid = $row['uid'];
        $uid++;
    } else {
        $uid = 0;
    }
    foreach($name as $index => $names)
    {
        $s_nanme = $names;
        $s_email = $email[$index];
        $s_mobile = $mobile[$index];
        $s_gender = $gender[$index];
        $s_date = $date[$index];
        $s_salary = $salary[$index];
        $s_session = $session;

        $query="INSERT INTO `emp`( `name`, `email`, `mobile`, `gender`, `date`, `salary`, `updateby`, `createby`, `editby`, `deleteby`,`uid`) VALUES ('$s_nanme','$s_email','$s_mobile','$s_gender','$s_date','$s_salary','$s_session','$s_session','$s_session','$s_session','$uid')";
        $query_run = mysqli_query($connection , $query);
    }

    if($query_run)
    {
        header("Location: emp.php");
        exit(0);
    }
    else
    {      
        header("Location: emp.php");
        exit(0);
    }
}
?>