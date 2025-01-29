<?php
// view_policy.php - View policy document
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $policy_id = $_GET['id'];

    // Fetch policy from the database
    include 'config.php';
    $sql = "SELECT * FROM policies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $policy_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $policy = $result->fetch_assoc();

    if ($policy) {
        echo "<h1>" . $policy['title'] . "</h1>";
        echo "<p>" . nl2br($policy['content']) . "</p>";
    } else {
        echo "Policy not found.";
    }
}
?>
