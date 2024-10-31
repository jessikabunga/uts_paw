<?php
include 'config.php';
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];

if (!$id) {
    echo "No artwork ID provided!";
    exit();
}

$result = $conn->query("SELECT * FROM art WHERE id='$id'");

if ($result->num_rows > 0) {
    $art = $result->fetch_assoc();
} else {
    echo "No artwork found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artwork</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 130%;
            font-family: Arial, sans-serif;
            background-color: #fdecdc;
        }
        .container {
            min-height: 100vh;
            padding: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .link-edit {
            display: inline-block;
            padding: 8px 15px;
            background-color: #743014;
            color: #e8d1a7;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .link-edit:hover {
            background-color: #8c523b;
        }

        .link-delete {
            display: inline-block;
            padding: 8px 15px;
            background-color: #743014;
            color: #e8d1a7;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .link-delete:hover {
            background-color: #8c523b;
        }

    </style>
</head>
<body>

<div class="container">
    <h2><?php echo $art['name']; ?></h2>
    
    <img src="uploads/<?php echo $art['image']; ?>" alt="<?php echo $art['name']; ?>" style="width: 300px; height: auto;">
    
    <p><?php echo $art['description']; ?></p>
    <p><strong>Year:</strong> <?php echo $art['year']; ?></p>
    <p><strong>Artist:</strong> <?php echo $art['artist']; ?></p>

    <!-- Tombol Edit dan Delete -->
    <a class="link-edit" href="edit_art.php?id=<?php echo $art['id']; ?>" class="btn btn-primary">Edit</a>
    <a class="link-delete" href="delete_art.php?id=<?php echo $art['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this artwork?');">Hapus</a>
</div>

</body>
</html>
