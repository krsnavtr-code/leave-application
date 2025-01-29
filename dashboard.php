<?php
// dashboard.php - User dashboard
include 'config.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { display: flex; }
        .sidebar { width: 250px; background: #f4f4f4; padding: 20px; }
        .content { flex: 1; padding: 20px; }
        .card { background: white; padding: 20px; margin: 10px 0; border-radius: 5px; }
        .button { padding: 10px 15px; background: blue; color: white; text-decoration: none; border-radius: 5px; }
        .session-timer { position: absolute; top: 10px; right: 10px; background: #eee; padding: 5px 10px; border-radius: 5px; }
    </style>
    <script>
        let timeLeft = 1200;
        function updateTimer() {
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            document.getElementById("session-timer").innerText = `Session expires in: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timeLeft--;
            if (timeLeft < 0) {
                window.location.href = "logout.php";
            }
        }
        setInterval(updateTimer, 1000);
    </script>

        <style>
            /* General reset and font */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body styling */
body {
    background-color: #f4f4f4;
    display: flex;
    height: 100vh;
}

/* Container for sidebar and content */
.container {
    display: flex;
    flex: 1;
}

/* Sidebar styling */
.sidebar {
    width: 250px;
    background-color: #333;
    color: white;
    padding: 20px;
    height: 100vh;
    position: fixed;
}

/* Sidebar title */
.sidebar h3 {
    color: #fff;
    text-align: center;
    margin-bottom: 30px;
}

/* Sidebar links */
.sidebar a {
    display: block;
    padding: 12px;
    color: white;
    text-decoration: none;
    background-color: #444;
    border-radius: 5px;
    margin-bottom: 10px;
    transition: background-color 0.3s ease;
}

/* Sidebar link hover effect */
.sidebar a:hover {
    background-color: #5fa8d3;
}

/* Content section styling */
.content {
    margin-left: 270px;
    padding: 20px;
    flex: 1;
    background-color: white;
    height: 100vh;
    overflow-y: auto;
}

/* Dashboard title */
.content h2 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Session timer styling */
.session-timer {
    position: fixed;
    top: 10px;
    right: 20px;
    background-color: #eee;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
}

/* Card styling for sections like Leave Application and Policy Documents */
.card {
    background-color: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Button styling */
.button {
    padding: 10px 15px;
    background-color: #5fa8d3;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    margin-top: 10px;
}

/* Button hover effect */
.button:hover {
    background-color: #4b97c0;
}

/* QR Code image styling */
.card img {
    max-width: 150px;
    display: block;
    margin: 10px auto;
}

/* Footer, if you have any */
/* footer {
    text-align: center;
    padding: 20px;
    background-color: #333;
    color: white;
    position: fixed;
    width: 100%;
    bottom: 0;
} */

/* Card container */
.card {
    background: #fff;
    padding: 20px;
    margin: 15px 0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Card hover effect */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Card title */
.card h3 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #333;
}

/* Policy document links */
.card p {
    font-size: 16px;
    margin: 8px 0;
}

.card a {
    text-decoration: none;
    /* color: #007bff; */
    font-weight: bold;
    transition: color 0.3s ease;
}

/* Link hover effect */
.card a:hover {
    color: #0056b3;
    text-decoration: underline;
}

        </style>


</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3>SMOPL HRMS</h3>
            <p><strong><?php echo $_SESSION['email']; ?></strong></p>
            <a href="#" class="button">Dashboard</a>
            <a href="document.php" class="button">Documents</a>
            <a href="logout.php" class="button">Logout</a>
        </div>
        <div class="content">
            <h2>Dashboard</h2>
            <div class="session-timer" id="session-timer">Session expires in: 20:00</div>
            <div class="card">
                <h3>Leave Application</h3>
                <img src="qrcode.png" alt="QR Code" width="150">
                <p>Scan QR code or click below to access the leave application portal</p>
                <a href="leave_application.php" class="button">Open Leave Portal</a>
            </div>
            <div class="card">
                <h3>Policy Documents</h3>
                <p>Company Policy 2024 - <a href="view_policy.php?id=1">View Document</a></p>
                <p>HR Guidelines - <a href="view_policy.php?id=2">View Document</a></p>
                <p>Code of Conduct - <a href="view_policy.php?id=3">View Document</a></p>
            </div>
        </div>
    </div>
</body>
</html>
