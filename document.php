<?php
// document.php - Display policy documents
include 'config.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Fetch policy documents
$sql = "SELECT id, title, file_path FROM policy_documents";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Policy Documents</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
        .card { background: white; padding: 15px; margin: 10px 0; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
        .button { padding: 10px 15px; background: blue; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Policy Documents</h2>
        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="card">
                        <a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No documents available.</p>
        <?php endif; ?>
        <br>
        <a href="dashboard.php" class="button">Back to Dashboard</a>
    </div>
</body>
</html>
