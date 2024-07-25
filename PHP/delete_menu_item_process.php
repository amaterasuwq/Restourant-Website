<?php
include 'db_connection.php';

$dish_name = $_POST['dish_name'];
$query = "DELETE FROM menu_items WHERE name = '$dish_name'";

if (mysqli_query($conn, $query)) {
    header("location: menu.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>