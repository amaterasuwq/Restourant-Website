<?php
session_start();
require_once "db_connection.php";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home-page.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))) {
        $username_err = "Enter your username";
    } 

    else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Enter your password";
    } 

    else {
        $password = trim($_POST["password"]);
    }
    
    if (empty($username_err) && empty($password_err))
    {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql))
        {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            
            if($stmt->execute()) {
                $stmt->store_result();
                
                if($stmt->num_rows == 1) {                    
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
							if (isset($_SESSION["filename"])){
								$filename = $_SESSION["filename"]; 
							}	
                            else {
								$filename = "home-page.php";
							}								
						    header("location: ".$filename);
                        } 
                        else {
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } 
                else {
                    $username_err = "No account found with that username.";
                }
            } 
            else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        $stmt->close();
    }
    $conn->close();
}
?>