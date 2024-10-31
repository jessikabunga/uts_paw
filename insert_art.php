<?php
include 'config.php';
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $artist = $_POST['artist'];

    $target_dir = "uploads/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        if ($conn->query("INSERT INTO art (name, image, description, year, artist) VALUES ('$name', '$image', '$description', '$year', '$artist')")) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artwork</title>
    <style>
        body {
            font-family: Trebuchet MS, 'Lucida Sans Unicode', Lucida Grande, Lucida Sans, Arial, sans-serif;
            background-color: #f0e5cf;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 3px dashed #333;
            background-color: #fff4e6;
            border-radius: 15px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 35px;
            margin-bottom: 25px;
            font-weight: bold;
            color: #743014;
            font-family: Lucida Bright;
        }

        label {
            display: block;
            font-size: 20px;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #743014;
            border-radius: 10px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #fffaf0;
        }

        textarea {
            height: 120px;
        }

        input[type="file"] {
            border: none;
        }

        button,
        input[type="submit"] {
            display: inline-block;
            padding: 10px 30px;
            font-size: 18px;
            background-color: #743014;
            border: none;
            color: #e8d1a7;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            text-align: center;
            width: 100%;
        }

        button:hover,
        input[type="submit"]:hover {
            background-color: #8c523b;
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

        input[type="text"], textarea, input[type="file"] {
            font-family: 'Arial', sans-serif;
        }

        input::placeholder, textarea::placeholder {
            color: #bfbfbf;
            font-style: italic;
        }

        .container::after {
            display: block;
            text-align: center;
            font-size: 16px;
            margin-top: 10px;
            color: #b89470;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Artwork</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter artwork name" required>

            <label for="artist">Artist:</label>
            <input type="text" id="artist" name="artist" placeholder="Enter artist name" required>

            <label for="year">Year:</label>
            <input type="text" id="year" name="year" placeholder="Enter year of creation" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter artwork description" required></textarea>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image">

            <input type="submit" name="submit" value="Add">
        </form>
    </div>
</body>
</html>
