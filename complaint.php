<?php 

session_start();
include('db.php');

	//This is the directory where images will be saved
    $target = "images/";
	
	 $target = $target . $_POST[ $_SESSION['email']].'.jpg';

	
    //Writes the Filename to the server
    move_uploaded_file($_FILES['ur_image']['tmp_name'], $target);

 	$query="INSERT INTO user values('$_POST[ur_location]','$_POST[ur_pincode]','$target','$_POST[ur_comment]','$_POST[ur_email]')";
	echo $query;
	if(mysqli_query($con,$query))
	{
			$message = "complaint registered succesfully!";
			echo "<script>alert('$message');</script>";
			//header('Refresh:0;url=addstudent.php');
	}
	else
	{
			echo "Error in inserting data:".mysqli_error($con);
	}

?>
