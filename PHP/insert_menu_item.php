<?php
include 'db_connection.php'; 

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$section = $_POST['section'];
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$upload_path = "../images/menu-dishes/";
move_uploaded_file($image_tmp, $upload_path.$image);

$query = "INSERT INTO menu_items (name, description, price, image, section) 
VALUES ('$name', '$description', '$price', '$upload_path$image', '$section')";

if (mysqli_query($conn, $query)) {
    header("location: menu.php");
} 
else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
