<?php
include 'db_connect.php';

$sql = "SELECT * FROM donors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Donors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #d62828;
            margin-bottom: 30px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        th, td {
            padding: 12px 14px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #d62828;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 18px;
            background: #d62828;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back-btn:hover {
            background: #b71c1c;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #555;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <h1>Registered Donors</h1>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Blood Group</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>Address</th>
                <th>Last Donation Date</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['donor_id'] . "</td>
                            <td>" . $row['full_name'] . "</td>
                            <td>" . $row['age'] . "</td>
                            <td>" . $row['gender'] . "</td>
                            <td>" . $row['blood_group'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['city'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['last_donation_date'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='no-data'>No donors found</td></tr>";
            }

            $conn->close();
            ?>
        </table>

        <a href="donor.php" class="back-btn">Register New Donor</a>
    </div>

</body>
</html>