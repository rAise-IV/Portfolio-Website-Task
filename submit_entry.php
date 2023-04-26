<?php

    $host = "127.0.0.1";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ecs417";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check if there was an error connecting to the database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    /* It replaces characters such as quotes and backslashes with their escape sequences,
    so that they can be safely used in a query without altering its syntax or functionality. */ 
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $text = mysqli_real_escape_string($conn, $_POST['entry-text']);

    // Attempt insert query execution
    $sql = "INSERT INTO blogEntry (title, text) VALUES ('$title', '$text')";
    if($conn->query($sql) === TRUE){
        header('Location: blog.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>