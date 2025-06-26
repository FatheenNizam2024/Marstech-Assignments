<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color:red;}
</style>
</head>
<body> 
    <?php
    $nameErr = $emailErr = $websiteErr = $commentErr = $genderErr = "";
    $name = $email = $website = $comment = $gender = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["name"]))
            {
                $nameErr = "Name is required";
            }
            else
            {
                $name = test_input($_POST["name"]);
                if(!preg_match("/^[a-zA-Z-']*$/",$name))
                {
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if(empty($_POST["email"]))
            {
                $emailErr = "Email is required";
            }
            else
            {
                $email=test_input($_POST["email"]);
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    $emailErr = "Invalid email format";
                }
            }
            if(empty($_POST["website"]))
            {
                $websiteErr = "";
                if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website))
                {
                    $websiteErr = "Invalid URL";
                }
            }
            else
            {
                $website=test_input($_POST["website"]);
            }
            if(empty ($_POST["comment"]))
            {
                $commentErr = "";
            }
            else
            {
                $comment = test_input($_POST["comment"]);
            }
            if(empty($_POSt["gender"]))
            {
                $genderErr = "Gender is required";
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
            $data = htmlspecialchars($data);
            return $data;
        }
    ?> 

    <h2>PHP Form Validation Examples</h2>
    <p><span class = "error">* Required Field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type = "text" name = "name"><span class ="error">*<?php echo $nameErr;?></span><br><br>
    E-mail: <input type = "text" name = "email"><span class ="error">*<?php echo $emailErr;?></span><br><br>
    Website: <input type = "text" name = "website"><br><br>
    Comment: <textarea name = "comment" rows="10" cols="50"></textarea><br><br> 
    Gender: <input type = "radio" name="gender" value = "Female">Female
            <input type = "radio" name="gender" value = "Male">Male
            <input type = "radio" name="gender" value = "other">other <span class="error">*<?php echo $genderErr;?></span> <br><br>

    <input type = "submit" name="submit" value="Submit">
    </form>

    <?php
   echo "<h2> Output </h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>

</body>
<html>