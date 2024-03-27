<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sudesh Gaming Arena</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
  /* Table styles */
table {
  width: 100%;
  margin: 0 auto;
  border-collapse: collapse;
}

table th {
  background-color: #1F2739;
  color: #185875;
  font-weight: bold;
  padding: 10px;
}

table td {
  background-color: #2C3446;
  color: #FB667A;
  padding: 10px;
}

/* Alternate row styles */
table tr:nth-child(even) {
  background-color: #323C50;
}

table tr:hover {
  background-color: #464A52;
}

/* Hover effect */
table tr:hover td {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  transition-delay: 0s;
  transition-duration: 0.4s;
  transition-property: all;
  transition-timing-function: line;
}
#main{
    margin-top: 60px;
}
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1><a href="index.html"><span>Sudesh Gaming Arena</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
                    <li><a class="nav-link scrollto" href="live games.php">All Free games</a></li>
                    <li><a class="nav-link scrollto" href="pcgames.php">PC Free Games</a></li>
                    <li><a class="nav-link scrollto" href="browsergames.php">Browser Free Games</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Category</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="anime.php">Anime</a></li>
                            <li><a href="horror.php">Horror</a></li>
                            <li><a href="tank.php">Tank</a></li>
                            <li><a href="survival.php">Survival</a></li>
                            <li><a href="sports.php">Sports</a></li>
                            <li><a href="racing.php">Racing</a></li>
                            <li><a href="shooter.php">Shooter</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <main id="main">
    <?php
// Function to send GET request using cURL
function sendGETRequest($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200) {
        return $response;
    } else {
        return false;
    }
}

// Endpoint URL for games by platform
$url = 'https://www.freetogame.com/api/games?category=racing';

// Sending GET request to fetch games by platform
$response = sendGETRequest($url);

// Check if the request was successful
if ($response) {
    // Parse the JSON response
    $games = json_decode($response, true);
    
    // Check if there are any games
    if (!empty($games)) {
        // Output HTML table
        echo '<table border="1">';
        echo '<tr><th>Title</th><th>Thumbnail</th><th>Description</th><th>Genre</th><th>Platform</th><th>Publisher</th><th>Developer</th><th>Release Date</th><th>Game URL</th><th>FreeToGame Profile URL</th></tr>';
        
        // Loop through each game and add a row to the table
        foreach ($games as $game) {
            echo '<tr>';
            echo '<td>' . $game['title'] . '</td>';
            echo '<td><img src="' . $game['thumbnail'] . '" alt="' . $game['title'] . '"></td>';
            echo '<td>' . $game['short_description'] . '</td>';
            echo '<td>' . $game['genre'] . '</td>';
            echo '<td>' . $game['platform'] . '</td>';
            echo '<td>' . $game['publisher'] . '</td>';
            echo '<td>' . $game['developer'] . '</td>';
            echo '<td>' . $game['release_date'] . '</td>';
            echo '<td><a href="' . $game['game_url'] . '">Go to game</a></td>';
            echo '<td><a href="' . $game['freetogame_profile_url'] . '">Game profile</a></td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        // No games found
        echo 'No games found.';
    }
} else {
    // Failed to fetch live games list
    echo "Failed to fetch live games list.";
}
?>

    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>

