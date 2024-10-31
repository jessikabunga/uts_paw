<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Exhibition</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background: rgb(192, 184, 73);
            background-color: #e8d1a7;
            padding: 1px 0;
            text-align: center;
            font-family: Arial, sans-serif;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-family: Lucida Bright;
            color: #743014;
            margin-left: 10px;
        }
        nav {
            display: flex;
            justify-content: center;
            margin: 20px;
        }
        nav a {
            color: #e8d1a7;
            text-decoration: none;
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #743014;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #8c523b;
        }
        .container {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
<header>
    <h1 style="color: #743014">Art Exhibition</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="insert_art.php">Add Art</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>
