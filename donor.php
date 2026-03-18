<?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
<!DOCTYPE html>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System - Donor Registration</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(to right, #c1121f, #e63946);
            min-height: 100vh;
        }

        .header {
            width: 100%;
            background: #ffffff;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #d62828;
            font-size: 22px;
            font-weight: bold;
        }

        .logo i {
            font-size: 30px;
        }

        .quote {
            font-size: 18px;
            color: #555;
            font-style: italic;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 20px;
        }

        .container {
            width: 1100px;
            max-width: 95%;
            display: flex;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }

        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #a30000, #d62828);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 35px;
        }

        .left-content {
            max-width: 350px;
        }

        .left-content h2 {
            font-size: 38px;
            margin-bottom: 20px;
        }

        .left-content p {
            font-size: 18px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .feature-item {
            background: rgba(255,255,255,0.15);
            padding: 14px 18px;
            border-radius: 12px;
            font-size: 16px;
        }

        .left-icon {
            font-size: 90px;
            margin-bottom: 25px;
            color: #fff;
        }

        .right-panel {
            flex: 1.2;
            background: #f8f8f8;
            padding: 50px 55px;
        }

        .right-panel h1 {
            color: #d62828;
            font-size: 38px;
            margin-bottom: 10px;
        }

        .right-panel p {
            color: #555;
            margin-bottom: 30px;
            font-size: 18px;
        }

        .success-message {
            background: #4CAF50;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #222;
            font-size: 16px;
        }

        label i {
            color: #d62828;
            margin-right: 8px;
        }

        input, select, textarea {
            padding: 14px 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            background: #fff;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #d62828;
            box-shadow: 0 0 6px rgba(214, 40, 40, 0.2);
        }

        textarea {
            resize: none;
            min-height: 90px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            color: #333;
        }

        .checkbox-group input {
            width: auto;
        }

        .register-btn {
            width: 100%;
            padding: 15px;
            background: #d62828;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .register-btn:hover {
            background: #b71c1c;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }

            .left-panel,
            .right-panel {
                width: 100%;
            }

            .form-row {
                flex-direction: column;
            }

            .header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
                padding: 20px;
            }

            .right-panel {
                padding: 35px 25px;
            }

            .left-content h2 {
                font-size: 30px;
            }

            .right-panel h1 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">
            <i class="fas fa-heartbeat"></i>
            <span>Blood Donation</span>
        </div>
        <div class="quote">"Donate blood, save life."</div>
    </div>

    <div class="main-container">
        <div class="container">

            <div class="left-panel">
                <div class="left-content">
                    <div class="left-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <h2>Donate Blood, Save Lives</h2>
                    <p>
                        Become a donor today and help save precious lives during emergencies.
                        Your one contribution can make a huge difference for someone in need.
                    </p>

                    <div class="features">
                        <div class="feature-item">✔ Easy donor registration process</div>
                        <div class="feature-item">✔ Quick search by blood group</div>
                        <div class="feature-item">✔ Support patients in emergency situations</div>
                    </div>
                </div>
            </div>

            <div class="right-panel">
                <h1>Donor Registration</h1>
                <p>Provide your details to register as a donor.</p>

                <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                    <div class="success-message">Donor Registered Successfully!</div>
                <?php endif; ?>

                <form action="add_donor.php" method="POST">
                    <div class="form-group">
                        <label for="full_name"><i class="fas fa-user"></i> Full Name</label>
                        <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="age"><i class="fas fa-calendar-alt"></i> Age</label>
                            <input type="number" id="age" name="age" placeholder="18-65" min="18" max="65" required>
                        </div>

                        <div class="form-group">
                            <label for="gender"><i class="fas fa-venus-mars"></i> Gender</label>
                            <select id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="blood_group"><i class="fas fa-droplet"></i> Blood Group</label>
                            <select id="blood_group" name="blood_group" required>
                                <option value="">Select Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="phone"><i class="fas fa-phone"></i> Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="10-digit mobile number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" id="email" name="email" placeholder="example@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="address"><i class="fas fa-location-dot"></i> Address</label>
                        <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="city"><i class="fas fa-city"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Enter your city" required>
                        </div>
                    <div class="form-group">
            <label for="last_donation_date"><i class="fas fa-calendar-check"></i> Last Donation Date</label>
            <input type="date" id="last_donation_date" name="last_donation_date">
        </div>
    

                        <div class="form-group">
                            <label for="availability_status"><i class="fas fa-check-circle"></i> Availability</label>
                            <select id="availability_status" name="availability_status" required>
                                <option value="">Select Availability</option>
                                <option value="Available Today">Available Today</option>
                                <option value="Available This Week">Available This Week</option>
                                <option value="Emergency Only">Emergency Only</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                    </div>

                    

                    <div class="checkbox-group">
                        <input type="checkbox" id="consent" name="consent" required>
                        <label for="consent" style="margin: 0; font-weight: normal;">
                            I agree to donate blood when needed.
                        </label>
                    </div>

                    <button type="submit" class="register-btn">Register Donor</button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>