<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
	}else{
		header('Location:login.html');
		exit;
	}

	if(isset($_SESSION['img'])){
		$imgfile =  $_SESSION['img'];
		$imgfile = trim($imgfile,"../");
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link type="text/css" rel="stylesheet" href="css/stylefeed.css">
		<script type="text/javascript" src="js/feed.js"></script>
	</head>
	<body>
		<div class="grid-container">

			<div class="item1">
				<div id="browsePic">
					<div id="displayPic">
						<img src= <?php echo $imgfile ?> alt="">
					</div>
					<form action="js/uploadPic.php" method="post" id="formId" enctype="multipart/form-data">
						<input type="file" id="fileField" name="fileToUpload" value="fileToUpload" placeholder="" class="hidden">
					</form>
				</div>
				Hello <span id="username"><?php echo $username ?></span>, Welcome back!
			</div>
			
  			<div class="item2"> <a href="js/logout.php"> Logout</a> </div>
  			<div class="item3">
  				<div id="posting">
  					<textarea name="msg" id="textmsg" value="" placeholder="" rows="4" cols="50"></textarea>
					<br>
  					<button id="postbutton">Post</button>
  				</div>
  				<hr>
  				<div id="feed-container">
  					
  				</div>
  				
  			</div>  
		</div>
	
	</body>
</html>

