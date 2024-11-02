<?php 
	require '../config/koneksi.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$email = $_POST['email'];

		$stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
		$stmt->execute([$username, $email]);

		header("Location: read_user.php");
	}
 ?>

 <form method="POST">
 	Username: <input type="text" name="username" required>
 	Email: <input type="email" name="email" required>
 	<button type="submit">Simpan</button>
 </form>