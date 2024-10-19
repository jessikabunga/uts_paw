<?php
include 'config.php';
include 'header.php';
session_start();

if (isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $artist = $_POST['artist'];

    if ($conn->query("INSERT INTO art (name, image, description, year, artist) VALUES ('$name', '$image', '$description', '$year', '$artist')")) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $target_folder = "uploads/";
    $target_file = $target_folder . basename($_FILES['file']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file));
        $image = $target_file;

        if ($conn->query("INSERT INTO art (name, image, description, year, artist) VALUES ('$name', '$image', '$description', '$year', '$artist')")) {
            header('Location: index.php');
        } else {
            echo "Error: " . $conn->error;
        }
    }else {
    echo "Gambar tidak bisa diunngah";
    }
?>

<div class="container">
    <h2>Add New Artwork</h2>
    <form method="POST" action="">
        Name: <br>
        <input type="text" name="name" required> <br><br>
        Artist: <br>
        <input type="text" name="artist" required> <br><br>
        Year: <br>
        <input type="text" name="year" required> <br><br>
        Description: <br>
        <textarea name="description" required></textarea> <br><br>
        Image: <br>
        <input type="file" name="file"> <br><br>
        <input type="submit" name="submit" value="Add"><br><br>
    </form>
</div>

<?php include 'footer.php'; ?>
