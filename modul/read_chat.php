<?php
require '../config/koneksi.php';

$stmt = $pdo->query("SELECT * FROM chats");
$chats = $stmt->fetchAll();
?>

<table>
    <tr>
        <th>ID</th>
        <th>Chat Name</th>
        <th>Aksi</th>
    </tr>
<?php foreach ($chats as $chat): ?>
<tr>
    <td><?= $chat['id'] ?></td>
    <td><?= $chat['chat_name'] ?></td>
    <td>
        <a href="update_chat.php?id=<?= $chat['id'] ?>">Edit</a>
        <a href="delete_chat.php?id=<?= $chat['id'] ?>">Hapus</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
