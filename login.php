<?php
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        header("Location: pro.html"); // Redirect to home after login
        exit;
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No account found with this email.";
}
?>
