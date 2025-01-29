CREATE TABLE leave_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    leave_reason TEXT NOT NULL,
    leave_date DATE NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending'
);
