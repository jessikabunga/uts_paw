<?php
include 'config.php';
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $artist = $_POST['artist'];

    if ($conn->query("UPDATE art SET name='$name', image='$image', description='$description', year='$year', artist='$artist' WHERE id='$id'")) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM art WHERE id='$id'");
$art = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artwork</title>
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
        <h2>Edit Artwork</h2>
        <form method="POST" action="">
            <label for="name">Title:</label>
            <input type="text" id="name" name="name" value="<?php echo $art['name']; ?>" required>

            <label for="artist">The artist:</label>
            <input type="text" id="artist" name="artist" value="<?php echo $art['artist']; ?>" required>

            <label for="year">When was it created?</label>
            <input type="text" id="year" name="year" value="<?php echo $art['year']; ?>" required>

            <label for="description">Description: </label>
            <textarea id="description" name="description" required><?php echo $art['description']; ?></textarea>

            <label for="file">Let me know the image!</label>
            <input type="file" id="file" name="file" value="<?php echo $art['image']; ?>" required>

            <input type="submit" name="submit" value="Update Artwork">
        </form>
    </div>
</body>
</html>
