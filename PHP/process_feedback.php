<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';
    
    $name = $_POST["name"];
    $feedback = $_POST["feedback"];
    $rating = $_POST["rating"];
    
    $sql = "INSERT INTO feedbacks (name, rating, feedback) VALUES ('$name', '$rating', '$feedback')";
    if (mysqli_query($conn, $sql)) {
            header("Location: home-page.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($conn);
} 
else {
    header("Location: feedback_form.php");
    exit;
}
?>
