<?php
// include "./styles.css";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Include the send_otp.php file to send the OTP
    include('send_otp.php'); // This will send the OTP to the email

    // Redirect to verify_otp.php after sending the OTP
    header("Location: verify_otp.php");
    exit(); // Don't forget to call exit after header redirection to stop further execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        /* CSS goes here */
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
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            outline: none;
        }

        input[type="email"]:focus {
            border-color: #5fa8d3;
        }

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

        button:hover {
            background-color: #4b97c0;
        }

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
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>

