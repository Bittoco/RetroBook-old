<?php 
include 'dbh.inc.php';
if (isset($_POST['submit'])) {
$sex = htmlspecialchars($_POST['sex'], ENT_QUOTES, 'UTF-8');
$sex = mysqli_real_escape_string($conn,  $sex);
$bday = htmlspecialchars($_POST['bday'], ENT_QUOTES, 'UTF-8');
$residence = htmlspecialchars($_POST['residence'], ENT_QUOTES, 'UTF-8');
$residence = mysqli_real_escape_string($conn,  $residence);
$hschool =  htmlspecialchars($_POST['hschool'], ENT_QUOTES, 'UTF-8');
$hschool = mysqli_real_escape_string($conn,  $hschool);
$screenname = mysqli_real_escape_string($conn,  $_POST['screenname']);
$screenname = htmlspecialchars($screenname, ENT_QUOTES, 'UTF-8');
$blog = mysqli_real_escape_string($conn,  $_POST['blog']);
$blog = htmlspecialchars($blog, ENT_QUOTES, 'UTF-8');
$looking = mysqli_real_escape_string($conn,  $_POST['looking']);
$looking  = htmlspecialchars($looking, ENT_QUOTES, 'UTF-8');
$interested = mysqli_real_escape_string($conn,  $_POST['interested']);
$interested = htmlspecialchars($interested, ENT_QUOTES, 'UTF-8');
$rstatus = mysqli_real_escape_string($conn,  $_POST['rstatus']);
$rstatus = htmlspecialchars($rstatus, ENT_QUOTES, 'UTF-8');
$pviews = mysqli_real_escape_string($conn,  $_POST['pviews']);
$pviews = htmlspecialchars($pviews, ENT_QUOTES, 'UTF-8');
$interests = mysqli_real_escape_string($conn,  $_POST['interests']);
$interests = htmlspecialchars($interests, ENT_QUOTES, 'UTF-8');
$music = mysqli_real_escape_string($conn,  $_POST['music']);
$music = htmlspecialchars($music, ENT_QUOTES, 'UTF-8');
$aboutme = mysqli_real_escape_string($conn,  $_POST['aboutme']);
$aboutme = htmlspecialchars($aboutme, ENT_QUOTES, 'UTF-8');
$email = mysqli_real_escape_string($conn,  $_POST['email']);
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$id = mysqli_real_escape_string($conn,  $_POST['id']);
$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
$date3 = date("Y-m-d");
$date3 =  htmlspecialchars($date3, ENT_QUOTES, 'UTF-8');
$sql = "UPDATE users SET sex = '$sex' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET bday = '$bday' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET residence = '$residence' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET hschool = '$hschool' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET screenname = '$screenname' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET websites = '$blog' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET lookingfor = '$looking' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET interested = '$interested' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET rstatus = '$rstatus' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET pviews = '$pviews' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET interests = '$interests' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET music = '$music' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET aboutme = '$aboutme' WHERE email = '$email'";
$result = $conn->query($sql);
$sql = "UPDATE users SET lastupdated = '$date3' WHERE email = '$email'";
$result = $conn->query($sql);
header("location: profile.php?id=".$id."");
exit();
}