<?php
// Start session at the VERY TOP of the file before any output
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
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
            padding: 40px 20px;
        }
        
        .results-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            animation: fadeIn 0.8s ease-out;
        }
        
        h4 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .result-card {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #4f46e5;
        }
        
        .result-field {
            display: flex;
            margin-bottom: 12px;
        }
        
        .field-label {
            font-weight: 600;
            color: #4f46e5;
            min-width: 120px;
        }
        
        .field-value {
            color: #1e293b;
            padding-left: 30px;

        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .action-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .modify-btn {
            background: #4f46e5;
            color: white;
        }
        
        .modify-btn:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }
        
        .delete-btn {
            background: #f43f5e;
            color: white;
        }
        
        .delete-btn:hover {
            background: #e11d48;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(244, 63, 94, 0.3);
        }
        
        .no-results {
            text-align: center;
            color: #64748b;
            font-size: 18px;
            padding: 40px 0;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .back-link:hover {
            color: #4338ca;
            text-decoration: underline;
        }
        
        hr {
            border: none;
            height: 1px;
            background: #e2e8f0;
            margin: 25px 0;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 768px) {
            .results-container {
                padding: 30px 20px;
            }
            
            .result-field {
                flex-direction: column;
            }
            
            .field-label {
                margin-bottom: 5px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="results-container">
        <?php
        if (isset($_POST['search_button'])) {
            // Sanitize user input
            $search_query = mysqli_real_escape_string($mysqli, $_POST['search_query']);

            // Search both full name and NIC
            $query = "SELECT * FROM residents 
                      WHERE full_name LIKE '%$search_query%' 
                         OR nic LIKE '%$search_query%'";

            $result = mysqli_query($mysqli, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                echo "<h4>Search Results</h4>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='result-card'>";
                    echo "<div class='result-field'><span class='field-label'>ID:</span><span class='field-value'>" . htmlspecialchars($row['id']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Name:</span><span class='field-value'>" . htmlspecialchars($row['full_name']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Date of Birth:</span><span class='field-value'>" . htmlspecialchars($row['dob']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>NIC:</span><span class='field-value'>" . htmlspecialchars($row['nic']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Address:</span><span class='field-value'>" . htmlspecialchars($row['address']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Phone:</span><span class='field-value'>" . htmlspecialchars($row['phone']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Email:</span><span class='field-value'>" . htmlspecialchars($row['email']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Occupation:</span><span class='field-value'>" . htmlspecialchars($row['occupation']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Gender:</span><span class='field-value'>" . htmlspecialchars($row['gender']) . "</span></div>";
                    echo "<div class='result-field'><span class='field-label'>Registered Date:</span><span class='field-value'>" . htmlspecialchars($row['registered_date']) . "</span></div>";
                    
                    echo "<div class='action-buttons'>";
                    echo "<a href='update.php?id=" . $row['id'] . "' class='action-btn modify-btn'>Modify</a>";
                    echo "<a href='delete.php?id=" . $row['id'] . "' class='action-btn delete-btn'>Delete</a>";
                    echo "</div>";
                    
                    // Store data in session
                    $_SESSION['row_data'] = $row;
                }
            } else {
                echo "<div class='no-results'>No matching records found.</div>";
            }
        }
        ?>
        
        <a href="index.html" class="back-link">← Return to Home</a>
    </div>
</body>
</html>