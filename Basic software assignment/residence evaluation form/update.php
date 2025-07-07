<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Resident Information</title>
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
        
        .update-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 40px;
            animation: fadeIn 0.8s ease-out;
        }
        
        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }
        
        .submit-btn {
            width: 100%;
            padding: 15px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .submit-btn:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }
        
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .back-link:hover {
            color: #4338ca;
            text-decoration: underline;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 600px) {
            .update-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <?php
    session_start();
    
    if (isset($_SESSION['row_data'])) {
        $row = $_SESSION['row_data'];
    ?>
    <div class="update-container">
        <h2>Update Resident Information</h2>
        
        <form method="POST" action="update_process.php">
            <!--<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id'] ?? ''); ?>">-->
            
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($row['full_name'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="text" id="dob" name="dob" value="<?php echo htmlspecialchars($row['dob'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="nic">NIC Number</label>
                <input type="text" id="nic" name="nic" value="<?php echo htmlspecialchars($row['nic'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($row['address'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($row['email'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <input type="text" id="occupation" name="occupation" value="<?php echo htmlspecialchars($row['occupation'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($row['gender'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="registered_date">Registered Date</label>
                <input type="text" id="registered_date" name="registered_date" value="<?php echo htmlspecialchars($row['registered_date'] ?? ''); ?>">
            </div>
            
            <button type="submit" name="submit" class="submit-btn">Update Information</button>
        </form>
        
        <a href="index.html" class="back-link">← Return to Home</a>
    </div>
    <?php
    } else {
        echo "<div class='update-container'><p>No resident data found. Please search for a resident first.</p></div>";
    }
    ?>
</body>
</html>