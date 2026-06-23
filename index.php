<?php
require 'auth.php';
requireLogin();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">

    <style>
<style>
.btn{
    display:inline-block;
    padding:12px 25px;
    border-radius:8px;
    text-decoration:none;
    color:white;
    font-weight:bold;
}

.btn-blue{
    background:4274D9;
}

.btn-red{
    background:4274D9;
}

.button-row{
    display:flex;
    gap:15px;
    justify-content:center;
}
</style>
</head>
<body>

<div class="container dashboard-container">

    <h2>Welcome <?php echo getUsername(); ?>,</h2>

    <p class="protected-text">
        This page is protected.
    </p>

    <p class="role-text">
        You are logged in as:
        <strong><?php echo ucfirst($_SESSION['role']); ?></strong>
    </p>

    <div class="button-row">
        <a href="report.php" class="btn btn-blue">
            Go to Report
        </a>

        <a href="logout.php" class="btn btn-red">
            Logout
        </a>
    </div>

</div>

</body>
</html>