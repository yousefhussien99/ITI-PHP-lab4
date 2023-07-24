<?php
$conn = mysqli_connect($servername, $username, $Password, $dbname);
$sql = "UPDATE users SET name='$name', email='$email', password='$password', RoomNum='$RoomNum', Ext='$Ext', profilephoto='$profilephoto' WHERE email='$email'";
if (mysqli_query($conn, $sql)) {
    echo "User updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>