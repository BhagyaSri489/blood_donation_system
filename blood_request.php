<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ""; // Fix undefined variable

// Connect to database
$conn = new mysqli("localhost", "root", "", "blood_donation_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if (isset($_POST['submit'])) {

    $patient_name = $_POST['patient_name'];
    $blood_group = $_POST['blood_group'];
    $units = $_POST['units'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $required_date = $_POST['required_date'];
    $urgency = $_POST['urgency']; // Urgency level

    // Handle proof file upload
    $proof = "";
    if (isset($_FILES['proof']) && $_FILES['proof']['name'] != "") {
        $target_dir = "uploads/";

        // Create folder if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $proof = basename($_FILES["proof"]["name"]);
        $target_file = $target_dir . $proof;

        if (!move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file)) {
            $message = "Error uploading proof file!";
        }
    }

    // Insert into database
    $sql = "INSERT INTO requests 
    (patient_name, blood_group, units, location, contact, required_date, urgency, proof)
    VALUES 
    ('$patient_name', '$blood_group', '$units', '$location', '$contact', '$required_date', '$urgency', '$proof')";

    if ($conn->query($sql) === TRUE) {
        $message = "Request Submitted Successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Request</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background: url('images/bg.jpeg') no-repeat center center/cover;
            height: 100vh;
        }
        body::before {
            content: "";
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.2);
            top: 0;
            left: 0;
        }
        .container {
            position: relative;
            z-index: 1;
            width: 650px;
            margin: 40px auto;
            padding: 20px;
            background: transparent;
        }
        h1 {
            text-align: center;
            color: black;
            margin-bottom: 5px;
            font-size: 48px;
            font-weight: bold;
        }
        .subtitle {
            text-align: center;
            color: #eee;
            margin-bottom: 25px;
        }
        .message {
            text-align: center;
            margin-bottom: 15px;
            color: #00ffcc;
            font-weight: bold;
        }
        .form-group { margin-bottom: 15px; }
        .row { display: flex; gap: 15px; }
        .row .form-group { flex: 1; }
        label {
            color: white;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background: rgba(255,255,255,0.2);
            color: black;
        }
        input:focus, select:focus { outline: none; box-shadow: 0 0 6px #ff416c; }
        button {
            width: 100%;
            padding: 12px;
            background: rgba(255,65,108,0.8);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover { background: rgba(255,65,108,1); }
        @media (max-width: 700px) {
            .container { width: 90%; }
            .row { flex-direction: column; }
        }
    </style>
</head>

<body>
<div class="container">

    <h1>🩸 Request Blood</h1>
    <div class="subtitle">Help save a life today</div>

    <?php if($message != "") { ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Patient Name</label>
            <input type="text" name="patient_name" required>
        </div>

        <div class="row">
            <div class="form-group">
                <label>Blood Group</label>
                <select name="blood_group" required>
                    <option value="">Select</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                </select>
            </div>

            <div class="form-group">
                <label>Units Required</label>
                <input type="number" name="units" required>
            </div>

            <div class="form-group">
                <label>Urgency Level</label>
                <select name="urgency" required>
                    <option value="">Select</option>
                    <option value="Normal">Normal 🟢</option>
                    <option value="Urgent">Urgent 🟡</option>
                    <option value="Emergency">Emergency 🔴</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" required>
        </div>

        <div class="form-group">
            <label>Contact</label>
            <input type="text" name="contact" required>
        </div>

        <div class="form-group">
            <label>Required Date</label>
            <input type="date" name="required_date" required>
        </div>

        <div class="form-group">
            <label>Upload Proof (optional)</label>
            <input type="file" name="proof">
        </div>

        <button type="submit" name="submit">Submit Request</button>

    </form>
</div>
</body>
</html>