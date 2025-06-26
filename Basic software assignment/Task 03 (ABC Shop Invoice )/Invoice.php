<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .shop-info {
            text-align: center;
            margin-bottom: 30px;
        }

        .shop-info p {
            margin: 5px 0;
            color: #555;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }

        td {
            color: #555;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total-row td {
            font-weight: bold;
            background-color: #f8f9fa;
        }

        .total-row td:last-child {
            color: #333;
        }

        .discount-row td {
            color: #e74c3c;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
session_start();
    $Shop = $_SESSION["Shop"];
    $Address = $_SESSION["Address"];
    $Contact = $_SESSION["Contact"];
    $Email = $_SESSION["Email"];
    $items = $_SESSION["items"];

    $Total = 0;
    $TotalDiscount = 0; // Initialize total discount
    foreach ($items as $item) {
        $quantity = $item["Quantity"];
        $price = $item["Price"];
        $itemTotal = $quantity * $price;
        $discount = 0;

        if($quantity > 50)
        {
            $freeItems = intval($quantity / 30) * 5;
            $discount = $freeItems * $price; // Discount is the cost of free items
            $itemTotal = ($quantity - $freeItems) * $price;
        } elseif ($quantity > 20) 
        {
            $discount = $itemTotal * 0.1; // 10% of the item total
            $itemTotal *=0.9;
        }
        elseif ($quantity > 10) 
        {
            $discount = $itemTotal * 0.02; // 2% of the item total
            $itemTotal *=0.98;
        }
        $Total += $itemTotal;
        $TotalDiscount += $discount; // Add this item's discount to the total discount
    }
    
?>

    <div class="invoice-container">
    <h1><center><?php echo $Shop ?></center></h1>
    <div class="shop-info">
    <p><?php echo $Address; ?></p>
    <p>Contact: <?php echo $Contact; ?></p>
    <p>Email: <?php echo $Email; ?></p>
    <table>
    <hr>
    <tr>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
   </tr>
   <?php foreach ($items as $item): ?>
   <tr>
        <td><?php echo $item['Code'] ?></td>
        <td><?php echo $item['Name'] ?></td>
        <td><?php echo $item['Quantity'] ?></td>
        <td><?php echo $item['Price'] ?></td>
   </tr>
   <?php endforeach; ?>
   <tr>
        <td></td>
        <td></td>
        <td><b><?php echo "Discount" ?></b></td>
        <td><b><?php echo $TotalDiscount ?></b></td>
   </tr>
   <tr>
        <td></td>
        <td></td>
        <td><b><?php echo "Total" ?></b></td>
        <td><b><?php echo $Total ?><b></td>
   </tr>

   
   </table>

</body>
</html>