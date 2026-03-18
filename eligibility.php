
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Eligibility | Blood Donation System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-red: #d32f2f;
            --dark-red: #b71c1c;
            --soft-bg: #fff5f5;
            --white: #ffffff;
            --text-dark: #333;
        }

        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--soft-bg);
            color: var(--text-dark);
            padding-top: 100px; /* Space for fixed nav */
        }

        /* --- NAVIGATION --- */
        nav {
            background: var(--white);
            height: 80px;
            display: flex;
            align-items: center;
            position: fixed;
            top: 0; width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        
        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }




      .logo { 
    font-size: 1.5rem; 
    font-weight: 700; 
    color: var(--primary-red); 
    text-decoration: none; /* This removes the underline */
    display: flex;
    align-items: center;
    gap: 10px;
}

/* This ensures the underline doesn't come back when you hover over it */
.logo:hover {
    text-decoration: none;
    color: var(--dark-red); /* Optional: slight color change on hover */
}

        /* --- FORM CARD --- */
        .eligibility-card {
            background: var(--white);
            max-width: 800px;
            margin: 0 auto 50px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            border: 1px solid rgba(211, 47, 47, 0.1);
        }

        .section-title { text-align: center; margin-bottom: 30px; }
        .section-title h2 { color: var(--primary-red); font-size: 2rem; }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: 0.3s;
        }

        input:focus, select:focus { border-color: var(--primary-red); outline: none; }

        .btn-submit {
            background: var(--primary-red);
            color: var(--white);
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn-submit:hover { background: var(--dark-red); transform: translateY(-2px); }

        /* --- RESULT BOX --- */
        #resultBox {
            margin-top: 30px;
            padding: 25px;
            border-radius: 10px;
            display: none; /* Hidden by default */
            text-align: center;
        }

        .success { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
        .error { background: #ffebee; color: #c62828; border: 1px solid #ffcdd2; }

        .reg-link {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 25px;
            background: #2e7d32;
            color: white;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <nav>
        <div class="container">
            <a href="index.html" class="logo"><i class="fas fa-heartbeat"></i>Blood Donation</a>
        </div>
    </nav>

    <div class="container">
        <div class="eligibility-card">
            <div class="section-title">
                <h2>Eligibility Check</h2>
                <p>Please answer honestly to ensure a safe donation process.</p>
            </div>

            <form id="eligibilityForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Your Age</label>
                        <input type="number" id="age" placeholder="e.g. 25" required>
                    </div>
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input type="number" id="weight" placeholder="Min 50kg" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select id="gender" onchange="toggleGenderFields()" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hemoglobin Level (g/dL)</label>
                        <input type="number" step="0.1" id="hb" placeholder="e.g. 13.5" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Have you donated blood in the last 3 months?</label>
                    <select id="lastDonation">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="form-group" id="femaleField" style="display: none;">
                    <label>Are you pregnant or breastfeeding?</label>
                    <select id="pregnant">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Do you have any infections, fever, or chronic diseases?</label>
                    <select id="healthIssue">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <button type="button" class="btn-submit" onclick="checkEligibility()">Check My Eligibility</button>
            </form>

            <div id="resultBox">
                <h3 id="resultTitle"></h3>
                <p id="resultText"></p>
                <div id="nextStep"></div>
            </div>
        </div>
    </div>

    <script>
        // Show/Hide female-specific questions
        function toggleGenderFields() {
            const gender = document.getElementById('gender').value;
            const femaleField = document.getElementById('femaleField');
            femaleField.style.display = (gender === 'female') ? 'block' : 'none';
        }

        function checkEligibility() {
            // Get values
            const age = parseInt(document.getElementById('age').value);
            const weight = parseInt(document.getElementById('weight').value);
            const hb = parseFloat(document.getElementById('hb').value);
            const lastDonation = document.getElementById('lastDonation').value;
            const healthIssue = document.getElementById('healthIssue').value;
            const pregnant = document.getElementById('pregnant').value;
            const gender = document.getElementById('gender').value;

            const resultBox = document.getElementById('resultBox');
            const resultTitle = document.getElementById('resultTitle');
            const resultText = document.getElementById('resultText');
            const nextStep = document.getElementById('nextStep');

            let errors = [];

            // VALIDATION LOGIC
            if (isNaN(age) || isNaN(weight) || isNaN(hb)) {
                alert("Please fill all fields correctly.");
                return;
            }

            if (age < 18 || age > 65) errors.push("Age must be between 18 and 65.");
            if (weight < 50) errors.push("Weight must be at least 50 kg.");
            if (hb < 12.5) errors.push("Hemoglobin must be 12.5 g/dL or higher.");
            if (lastDonation === "yes") errors.push("You must wait 3 months between donations.");
            if (healthIssue === "yes") errors.push("You must be in good health (no infections/chronic illness).");
            if (gender === "female" && pregnant === "yes") errors.push("Donation is not allowed during pregnancy or breastfeeding.");

            // DISPLAY RESULT
            resultBox.style.display = "block";
            
            if (errors.length === 0) {
                resultBox.className = "success";
                resultTitle.innerHTML = "<i class='fas fa-check-circle'></i> Congratulations!";
                resultText.innerText = "You are eligible to donate blood and help save lives.";
                nextStep.innerHTML = '<a href="donor.php?eligible=1" class="reg-link">Proceed to Register →</a>';
            } else {
                resultBox.className = "error";
                resultTitle.innerHTML = "<i class='fas fa-exclamation-triangle'></i> Not Eligible Yet";
                resultText.innerHTML = "Sorry, you cannot donate right now for the following reasons:<br><strong>" + errors.join("<br>") + "</strong>";
                nextStep.innerHTML = "";
            }

            resultBox.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>