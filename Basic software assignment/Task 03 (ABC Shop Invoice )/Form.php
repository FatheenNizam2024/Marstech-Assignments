<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop Invoice</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .form-container {
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

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"] {
            width: 50%;
            padding: 5px;
            border: 3px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        .form-group input[type="text"]:focus {
            border-color: #3498db;
            outline: none;
        }

        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
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

        /* Button Styles */
        .form-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .form-buttons input[type="submit"],
        .form-buttons input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 0 10px;
        }

        .form-buttons input[type="submit"] {
            background-color: #3498db;
            color: #fff;
        }

        .form-buttons input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .form-buttons input[type="reset"] {
            background-color: #e74c3c;
            color: #fff;
        }

        .form-buttons input[type="reset"]:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<?php
session_start();
$ShopErr = $AddressErr = $ContactErr = $EmailErr = $CodeErr = $NameErr = $QuantityErr = $PriceErr = "";
$Shop = $Address = $Contact = $Email = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["Shop"]))
    {
        $ShopErr = "Shop name is required";
    }
    else
    {
        $Shop = test_input($_POST["Shop"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/", $Shop))
        {
            $ShopErr = "Only letters and white space allowed";
        }
        $_SESSION["Shop"] = $Shop;
    }
    if(empty($_POST["Address"]))
    {
        $AddressErr = "Address is required";
    }
    else
    {
        $Address = test_input($_POST["Address"]);
        if (!preg_match("/^[a-zA-Z0-9-' ,.\/]*$/", $Address)) {
            $AddressErr = "Invalid Address Format";
        } 
        $_SESSION["Address"] = $Address;
    }
    if(empty($_POST["Contact"]))
    {
        $ContactErr = "Contact number is required";
    }
    else
    {
        $Contact = test_input($_POST["Contact"]);
        if(!preg_match("/^[0-9]{3}-?[0-9]{3}-?[0-9]{4}$/", $Contact))
        {
            $ContactErr = "Invalid Contact Format";
        }
        $_SESSION["Contact"] = $Contact;
    }
    if(empty($_POST["Email"]))
    {
        $EmailErr = "Email is required";
    }
    else
    {
        $Email = test_input($_POST["Email"]);
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
        {
            $EmailErr = "Invalid Email Format";
        }
        $_SESSION["Email"] = $Email;
    }
    // Handle multiple items
    $items = [];
    $errors = [];
    for ($i = 0; $i < 4; $i++) {

        // Assign values from $_POST
        $Code = test_input($_POST["Code"][$i]);
        $Name = test_input($_POST["Name"][$i]);
        $Quantity = test_input($_POST["Quantity"][$i]);
        $Price = test_input($_POST["Price"][$i]);

        // Validate Code
        if (empty($Code)) {
            $errors[$i]["Code"] = "Item Code is required";
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $Code)) {
            $errors[$i]["Code"] = "Invalid Code Format";
        }

        // Validate Name
        if (empty($Name)) {
            $errors[$i]["Name"] = "Item Name is required";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $Name)) {
            $errors[$i]["Name"] = "Invalid Name Format";
        }

        // Validate Quantity
        if (empty($Quantity)) {
            $errors[$i]["Quantity"] = "Quantity is required";
        } elseif (!preg_match("/^[0-9]*$/", $Quantity)) {
            $errors[$i]["Quantity"] = "Invalid Quantity Format";
        }

        // Validate Price
        if (empty($Price)) {
            $errors[$i]["Price"] = "Price is required";
        } elseif (!preg_match("/^[0-9]*$/", $Price)) {
            $errors[$i]["Price"] = "Invalid Price Format";
        }

        // If no errors, add the item to the list
        if (empty($errors[$i])) {
            $items[] = [
                'Code' => $Code,
                'Name' => $Name,
                'Quantity' => $Quantity,
                'Price' => $Price
            ];
        }
    }

    $_SESSION["items"] = $items;
    $_SESSION["errors"] = $errors;

    // Redirect to Invoice.php if there are no errors
    if (empty($ShopErr) && empty($AddressErr) && empty($ContactErr) && empty($EmailErr) && empty($errors)) {
        header("Location: Invoice.php");
        exit();
    }
}
    function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

?> 
    <form method="post" action="<?php echo htmlspecialchars("$_SERVER[PHP_SELF]");?>" ><br>
    <div class="form-group">Shop Name: <input type = "text" name = "Shop"><span class = "error"> <?php echo $ShopErr;?></div></span>
    <div class="form-group">Address : <input type = "text" name = "Address"><span class = "error"> <?php echo $AddressErr;?></span></div>
    <div class="form-group">Contact Number: <input type = "text" name = "Contact"><span class = "error"> <?php echo $ContactErr;?></span><div><br>
    <div class="form-group">Email Address: <input type = "text" name = "Email"><span class = "error"> <?php echo $EmailErr;?></span></div>

    <table>
    <thead>
    <tr>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
   </tr>
    </thead>
    <tbody>
   <?php for ($i = 0; $i < 4; $i++): ?>
    <tr>
        <td><input type="text" name="Code[]"><span class = "error"><?php echo isset($_SESSION["errors"][$i]["Code"]) ? 
        $_SESSION["errors"][$i]["Code"] : '';?></span></td>

        <td><input type="text" name="Name[]"><span class = "error"><?php echo isset($_SESSION["errors"][$i]["Name"]) ?
        $_SESSION["errors"][$i]['Name'] : '';?></span></td>

        <td><input type="text" name="Quantity[]"><span class = "error"><?php echo isset($_SESSION["errors"][$i]["Quantity"]) ?
        $_SESSION["errors"][$i]['Quantity'] : '';?></span></td>

        <td><input type="text" name="Price[]"><span class = "error"><?php echo isset ($_SESSION["errors"][$i]['Price']) ?
        $_SESSION["errors"][$i]['Price'] : '';?></span></td>
    </tr>
    <?php endfor; ?>
   </tbody>
   </table>
   <div class="form-buttons">
    <input type = "submit" name="submit" value="Submit">    
    <input type = "reset" name="Clear" value="Clear" >
   </div>
</form>
</body>
</html>
<?php
// Clear session errors after displaying them
if (isset($_SESSION["errors"])) {
    unset($_SESSION["errors"]);
}
?>