<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
                
                 if ($_SESSION['type'] == "volunteer") {
                     # code...
                    header('Location: ../volunteer.php');
                 }
                 else if ($_SESSION['type'] == "ngo") {
                     # code...
                    header('Location: ../ngo.php');
                 }
                 else if ($_SESSION['type'] == "student") {
                     # code...
                    header('Location: ../student.php');
                 }
        
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

?>