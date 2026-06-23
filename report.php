<?php
require 'auth.php';
requireLogin();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container report-box">

    <h2>Report Page</h2>

    <p>Only logged-in users can access this page.</p>

    <?php if (isAdmin()): ?>
        <p><strong>You are an Admin.</strong></p>
    <?php endif; ?>

    <a href="index.php" class="btn btn-blue">Back to Dashboard</a>

</div>

</body>
</html>