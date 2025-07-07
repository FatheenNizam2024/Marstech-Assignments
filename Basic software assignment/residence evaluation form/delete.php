<?php
// Start session at the very top
session_start();
include("config.php");

if(isset($_SESSION['row_data'])) {
    $row = $_SESSION['row_data'];
    $id = $row['id'];

    // Perform deletion
    $result = mysqli_query($mysqli, "DELETE FROM residents WHERE id = $id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Status | Residence Verification</title>
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
        
        .delete-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
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
        
        h1 {
            color: #1F2937;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        p {
            color: #4B5563;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .deleted-info {
            background: #F9FAFB;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: left;
        }
        
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        
        .info-label {
            font-weight: 500;
            color: #4F46E5;
            min-width: 120px;
        }
        
        .info-value {
            color: #1F2937;
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
            font-size: 16px;
        }
        
        .home-btn:hover {
            background: #4338CA;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 600px) {
            .delete-container {
                padding: 30px 20px;
            }
            
            .info-row {
                flex-direction: column;
            }
            
            .info-label {
                margin-bottom: 5px;
                min-width: unset;
            }
        }
    </style>
</head>
<body>
    <div class="delete-container">
        <?php if($result): ?>
            <div class="status-icon success">✓</div>
            <h1>Record Successfully Deleted</h1>
            <p>The resident record has been permanently removed from the system.</p>
            
            <div class="deleted-info">
                <div class="info-row">
                    <span class="info-label">Deleted ID:</span>
                    <span class="info-value"><?php echo htmlspecialchars($id); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Name:</span>
                    <span class="info-value"><?php echo htmlspecialchars($row['full_name'] ?? 'N/A'); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">NIC:</span>
                    <span class="info-value"><?php echo htmlspecialchars($row['nic'] ?? 'N/A'); ?></span>
                </div>
            </div>
        <?php else: ?>
            <div class="status-icon error">✗</div>
            <h1>Deletion Failed</h1>
            <p>We encountered an error while attempting to delete the record.</p>
            <div class="deleted-info">
                <p style="color: #EF4444;">Error: <?php echo htmlspecialchars(mysqli_error($mysqli)); ?></p>
            </div>
        <?php endif; ?>
        
        <a href="forms.php" class="home-btn">Return to Dashboard</a>
    </div>
</body>
</html>
<?php
} else {
    // If session data doesn't exist
    header("Location: forms.php");
    exit();
}
?>