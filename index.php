<?php
include 'config.php';
include 'header.php';
session_start();

if (isset($_SESSION['username'])) {
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
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1{
            color: black;
        }
        .gallery-container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .art-item {
            width: 30%;
            margin-bottom: 20px;
            text-align: center;
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .art-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .art-item p {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0 5px;
        }
        .detail-link {
            display: inline-block;
            padding: 8px 15px;
            background-color: rgb(192, 184, 73);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .detail-link:hover {
            background-color: rgb(153, 147, 58);
        }
    </style>
</head>
<body>

<div class="gallery-container">
    <h1>Home</h1>
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

<?php include 'footer.php'; ?>

</body>
</html>
