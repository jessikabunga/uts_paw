<?php
include 'config.php';
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

    $result = $conn->query("SELECT id, name, image FROM art");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdecdc;
            margin: 0;
            padding: 0;
        }
        title{
            color: #743014;
            text-align: center;
            font-size: 40px;
            margin-top: 20px;
        }
        .gallery-container {
            width: 85%;
            margin: 20px auto;
            padding: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .art-item {
            width: 30%;
            margin-bottom: 40px;
            text-align: center;
            background: #fff;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .art-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .art-item p {
            font-size: 20px;
            font-weight: bold;
            margin: 15px 0 5px;
        }
        .detail-link {
            display: inline-block;
            padding: 10px 25px;
            background-color: #743014;
            color: #e8d1a7;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .detail-link:hover {
            background-color: #8c523b;
        }
    </style>
</head>
<body>

<div class="gallery-container">
    <h1 class="title">Home</h1>
    <div class="gallery">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="art-item">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                    <p><?php echo $row['name']; ?></p>
                    <a class="detail-link" href="detail.php?id=<?php echo $row['id']; ?>">Detail</a>
                </div>
                <?php
            }
        } else {
            echo "<p>No artworks available.</p>";
        }
        ?>
    </div>
</div>


</body>
</html>
