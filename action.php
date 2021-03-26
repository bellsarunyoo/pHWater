<!-- <?php

	include_once('connection.php');

	$userData = count($_POST["name"]);
    // echo $userData;
	// // echo $_POST["name"];
	// if ($userData > 0) {
	//     for ($i=0; $i < $userData; $i++) { 
	// 	if (trim($_POST['name'] != '') && trim($_POST['email'] != '')) {
	// 		$name   = $_POST["name"][$i];
	// 		$email  = $_POST["email"][$i];
    //         echo $name;
    //         echo $email;

	// 		// $query  = "INSERT INTO users (name,email) VALUES ('$name','$email')";
	// 		// $result = mysqli_query($con, $query);
	// 	 }
	//     }
	//     // echo "Data inserted successfully";
	// }else{
	//     echo "Please Enter user name";
	// }

?> -->

<?php

	include 'connection.php';

	$userData = count($_POST["name"]);
	
	if ($userData > 0) {
	    for ($i=0; $i < $userData; $i++) { 
		if (trim($_POST['name'] != '') && trim($_POST['email'] != '')) {
			$name   = $_POST["name"][$i];
			$email  = $_POST["email"][$i];
			$query  = "INSERT INTO users (name,email) VALUES ('$name','$email')";
			$result = mysqli_query($conn, $query);
		}
	    }
	    echo "Data inserted successfully";
	}else{
	    echo "Please Enter user name";
	}

?>