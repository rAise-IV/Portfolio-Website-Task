<?php
    session_start();

    $host = "127.0.0.1";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ec22959";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check if there was an error connecting to the database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = filter_var(trim($_POST["email"], FILTER_SANITIZE_EMAIL));
    $password = trim($_POST["password"]);
    

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0) {
        $_SESSION["loggedin"] = true;
        header("location: blog.php");
        exit;
    } else {
        header("location: loginform.php?error=Invalid email or password.");
        exit;
    }
?>