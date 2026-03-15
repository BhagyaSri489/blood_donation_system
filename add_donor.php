<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $last_donation_date = !empty($_POST['last_donation_date']) ? $_POST['last_donation_date'] : NULL;

    $stmt = $conn->prepare("INSERT INTO donors (full_name, age, gender, blood_group, phone, email, city, address, last_donation_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sisssssss", $full_name, $age, $gender, $blood_group, $phone, $email, $city, $address, $last_donation_date);

    if ($stmt->execute()) {
        header("Location: donor.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted properly.";
}
?>