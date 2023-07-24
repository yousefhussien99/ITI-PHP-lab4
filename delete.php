<?php
$conn = mysqli_connect($servername, $username, $Password, $dbname);
$sql = "DELETE FROM users WHERE email = '$email'";
if (mysqli_query($conn, $sql)) {
    echo "User deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>


