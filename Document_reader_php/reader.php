<?php
    if (!isset($_GET['file'])) {
        echo "No file selected.";
        exit;
    }

    $file = urldecode($_GET['file']);
    if (!file_exists($file) || pathinfo($file, PATHINFO_EXTENSION) !== 'pdf') {
        echo "Invalid file.";
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Book Reader</h1>
        <nav>
            <ul>
                <li><a href="dash.php">Dashboard</a></li>
                <li><a href="upload.php">Upload</a></li>
            </ul>
        </nav>
    </header>
    <div class="container reader-container">
        <h2>Reading: <?php echo basename($file); ?></h2>
        <iframe src="<?php echo htmlspecialchars($file); ?>" width="100%" height="600px"></iframe>
    </div>
    <footer>
        <p>&copy; 2025 Book Portal</p>
    </footer>
</body>
</html>
