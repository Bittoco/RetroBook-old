
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | My friends</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
</head>
<body>
	<center>
<div class="header">
		<a href="index.php" style="text-decoration: none"><h1 class="name">[ theretrobook ]</h1></a>
	<?php 
	require_once 'header.php';
	if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<?php 
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	echo "<p class='welcometext'>".$row['name']."'s friends</p>";
	}
	} else {
		header("location: home.php");
	}
} else {
	header("location: home.php");
}
	?>
	
	<?php 
	$sql2 = "SELECT * FROM friends WHERE fid1 = '$id'";
			$result2 = $conn->query($sql2);
			$resultCheck2 = mysqli_num_rows($result2);
	echo '<div class="display"><p class="dis">Displaying 1 - '.$resultCheck2.' users</p></div>';
	?>
	<div class="mb">
	<div class="border">
		<h2 class="welcomename"></h2>
		<?php 
		$id = $_GET['id'];
			$sql2 = "SELECT * FROM friends WHERE fid1 = '$id'";
			$result2 = $conn->query($sql2);
			$resultCheck2 = mysqli_num_rows($result2);
			if($resultCheck > 0) {
				while($row2 = mysqli_fetch_assoc($result2)) {
					$friend = $row2['fid2'];
					$sql = "SELECT * FROM users WHERE id = '$friend'";
					$result = $conn->query($sql);
					while($row = mysqli_fetch_assoc($result)) {
						if ($row['sex'] === "Female") {
				$gend = "Her!";
			} if ($row['sex'] === "Male") {
				$gend = "Him!";
			} elseif ($row['sex'] != "Male" && $row['sex'] != "Female") {
				$gend = "Them!";
			}
						$id = $_SESSION['id'];
						$id1 = $row['id'];
						$sql3 = "SELECT * FROM friends WHERE fid1 = '$id' AND fid2 = '$id1'";
					$result3 = $conn->query($sql3);
					$resultCheck3 = mysqli_num_rows($result3);
					if($resultCheck3 > 0) {
					while($row3 = mysqli_fetch_assoc($result3)) {
						$friend = 'Remove from Friends';
						$flink = 'removef.inc.php?roo='.$id1.'&id='.$_GET['id'].'';
					} 
					} elseif ($row['email'] === $_SESSION['email']) {
						$friend = "This is you";
						$flink = "profile.php?id=".$row['id']."";
					}	
						else {
						$friend = 'Add to Friends';
						$flink = 'friend.inc.php?foo='.$id1.'+id='.$_GET['id'].'';
					}

					
					echo '
				<div class="myaccountborder">
				<table class="info">
				<td class="viewprofile"><a style="color:#538ADC; text-decoration: none;" href="profile.php?id='.$row['id'].'">View Profile</a><tr>
				<td class="viewfriends"><a style="color:#538ADC;text-decoration: none; " href="friends.php?id='.$id1.'">View Friends</a><tr>
				<td class="viewgroups"><a style="color:#538ADC; text-decoration: none;" href="'.$flink.'">'.$friend.'</a><tr>
				<td class="searchfor"><a style="color:#538ADC;text-decoration: none;" href="poke.inc.php?pok='.$id1.'&id='.$_GET['id'].'">Poke '.$gend.'</a><tr>
				<td class="viewnetwork"><a style="color:#538ADC;text-decoration: none;" href="send.php?id='.$row['id'].'">Send Message</a><tr>
			</table>';
			
			if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="https://www.theretrobook.net/img/'.$row['pfp'].'" class="pfp"/>';
         		}
         		echo $pfp;
         		echo '</div>';   
         		echo '<p class="inform">Name: <a class="a" style="color:#538ADC;" href="profile.php?id='.$row['id'].'">'.$row['name'].'</a><br>
         		Status: '.$row['status'].'<br>
         		Relationship status: '.$row['rstatus'].'
         		</p>';    
				}}
			}
		?>
   	<br>
	</div>
</div></div>
<?php 
	require 'loginarea.php';
?>
</div>
	</center>
</body>
<style type="text/css">
	.header {
		position: relative;
		border: 1px solid #3C589C;
		width: 700px;
		background-color: #3C589C;
		background-image: url("logo-left.jpg");
		background-repeat-x: no-repeat;
		height: 78px;
		background-repeat: no-repeat;
		
		z-index: 5;
	}
	.name {
		position: relative;
		left: 100px;
		left: 120px;
		color: #538BDE;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 35px;
		top: -px;
		margin-top: 10px;
	}
	
	.welcomename {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}

	.mytext {
		text-align: left;
		margin-left: 3px;
		color: white;
		font-size: 14px;
        padding-top: 3px;
	}
	
  
	.info {
		border: 1px solid #3D65C2;
		font-size: 11px;
		margin-top: 12px;
		text-decoration: none;
		height: 90px;
		margin-left: 300px;
		margin-bottom: -10px;
		position: relative;
		top: 3px;
		width:110px;
	}
	.viewprofile {
		border-bottom: 1px solid #3D65C2;
		text-decoration: none;
	}
	.viewprofile:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewfriends {
		border-bottom: 1px solid #3D65C2;
	}
	.viewfriends:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewgroups {
		border-bottom: 1px solid #3D65C2;
	}
	.viewgroups:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.searchfor {
		border-bottom: 1px solid #3D65C2;
	}
	.searchfor:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewnetwork {
		
	}
	.viewnetwork:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
    .connected {
    width: 190px;
    font-size: 13px;
    margin-left: 250px;
    margin-top: 5px;
    position: relative;
    top: -100px;
    }
   
   
   
	.welcome {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #3C589C;
		background-color: #3C589C;
		width: 548px;
		height: 30px;
		margin-top: 3px;
		left: 73px;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 3px;
		text-align: left;
		margin-left: 5px;
		font-size: 12px;
	}
	.myaccountborder {
		border-bottom: 1px solid #3D65C2;
		min-height: 90px;
		width: 448px;
	}
	.pfp {
		border: 1px solid #3D65C2;
		min-width: 80px;
		max-width: 110px;
		min-height: 70px;
		max-height: 170px;
		position: relative;
		margin-top: -45px;
		top: -35px;
		margin-left: -300px;
		margin-bottom: -25px;
		vertical-align: top;
	}
	.border {
		position: relative;
		border: 1px solid #3C589C;
		min-height: 250px;
		background-color: white;
		top: -9px;
		width: 548px;
		left: 73px;
		margin-top: -7px;
		border-bottom: 2px solid #3C589C;
	}
	.youhave {
		font-size: 13px;
		position: relative;
		left: -40px;
		top: -5px;
		text-align: left;
		width: 190px;
		
	}
	.pokelink {
		text-decoration: none;
		z-index: 5;
	}
	.pokelink:hover {
		text-decoration: underline;
	}
	.display {
		background-color: #F1F1F1;
		height: 28px;
		width: 548px;
		position: relative;
		left: -1px;
		color: #3D65C2;
		margin-top: -9px;
		text-align: left;
		border: 1px solid #F1F1F1;
	}
	.dis {
		font-size: 11.5px;
		position: relative;
		top: -10px;
		left: 5px;
	}
	.inform {
		position: relative;
		margin-top: -50px;
		top: -50px;
		font-size: 11px;
		left: 5px;
		text-align: left;
		
		width: 180px;
	}
	.a {
		text-decoration: none;
	}
	.a:hover {
		text-decoration: underline;
	}
	.mb {
		width: 700px;
		left: -150px;
		position: relative;
		border: 1px dashed #3B5998;
		position: relative;
		top: -32px;
		padding-top: 40px;
		clear: both;
		border-top: 0px solid;
	}
	@media only screen and (max-width:700px) {
		.name {
			left: -30px;
			font-size: 25px;
			margin-top: 30px;
		}
		.header {
			width: 600px;
		}
		.welcome {
			left: 0px;
			width: 400px;
			z-index: 2;
		}
		.welcometext {
			margin-left: px;
		}
		.myaccountborder {
			width: 358px;
		}
		.newmessage {
			width: 358px;
		}
		.mymessageborder {
			width: 358px;
		}
		.border {
			
			width: 400px;
			top: -12px;
		}
        .pfp {
        margin-left: -220px;

        }
        .info {
        margin-left: 10px;
        font-size: 10px;
        left: 120px;
        margin-top: 20px;
        }
        .inform {
        	font-size: 10px;
        	width: 100px;
        }
		.myaccount {
			width: 360px;
		}
		.connected {
        width: 100px;
        font-size: 10px;
        margin-left: 240px;
        }
		
		.numofmes {
			margin-left: 20px;
		}
		.messagephoto {
			margin-left: -150px;
		}
		.poke {
			width: 358px;
		}
		.youhave {
			position: relative;
			left: -20px;
		}
		.back {
			position: relative;
			left: 30px;
		}
		.hide {
			position: relative;
			left: -50px;
			top: 25px;
		}
		@media only screen and (max-width:450px) {
			.info {
				margin-top: -10px;
			}
			.pfp {
				
			}
			.back {
				left: 40px;
			}
			.inform {
				margin-top: -70px;
				top: -30px;
			}
		}

	}
</style>
</html>