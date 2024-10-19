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
            background-color: rgb(192, 184, 73);
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
            color: #d8d6c6;
            margin-left: 10px;
        }
        nav {
            display: flex;
            justify-content: center;
            margin: 20px;
        }
        nav a {
            color: #333;
            text-decoration: none;
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #ddd;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #bbb;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        footer {
            background-color: rgb(192, 184, 73);
            color: black;
            text-align: center;
            padding: 1px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
<header>
    <h1>Art Exhibition</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="insert_art.php">Add Art</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>
