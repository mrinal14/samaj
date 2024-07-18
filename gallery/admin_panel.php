<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
    } else {
        $photo = null;
    }

    $query = "INSERT INTO blogs (title, content, photo) VALUES ('$title', '$content', '$photo')";
    mysqli_query($conn, $query);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "SELECT photo FROM blogs WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row['photo']) {
        unlink("uploads/" . $row['photo']);
    }

    $query = "DELETE FROM blogs WHERE id=$id";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin-bottom: 30px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        form input[type="text"],
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
        }

        h3 {
            color: #333;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        ul li img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
            margin-right: 10px;
        }

        ul li a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        ul li a:hover {
            color: #0056b3;
        }

        .download-link {
            text-align: center;
            margin-top: 20px;
        }

        .download-link a {
            color: #007BFF;
            text-decoration: none;
            font-size: 18px;
        }

        .download-link a:hover {
            color: #0056b3;
        }

        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            form input[type="text"],
            form textarea,
            form input[type="file"] {
                padding: 8px;
            }

            form button {
                padding: 8px;
            }

            ul li {
                flex-direction: column;
                align-items: flex-start;
            }

            ul li img {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <h2>Admin Panel</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="title">Blog Title</label>
        <input type="text" id="title" name="title" required>
        <label for="content">Blog Content</label>
        <textarea id="content" name="content" required></textarea>
        <label for="photo">Upload Photo</label>
        <input type="file" id="photo" name="photo">
        <button type="submit">Add Blog</button>
    </form>
    <h3>Existing Blogs</h3>
    <ul>
        <?php
        $query = "SELECT * FROM blogs ORDER BY created_at DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "<div>";
            echo "<strong>{$row['title']}</strong>";
            if ($row['photo']) {
                echo "<br><img src='uploads/{$row['photo']}' alt='Blog photo'>";
            }
            echo "</div>";
            echo "<div><a href='?delete={$row['id']}'>Delete</a></div>";
            echo "</li>";
        }
        ?>
    </ul>
    <div class="download-link">
        <a href="contact/download.php">DOWNLOAD_CANDIDATE_DETAILS</a>
    </div>
</body>
</html>
