<?php
        session_start();
    function writePic(){
        //add code here
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mdt419";
        $tablename = "member";
        $conn = new mysqli($servername, $username, $password,$dbname);
        $target_dir = "../img/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
        ///update database 
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        	// Check file size
        if($_FILES["fileToUpload"]["size"] > 500000){
            echo "Soory, Your file is too large.";
            $uploadOk = 0;
        }
            // Check if $uploadOk is set to 0 by an error\
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
           $user = $_SESSION['username'];
            $queryDatabaseInsertData = "UPDATE $tablename SET img = '$target_file' WHERE username = '$user'";
            if($conn->query($queryDatabaseInsertData) === TRUE){
                $sql = "SELECT img FROM $tablename";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $_SESSION['img'] = $row["img"];
                        header('Location:../feed.php');
                        exit;
                    }
                }
        } else {
                    echo "Sorry, there was an error uploading your file.";
               }
        }
    }
}

    function uploadPic(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mdt419";
        $tablename = "member";
        $conn = new mysqli($servername, $username, $password,$dbname);
        writePic();
        $conn->close();
    }
    uploadPic();

?>