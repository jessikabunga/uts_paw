<?php
include 'config.php';
include 'header.php';
session_start();

if (isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM art WHERE id='$id'");
$art = $result->fetch_assoc();
?>

<div class="container">
    <h2><?php echo $art['name']; ?></h2>
    <img src="<?php echo $art['image']; ?>" alt="<?php echo $art['name']; ?>" width="400" height="400">
    <p><?php echo $art['description']; ?></p>
    <p><strong>Year:</strong> <?php echo $art['year']; ?></p>
    <p><strong>Artist:</strong> <?php echo $art['artist']; ?></p>
    <a href="edit_art.php?id=<?php echo $art['id']; ?>" class="btn btn-primary">Edit</a>
    <a href="delete.php?id=<?php echo $art['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this artwork?');">Hapus</a>
</div>

<?php include 'footer.php'; ?>
