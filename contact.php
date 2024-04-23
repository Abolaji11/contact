<?php

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','db_contact');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// get the post records
if(isset($_POST['submit'])){
$txtFName = $_POST['txtFirstName'];
$txtLName = $_POST['txtLastName'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$Address = $_POST['Address'];
$Address2 = $_POST['Address2'];
$City = $_POST['City'];
$State = $_POST['State'];
$Zip = $_POST['Zip'];

// Hash the password
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

// database insert SQL code
$sql = "INSERT INTO `tbl_contact` (`Id`, `First Name`,`Last Name`, `Email`, `Password`, `Address`, `Address 2`, `City`, `State`, `Zip`) VALUES ('0', ?, ?, ?, ?, ?, ?, ?, ?, ?)";

 // Prepare and bind the statement
 $stmt = mysqli_prepare($con, $sql);
 mysqli_stmt_bind_param($stmt, "sssssssss", $txtFName, $txtLName, $Email, $hashedPassword, $Address, $Address2, $City, $State, $Zip);

 // Execute the statement
 if(mysqli_stmt_execute($stmt)) {
	echo "Contact Records Inserted";
} else {
	echo "Error: " . mysqli_error($con);
}
// Close the statement
mysqli_stmt_close($stmt);

}

// Close the connection
mysqli_close($con);
?>




   
    
 

    







































