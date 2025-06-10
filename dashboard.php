<?php
include("auth.php");
include("function_level_user.php");

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<link rel="stylesheet" href="src/main.css">
<link rel="stylesheet" href="src/style.css">

<body>
    <h1>Welcome, <?= htmlspecialchars($user['username']) ?></h1>
    <p>Your level: <strong><?= $user['level']; ?></strong></p>

    <?php if (is_level('administrator')): ?>
        <p> Administrator level manage user</p>
    <?php elseif (is_level('user')): ?>
        <p>user level access content</p>
    <?php else: ?>
        <p>Guest just limit access</p>
    <?php endif; ?>

    <h1><a href="logout.php">Logout</a></h1>
</body>

</html>