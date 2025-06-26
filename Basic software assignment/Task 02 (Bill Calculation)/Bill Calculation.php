<!DOCTYPE html>
<html>
<head>
    <title>Bill Calculation</title>
    <style>.error{color:red}</style>
</head>
<body>
    <?php
    session_start();
    $BiscuitsErr = $NoodlesErr = $BreadErr = $MilkErr = $EggsErr = $DhalErr = "";
    $Biscuits = $Noodles = $Bread = $Milk = $Eggs = $Dhal = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["Biscuits"]))
        {
            $BiscuitsErr = " Input required";
        }
        else
        {
            $Biscuits = test_input($_POST["Biscuits"]);
            if(!preg_match("/^[0-9]*$/",$Biscuits))
            {
                $BiscuitsErr = "Only numbers are allowed";
            }
            $_SESSION["Biscuits"] = $Biscuits;
        }
        if(empty($_POST["Noodles"]))
        {
            $NoodlesErr = " Input required";
        }
        else
        {
            $Noodles = test_input($_POST["Noodles"]);
            if(!preg_match("/^[0-9]*$/",$Noodles))
            {
                $NoodlesErr = "Only numbers are allowed";
            }
            $_SESSION["Noodles"] = $Noodles;
        }
        if(empty($_POST["Bread"]))
        {
            $BreadErr = " Input required";
        }
        else
        {
            $Bread = test_input($_POST["Bread"]);
            if(!preg_match("/^[0-9]*$/",$Bread))
            {
                $BreadErr = "Only numbers are allowed";
            }
            $_SESSION["Bread"] = $Bread;
        }
        if(empty($_POST["Milk"]))
        {
            $MilkErr = " Input required";
        }
        else
        {
            $Milk = test_input($_POST["Milk"]);
            if(!preg_match("/^[0-9]*$/",$Milk))
            {
                $MilkErr = "Only numbers are allowed";
            }
            $_SESSION["Milk"] = $Milk;
        }
        if(empty($_POST["Eggs"]))   
        {
            $EggsErr = " Input required";
        }
        else
        {
            $Eggs = test_input($_POST["Eggs"]);
            if(!preg_match("/^[0-9]*$/",$Eggs))
            {
                $EggsErr = "Only numbers are allowed";
            }
            $_SESSION["Eggs"] = $Eggs;
        }
        if(empty($_POST["Dhal"]))
        {
            $DhalErr = " Input required";
        }
        else
        {
            $Dhal = test_input($_POST["Dhal"]);
            if(!preg_match("/^[0-9]*$/",$Dhal))
            {
                $DhalErr = "Only numbers are allowed";
            }
            $_SESSION["Dhal"] = $Dhal;
        }
        if(empty($BiscuitsErr) && empty($NoodlesErr) && empty($BreadErr) && empty($MilkErr) && empty($EggsErr) && empty($DhalErr))
         {
             header("Location: Your Total Bill.php");
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
    <h1>Grocery Bill Calculation</h1>
    <form method="post" action="<?php echo htmlspecialchars("$_SERVER[PHP_SELF]");?>" >
    Biscuits (Rs50 each): <input type = "text" name = "Biscuits"><span class = "error"><?php echo $BiscuitsErr; ?></span><br><br>
    Noodles (Rs100 each): <input type = "text" name = "Noodles"><span class = "error"><?php echo $NoodlesErr; ?></span><br><br>
    Bread (Rs40 each): <input type = "text" name = "Bread"><span class = "error"><?php echo $BreadErr; ?></span><br><br>
    Milk (Rs60 each): <input type = "text" name = "Milk"><span class= "error"><?php echo $MilkErr; ?></span><br><br>
    Eggs (Rs5 each): <input type = "text" name = "Eggs"><span class = "error"><?php echo $EggsErr; ?></span><br><br>
    Dhal (Rs75 each kg): <input type = "text" name = "Dhal"><span class = "error" ><?php echo $DhalErr; ?></span><br><br>


    <input type = "submit" name="submit" value="Calculate Bill">
    </form>
</body>
</html>