<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$RoomNum = $_POST['RoomNum'];
$Ext = $_POST['Ext'];
$profilephoto = $_POST['profilephoto'];
// check if the user has entered all the required information
if (empty($name) || empty($email) || empty($password) || empty($confirmpassword) || empty($RoomNum) || empty($Ext) || empty($profilephoto)) {
    echo "Please enter all the required information (name, email, password, confirm password, Room Number, Ext, profile photo)";
    exit();
}
// check if the password and confirm password match
if ($password != $confirmpassword) {
    echo "Password and confirm password do not match";
    exit();
}
// check if the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email";
    exit();
}
//connect to the database
$servername = "localhost";
$username = "admin";
$Password = "admin123";
$dbname = "myDB";
// Create connection
$conn = mysqli_connect($servername, $username, $Password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// check if the email already exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "Email already exists";
    exit();
}
// insert the user into the database
$sql = "INSERT INTO users (name, email, password, RoomNum, Ext, profilephoto)
VALUES ('$name', '$email', '$password', '$RoomNum', '$Ext', '$profilephoto')";
if (mysqli_query($conn, $sql)) {
    echo "User created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
echo "<table border='1'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Room Number</th>
<th>Ext</th>
<th>Profile Photo</th>
<th> Delete </th>
<th> Update </th>
</tr>";
echo "<tr>";
echo "<td>" . $name . "</td>";
echo "<td>" . $email . "</td>";
echo "<td>" . $password . "</td>";
echo "<td>" . $RoomNum . "</td>";
echo "<td>" . $Ext . "</td>";
echo "<td>" . $profilephoto . "</td>";
echo "<td> <a href='delete.php?email=$email'> Delete </a> </td>";
echo "<td> <a href='update.php?email=$email'> Update </a> </td>";
echo "</tr>";
echo "</table>";
?>

