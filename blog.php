<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Quicksand|Staatliches|Play">
        <link rel="stylesheet" type="text/css" href="css/blog.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
    </head>
    <body>
        <main class="main">
            <header class="header">
                <h1>Kristian Laurenz Sarong</h1>
                <nav>
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li><a href="about.html">About Me</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contacts.html">Contact</a></li>
                    </ul>
                </nav>
            </header>
            <article class="main-container">
                <aside class="aside">
                    <?php
                        session_start();

                        // check if user is already logged in
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            echo <<< EOL
                             <div class='status'>Online</div>
                             <form action='logout.php'>
                                <button class='logout' type='submit'>Logout</button>
                             </form>
                             
                             <form action='blogform.html'>
                                <button class='create' type='submit'>Create Entry</button>
                             </form>
                            EOL;
                        } else {
                            echo <<< EOL
                            <div class='status'>Offline</div>
                            <form action='loginform.php'>
                                <button class='login' type='submit'>Login</button>
                            </form>
                            EOL;
                        }
                    ?>
                </aside>
                <section class="blog-container">
                    <section class="blog-list">

                        <?php
                            $host = "127.0.0.1";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "ec22959";

                            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

                            // Check if there was an error connecting to the database
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // retrieve data from the blog-entry table
                            $sql = "SELECT * FROM blogentry";
                            $result = $conn->query($sql);

                            // store entries in an array
                            $blog_entries = array();
                            if ($result-> num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $blog_entries[] = $row;
                                }
                            }

                            // usort — Sort an array by values using a user-defined comparison function
                            // https://www.php.net/manual/en/function.usort.php
                            usort($blog_entries, 'compareBlogEntriesByDate');

                            function compareBlogEntriesByDate($a, $b) {
                                // converts string to a date
                                $dateA = strtotime($a['date']);
                                $dateB = strtotime($b['date']);
                            
                                // returns either -1, 0 or 1 to signify if the first parameter is less than, equal to, or greater than the second.
                                if ($dateA > $dateB) {
                                    return -1;
                                } else if ($dateA < $dateB) {
                                    return 1;
                                } else {
                                    return 0;
                                }
                            }

                            // display blog_entries
                            foreach ($blog_entries as $row) {
                                echo "<div class='blog-item'>";
                                echo "<h5 class='item-date'>" . $row['date'] . "</h5>";
                                echo "<h4 class='item-title'>" . nl2br($row['title']) . "</h4>";
                                echo "<p class='item-text'>" . nl2br($row['text']) . "</p>";
                                echo "<hr>";
                                echo "</div>";
                            }

                        ?>
                    </section>
                </section>
            </article>
            <footer class="footer">ignore this Kristian Sarong 2023 &#169;</footer>
        </main>
    </body>
</html>