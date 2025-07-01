<?php
    $message = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == 0) {
            $uploadDir = 'books/';
            $filename = basename($_FILES['pdf']['name']);
            $targetFile = $uploadDir . $filename;

            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if ($fileType == 'pdf') {
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $targetFile)) {
                    $message = "File uploaded successfully.";
                } else {
                    $message = "Error uploading file.";
                }
            } else {
                $message = "Only PDF files are allowed.";
            }
        } else {
            $message = "No file uploaded or error occurred.";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Upload a Book</h1>
        <nav>
            <ul>
                <li><a href="dash.php">Dashboard</a></li>
                <li><a href="reader.php">Reader</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Select a PDF to Upload</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="pdf" accept="application/pdf" required>
            <br><br>
            <button type="submit">Upload</button>
        </form>
        <p><?php echo $message; ?></p>
    </div>
    <footer>
        <p>&copy; 2025 Book Portal</p>
    </footer>
</body>
</html>
