<?php
// leave_application.php - Leave application form
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $leave_reason = $_POST['leave_reason'];
    $leave_date = $_POST['leave_date'];

    include 'config.php';
    $sql = "INSERT INTO leave_requests (email, leave_reason, leave_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $_SESSION['email'], $leave_reason, $leave_date);
    if ($stmt->execute()) {
        echo "Leave request submitted successfully!";
    } else {
        echo "Error submitting leave request.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Application</title>
    <style>
        /* Include the CSS code here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            padding: 20px;
            min-height: 100vh;
            align-items: center;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        textarea, input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5fa8d3;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4b97c0;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Leave Application</h2>
        <form method="POST">
            <label>Leave Reason:</label>
            <textarea name="leave_reason" required></textarea><br>

            <label>Leave Date:</label>
            <input type="date" name="leave_date" required><br>

            <button type="submit">Submit Leave Request</button>
        </form>

        <?php if (isset($message)): ?>
            <div class="<?php echo $message_class; ?>"><?php echo $message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>