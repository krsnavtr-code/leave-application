<?php
// verify_otp.php - OTP verification
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['otp'])) {
    if ($_POST['otp'] == $_SESSION['otp']) {
        $_SESSION['email'] = $_SESSION['email_temp'];
        unset($_SESSION['otp']);
        unset($_SESSION['email_temp']);
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid OTP";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>

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
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form container */
form {
    background-color: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

/* Heading */
h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Label styling */
label {
    display: block;
    font-size: 16px;
    color: #555;
    margin-bottom: 8px;
}

/* Input fields */
input[type="text"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 20px;
    outline: none;
}

/* Input focus styling */
input[type="text"]:focus {
    border-color: #5fa8d3;
}

/* Button styling */
button {
    width: 100%;
    padding: 12px;
    background-color: #5fa8d3;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Button hover effect */
button:hover {
    background-color: #4b97c0;
}

/* Error message styling */
.error-message {
    color: red;
    text-align: center;
    margin-top: 20px;
}

/* Responsive design for mobile */
@media (max-width: 600px) {
    form {
        padding: 20px;
    }

    button {
        padding: 10px;
    }
}

    </style>

</head>
<body>
    <form method="POST">
        <label>Enter OTP:</label>
        <input type="text" name="otp" required>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
