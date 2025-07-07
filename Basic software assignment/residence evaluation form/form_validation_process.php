<?php
include("config.php");

if (isset($_POST['submit'])) {
    $fullname = $_POST['full_name'];
    $dateofbirth = $_POST['dob']; 
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phone'];
    $email = $_POST['email'];
    $occupation = $_POST['occupation'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $registereddate = $_POST['registered_date'];

    // Insert into the database
    $result = mysqli_query($mysqli, "INSERT INTO residents (full_name, dob, nic, address, phone, email, occupation, gender, registered_date) VALUES ('$fullname', '$dateofbirth', '$nic', '$address', '$phonenumber', '$email', '$occupation', '$gender', '$registereddate')");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .success-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 40px;
            text-align: center;
            animation: fadeIn 0.8s ease-out;
        }
        
        .success-icon {
            font-size: 80px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .details-container {
            text-align: left;
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            margin: 25px 0;
        }
        
        .detail-item {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .detail-label {
            font-weight: 600;
            color: #4f46e5;
            display: inline-block;
            width: 150px;
        }
        
        .detail-value {
            color: #1e293b;
        }
        
        .back-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .back-btn:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 600px) {
            .success-container {
                padding: 30px 20px;
            }
            
            .detail-label {
                width: 100%;
                margin-bottom: 5px;
            }
            
            .detail-item {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h1>Registration Successful!</h1>
        
        <div class="details-container">
            <div class="detail-item">
                <span class="detail-label">Full Name:</span>
                <span class="detail-value"><?php echo htmlspecialchars($fullname); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Date of Birth:</span>
                <span class="detail-value"><?php echo htmlspecialchars($dateofbirth); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">NIC Number:</span>
                <span class="detail-value"><?php echo htmlspecialchars($nic); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Address:</span>
                <span class="detail-value"><?php echo htmlspecialchars($address); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Phone Number:</span>
                <span class="detail-value"><?php echo htmlspecialchars($phonenumber); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Email:</span>
                <span class="detail-value"><?php echo htmlspecialchars($email); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Occupation:</span>
                <span class="detail-value"><?php echo htmlspecialchars($occupation); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Gender:</span>
                <span class="detail-value"><?php echo htmlspecialchars($gender); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Registered Date:</span>
                <span class="detail-value"><?php echo htmlspecialchars($registereddate); ?></span>
            </div>
        </div>
        
        <a href="index.html" class="back-btn">Return to Home</a>
    </div>
</body>
</html>
<?php
    } else {
        echo "Registration Failed: " . mysqli_error($mysqli);
    }
?>