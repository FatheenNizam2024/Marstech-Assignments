<?php
// Start session at the very top before any output
session_start();
include("config.php");

if (isset($_POST['submit'])) {
    // Get data from session
    if(isset($_SESSION['row_data'])) {
        $row = $_SESSION['row_data'];
        $id = $row['id'];
    } else {
        die("Session data not found. Please go back and try again.");
    }

    // Get and sanitize form data
    $fullname = mysqli_real_escape_string($mysqli, $_POST['full_name']); 
    $dateofbirth = mysqli_real_escape_string($mysqli, $_POST['dob']); 
    $nic = mysqli_real_escape_string($mysqli, $_POST['nic']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $phonenumber = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $occupation = mysqli_real_escape_string($mysqli, $_POST['occupation']);
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($mysqli, $_POST['gender']) : '';
    $registereddate = mysqli_real_escape_string($mysqli, $_POST['registered_date']);

    // Perform update
    $query = "UPDATE residents SET 
              full_name = '$fullname', 
              dob = '$dateofbirth', 
              nic = '$nic', 
              address = '$address', 
              phone = '$phonenumber', 
              email = '$email', 
              occupation = '$occupation', 
              gender = '$gender', 
              registered_date = '$registereddate'  
              WHERE id = '$id'";

    $result = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status | Residence Verification</title>
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
        
        .status-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            text-align: center;
        }
        
        .status-icon {
            font-size: 72px;
            margin-bottom: 20px;
        }
        
        .success {
            color: #10B981;
        }
        
        .error {
            color: #EF4444;
        }
        
        .status-title {
            color: #1F2937;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .status-message {
            color: #4B5563;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .home-btn {
            display: inline-block;
            padding: 12px 28px;
            background: #4F46E5;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        
        .home-btn:hover {
            background: #4338CA;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }
        
        .updated-details {
            background: #F9FAFB;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: left;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 10px;
        }
        
        .detail-label {
            font-weight: 500;
            color: #4F46E5;
            min-width: 150px;
        }
        
        .detail-value {
            color: #1F2937;
        }
        
        @media (max-width: 600px) {
            .status-card {
                padding: 30px 20px;
            }
            
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                margin-bottom: 5px;
                min-width: unset;
            }
        }
    </style>
</head>
<body>
    <div class="status-card">
        <?php if($result): ?>
            <div class="status-icon success">✓</div>
            <h1 class="status-title">Update Successful!</h1>
            <p class="status-message">The resident information has been successfully updated in our records.</p>
            
            <div class="updated-details">
                <h3 style="color: #4F46E5; margin-bottom: 15px; text-align: center;">Updated Information</h3>
                <div class="detail-row">
                    <span class="detail-label">Full Name:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($fullname); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date of Birth:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($dateofbirth); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">NIC Number:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($nic); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Address:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($address); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Phone Number:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($phonenumber); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($email); ?></span>
                </div> 
                <div class="detail-row">
                    <span class="detail-label">Occupation:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($occupation); ?></span>
                </div> 
                <div class="detail-row">
                    <span class="detail-label">Gender:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($gender); ?></span>
                </div>  
                <div class="detail-row">
                    <span class="detail-label">Registered Date:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($registereddate); ?></span>
                </div>  
            </div>
        <?php else: ?>
            <div class="status-icon error">✗</div>
            <h1 class="status-title">Update Failed</h1>
            <p class="status-message">We encountered an error while updating the record.</p>
            <div class="updated-details">
                <p style="color: #EF4444;">Error: <?php echo htmlspecialchars(mysqli_error($mysqli)); ?></p>
            </div>
        <?php endif; ?>
        
        <a href="forms.php" class="home-btn">Return to Dashboard</a>
    </div>
</body>
</html>
<?php
    // Close connection
    mysqli_close($mysqli);
} else {
    // If someone accesses this page directly without submitting the form
    header("Location: forms.php");
    exit();
}
?>