<?php
// Include the PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php'; // This will include the PHPMailer library

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    // Get the email address and generate OTP
    $email = $_POST['email'];
    $otp = rand(100000, 999999); // Generate a random 6-digit OTP

    // Start a session to store OTP and email temporarily
    session_start();
    $_SESSION['otp'] = $otp;
    $_SESSION['email_temp'] = $email;

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Set mailer to use SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Gmail's SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'krishnaavtar955@gmail.com'; // Your Gmail address
        $mail->Password   = 'lwrt lxps qvkd isyq'; // Your Gmail password (or an App Password if 2FA is enabled)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use STARTTLS encryption
        $mail->Port       = 587; // Gmail SMTP port

        // Set the sender and recipient
        $mail->setFrom('krishnaavtar955@gmail.com', 'SMOPL HRMS');
        $mail->addAddress($email); // The email to send OTP to

        // Set email subject and body
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP is: <b>$otp</b>";

        // Send the email
        $mail->send();

        echo 'OTP has been sent to your email!';
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
}
?>
