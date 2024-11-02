<?php 
 require '../config/koneksi.php';
 $id = $_GET['id'];
 $stmt = $pdo->prepare("DELETE FROM chats WHERE id = ?");
 $stmt->execute([$id]);

 header("Location: read_chat.php");
?>