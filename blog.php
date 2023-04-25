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
                    <header class="blog-header bold">Blog</header>
                    <section class="blog-list">
                        
                    </section>
                </section>
            </article>
            <footer class="footer">ignore this Kristian Sarong 2023 &#169;</footer>
        </main>
    </body>
</html>