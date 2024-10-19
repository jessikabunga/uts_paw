<?php
include 'config.php';
include 'header.php';
session_start();

if (isset($_SESSION['username'])) {
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

<div class="container">
    <h2>Edit Artwork</h2>
    <form method="POST" action="">
        Name: <br>
        <input type="text" name="name" value="<?php echo $art['name']; ?>" required> <br><br>
        Artist: <br>
        <input type="text" name="artist" value="<?php echo $art['artist']; ?>" required> <br><br>
        Year: <br>
        <input type="text" name="year" value="<?php echo $art['year']; ?>" required> <br><br>
        Description: <br>
        <textarea name="description" required><?php echo $art['description']; ?></textarea> <br><br>
        Image: <br>
        <input type="file" name="file" value="<?php echo $art['image']; ?>" required>
        <input type="submit" name="submit" value="Update Artwork">
    </form>
</div>

<?php include 'footer.php'; ?>
