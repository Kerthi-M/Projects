<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to the Book Dashboard</h1>
        <nav>
            <ul>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="reader.php">Reader</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Available Books</h2>
        <div class="book-list">
            <?php
                $files = glob("books/*.pdf");
                foreach ($files as $file) {
                    $title = basename($file, ".pdf");
                    echo "<div class='book-item'>";
                    echo "<h3>$title</h3>";
                    echo "<p><a href='reader.php?file=" . urlencode($file) . "'><button>Read</button></a></p>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Book Portal</p>
    </footer>
</body>
</html>
