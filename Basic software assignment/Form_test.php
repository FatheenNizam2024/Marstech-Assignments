<!DOCTYPE html>
<body>
    <head>
        <style>
            .error{color:red;}
        </style>
    </head>
    <body>

    <?php
    $nameErr = $emailErr =$websiteErr = $commentErr = $genderErr = "";
    $name = $email = $website = $comment = $gender = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["name"]))
        {
            $nameErr = "Name is important";
        }
        else
        {
            $name = test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/",$name))
            {
                $nameErr = "Only letters and white space allowed";
            }

        }
        if(empty($_POST["email"]))
        {
            $emailErr = "Email is important";
        }
        else
        {
            $email = test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Invalid email";
            }
        }
        if(empty($_POST["website"]))
        {
            $websiteErr = "";
        }
        else
        {
            $website = test_input($_POST["website"]);
            if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[a-z0-9+&@#\/%=~_|]/i",$website))
            {
                $websiteErr = "Invalid Url";
            }
        }
        if(empty($_POST["comment"]))
        {
            $commentErr = "";
        }
        else
        {
            $comment = test_input($_POST["comment"]);
        }
        if(empty($_POST["gender"]))
        {
            $genderErr = "Gender is important"; 
        }
        else
        {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(($data));
        return $data;
    }

 ?>

    <h2>PHP FORM Test</h2>
    <span class ="error"> * Required </span><br>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name:<input type="text" name="name" value = "<?php echo $name; ?>"><span class = "error"> * <?php echo $nameErr; ?> </span><br><br>
    Email:<input type="email" name="email" value="<?php echo $email; ?>"><span class = "error"> * <?php echo $emailErr; ?> </span><br><br>
    Website:<input type="text" name="website" value = "<?php echo $website; ?>"><span class = "error"><?php echo $websiteErr; ?> </span><br><br>

    comment:<textarea name="comment" rows="10" cols="50"><?php echo $comment; ?></textarea><br><br>
    Gender: <input type="radio" name="gender" <?php if(isset($gender) && $gender == "Male") echo "checked"; ?> value="Male">Male
            <input type="radio" name="gender" <?php if(isset($gender) && $gender == "Female") echo "checked"; ?> value="Female">Female
            <input type="radio" name="gender" <?php if(isset($gender) && $gender == "Other") echo "checked"; ?>value="Other">Other <span class = "error"> * <?php echo $genderErr; ?> </span><br><br>


    <input type="submit" name="submit" value="Submit">

    </body>

    <?php
    echo "<h2>Output</h2>";
    echo "$name";
    echo "<br>";
    echo "$email";
    echo "<br>";
    echo "$website";
    echo "<br>";
    echo "$comment";
    echo "<br>";
    echo "$gender";
    echo "<br>";
    ?>
 </body>   
</html>