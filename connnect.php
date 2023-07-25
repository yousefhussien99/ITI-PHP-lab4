<?php
$name = $_POST['name'];
$email = $_POST['email'];   
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$RoomNum = $_POST['RoomNum'];
$Ext = $_POST['Ext'];
/*
check if pass and confirm pass are the same
*/
if($password != $confirmpassword){
    echo "Password and Confirm Password do not match";
    exit();
}
/*
check if email is valid
*/
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid email format";
    exit();
}

/*
check if email already exists
*/
$servername = "localhost";
$username = "root";
$Passwordd = "Admin";
$dbname = "test";
$conn = new mysqli($servername, $username, $Passwordd, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$sql = "insert into users (name, email, pass, roomnum, ext) values ('$name', '$email', '$password', '$RoomNum', '$Ext')";
if($conn->query($sql) === TRUE){
    echo "New record created successfully";
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
            




