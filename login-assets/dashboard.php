<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome <?= htmlspecialchars($_SESSION['user']) ?></h2>
<p>Select a folder to view:</p>
<ul>
    <?php foreach ($_SESSION['access'] as $folder): ?>
        <li><a href="client_portal/<?= $folder ?>/" target="_blank"><?= $folder ?></a></li>
    <?php endforeach; ?>
</ul>
<a href="logout.php">Logout</a>
