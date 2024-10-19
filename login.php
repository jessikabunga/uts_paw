<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn->prepare("SELECT * FROM users WHERE username=?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])){
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $row['name'];
            header("Location: index.php");
        } else {
            echo "Username atau Password salah!";
        }
    } else {
        echo "Anda belum terdaftar!";
    }

    $sql->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header {
            background-color: #C0B849;
            width: 100%;
            padding: 20px 0;
            text-align: left;
            padding-left: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
        }

        header h1 {
            font-size: 24px;
            color: black;
        }

        header a {
            color: black;
            text-decoration: none;
            margin-right: 30px;
            font-size: 18px;
        }

        .login-container {
            background-color: #fff;
            padding: 40px 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 350px;
            margin-top: 100px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-container input[type="text"], 
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .login-container .btn {
            background-color: rgb(192, 184, 73);
            color: white;
            border: none;
            padding: 10px 15px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
        }

        .login-container .btn:hover {
            background-color: rgb(153, 147, 58);
        }

        .login-container .links {
            margin-top: 20px;
        }

        .login-container .links a {
            color: rgb(192, 184, 73);
            text-decoration: none;
            margin: 0 10px;
        }

        .login-container .links a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="login-container">
        <h2>Sign In</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Sign In</button>
        </form>
        <div class="links">
            <p>Dont't you have an account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>
    </div>
</body>
</html>
