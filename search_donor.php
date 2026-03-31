<?php
$conn = mysqli_connect("localhost", "root", "", "blood_donation_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Donor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #c0392b;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
        }

        input, select, button {
            padding: 10px;
            width: 220px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        button {
            background: #c0392b;
            color: white;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background: #a93226;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background: #c0392b;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        .no-data {
            text-align: center;
            color: red;
            font-size: 18px;
            margin-top: 20px;
        }

        .info {
            text-align: center;
            color: #555;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Search Blood Donors</h2>
    <p class="info">Find available donors by blood group, units, and city.</p>

    <form method="POST" action="">
        <select name="blood_group" required>
            <option value="">Select Blood Group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <input type="number" name="units_required" placeholder="Units Required" min="1" required>

        <input type="text" name="city" placeholder="Enter City" required>

        <button type="submit" name="search">Search Donor</button>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
        $units_required = mysqli_real_escape_string($conn, $_POST['units_required']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        $sql = "SELECT * FROM donors 
                WHERE blood_group = '$blood_group' 
                AND availability_status = 'Available'
                AND units_available >= '$units_required'
                AND city = '$city'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Donor ID</th>
                    <th>Full Name</th>
                    <th>Blood Group</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th>Address</th>
                    <th>Units Available</th>
                    <th>Availability</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['donor_id']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['blood_group']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['city']}</td>
                        <td>{$row['pincode']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['units_available']}</td>
                        <td>{$row['availability_status']}</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='no-data'>No matching donors found.</p>";
        }
    }

    mysqli_close($conn);
    ?>
</div>

</body>
</html>