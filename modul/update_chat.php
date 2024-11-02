<?php 
	require '../config/koneksi.php';
    
	$id = $_GET['id'];
	$stmt = $pdo->prepare("SELECT * FROM chats WHERE id = ?");
	$stmt->execute([$id]);
	$chat = $stmt->fetch();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$chat_name = $_POST['chat_name'];

		$stmt = $pdo->prepare("UPDATE chats SET chat_name = ? WHERE id = ?");
		$stmt->execute([$chat_name, $id]);

		header("Location: read_chat.php");
	}
?>

<form method="POST">
 	Chat Name: <input type="text" name="chat_name" value="<?= $chat['chat_name'] ?>" required>
 	<button type="submit">Update</button>
</form>
