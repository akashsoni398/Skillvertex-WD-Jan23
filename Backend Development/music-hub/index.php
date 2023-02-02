<?php

include("dbconfig.php");

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/font-awesome.css" />
    <link rel="stylesheet" href="./assets/css/header.css" />
</head>
<body>
    <link href="./header.html" rel="import" />
    <header id="header">
        <a href="./legal/privacy.html">Privacy Policy</a>
        <a href="./legal/tnc.html">Terms and Conditions</a>
        <div id="dropdown">
            <?php if (!isset($_SESSION['username'])) { ?>
                <button id="dropdown-btn">Login</button>
                <div id="dropdown-content">
                    <a href="./authentication/login.php">Login into existing account</a>
                    <a href="./authentication/register.php">Create a new account</a>
                </div>
            <?php } else { ?>
                <button id="dropdown-btn"><?php echo $_SESSION['username'] ?></button>
                <div id="dropdown-content">
                    <a href="./authentication/changepwd.php">Change password</a>
                    <a href="?logout=true">Logout</a>
                </div>
            <?php } ?>
        </div>
    </header>
    <section id="branding">
        <div class="left-align containers">
            <img src="./assets/img/logo.gif"/>
            <h1>MUSIC HUB</h1>
            <p>-------------------------------------------------------<br />One stop shop for all your musical needs</p>
        </div>
        <div class="right-align containers">
            <form id="search-form" action="search.html" method="get">
                <input type="search" />
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </section>
    <nav id="menubar">
        <ul>
            <li><a href="./index.html">Home</a></li>
            <li><a href="./hits.html">Top Hits</a></li>
            <li><a href="./recent.html">Recently Added</a></li>
            <li><a href="./favs.html">Favourites</a></li>
            <li><a href="./playlists.html">Playlists</a></li>
            <li><a href="./about.html">About us</a></li>
        </ul>
    </nav>
    <section id="web-content" class="m-5">
        <h1 class="my-5">Songs</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 m-5">

            <?php 
            $sql_query = "SELECT * FROM music ORDER BY name;";
            $result = mysqli_query($conn, $sql_query);
            while($data = mysqli_fetch_array($result)) {
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="./assets/musicimg/<?php echo $data['image'] ?>" class="card-img-top" alt="...">
                        <audio controls>
                            <source src="./assets/music/<?php echo $data['link'] ?>" />
                        </audio>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['name']?></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Views: <?php echo $data['views'] ?></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <footer style="position: relative;" id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>