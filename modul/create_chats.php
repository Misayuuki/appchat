<?php 
	require '../config/koneksi.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $chatname = $_POST['chat_name'];

		$stmt = $pdo->prepare("INSERT INTO chats (chat_name) VALUES (?)");
		$stmt->execute([$chatname]);

		header("Location: read_chat.php");
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Chat</title>
    <style>
        /* CSS internal styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f3f4f6;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #dddddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Chat</h2>
    <form method="POST">
    <label for="chatname">Chatname:</label>
    <input type="text" name="chat_name" id="chat_name" required>
    <input type="submit" value="Tambah Chat">
    </form>

</div>

</body>
</html>