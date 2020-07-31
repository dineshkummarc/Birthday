<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$date = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$date = $_POST['date'];

		mysqli_query($db, "INSERT INTO info (name, date) VALUES ('$name', '$date')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}
        
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $date = $_POST['date'];

            mysqli_query($db, "UPDATE info SET name='$name', date='$date' WHERE id=$id");
            $_SESSION['message'] = "Address updated!"; 
            header('location: index.php');
        }
        
        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            mysqli_query($db, "DELETE FROM info WHERE id=$id");
            $_SESSION['message'] = "Address deleted!"; 
            header('location: index.php');
        }
        $results = mysqli_query($db, "SELECT * FROM info");
?>