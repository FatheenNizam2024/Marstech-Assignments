<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Resident</title>
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
        
        .search-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 40px;
            text-align: center;
            animation: fadeIn 0.8s ease-out;
        }
        
        .search-icon {
            font-size: 50px;
            color: #4f46e5;
            margin-bottom: 20px;
        }
        
        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 28px;
        }
        
        .search-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .search-input {
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .search-input:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }
        
        .search-input::placeholder {
            color: #94a3b8;
        }
        
        .search-btn {
            padding: 15px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .search-btn:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
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
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 600px) {
            .search-container {
                padding: 30px 20px;
            }
            
            h2 {
                font-size: 24px;
                margin-bottom: 20px;
            }
            
            .search-input, .search-btn {
                padding: 12px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="search-container">
        <div class="search-icon">🔍</div>
        <h2>Search Resident</h2>
        
        <form method="post" action="search_result.php" class="search-form">
            <input type="text" name="search_query" class="search-input" placeholder="Enter NIC or Full Name" required />
            <button type="submit" name="search_button" class="search-btn">Search Records</button>
        </form>
        
        <a href="index.html" class="back-link">← Return to Home</a>
    </div>
</body>
</html>