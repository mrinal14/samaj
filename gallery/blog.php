<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
     <script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <script >
        function loadGoogleTranslate(){
            new google.translate.TranslateElement("google_element");
            
        }

    </script>
     <style type="text/css">/* Basic styles, customize as needed */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #A52A2A;
}

header {
    background-color: #A52A2A;
    color: #FFBF00;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

section {
    padding: 20px;
    margin: 20px 0;
}

form label {
    display: block;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="email"],
form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

form button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

form button:hover {
    background-color: #0056b3;
}
header {
    position: relative; /* Ensure the header is positioned relative for absolute positioning */
}

.header-top {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    display: flex;
    justify-content: space-between;
    padding: 10px; /* Adjust padding as needed */
}

.header-image-right,
.header-image-left {
    max-height: 100px; /* Adjust the height of the images */
}
.slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    overflow: hidden;
}

.slide {
    display: none;
}

.fade {
    animation-name: fade;
    animation-duration: 1.5s;
}

@keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
}

.header-top {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    display: flex;
    justify-content: space-between;
    padding: 10px; /* Adjust padding as needed */
}</style>
</head>
<body><div id="google_element"></div>
     
    <header>
        <div class="header-top">
            <!--<img src="pratap.jpg.crdownload" alt="Image Right" class="header-image-right">
            <img src="sitaram.jpg" alt="Image Left" class="header-image-left">-->
        </div>
        <h1>राजपूत समाज युवा चेतना मंडल, इंदौर</h1>
        <nav>
            <ul>
                 <li><a href="">Home</a></li>
                <li><a href="authorities/index.html">Authorities</a></li>
                <li><a href="gallery/blog.php">Gallery</a></li>
                 <li><a href="messages/messages.php">Messages</a></li>
                  <li><a href="sponsors/sponsors.php">Sponsors</a></li>
                <li><a href="contact/index.php">Contact</a></li>
               
                <li><a href="gallery/login.php">Admin</a></li>
            </ul>
        </nav>
    </header>

     <h2 style="color: #FFBF00;">Blog</h2>
    <ul>
        <?php
        $query = "SELECT * FROM blogs ORDER BY created_at DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "<h3>{$row['title']}</h3>";
            if (!empty($row['photo'])) {
                echo "<img src='uploads/{$row['photo']}' alt='{$row['title']}' style='max-width: 100%; height: auto;'>";
            }
            echo "<p>{$row['content']}</p>";
            echo "<p><small>Posted on: {$row['created_at']}</small></p>";
            echo "</li>";
        }
        ?>
    </ul>

    <footer>
        <p>&copy; 2024 Made by EXPLOITWEB IT SOLUTIONS (exploitweb.tech)</p>
    </footer>
</body>
</html>
