<!DOCTYPE html>
<html>
<head>
    <title>Your Total Bill</title>
</head>
<body>
    <h1>Your Total Bill</h1>
    <?php
    session_start();
    if (isset($_SESSION["Biscuits"])  && isset($_SESSION["Noodles"]) && isset($_SESSION["Bread"])  && isset($_SESSION["Milk"])  && isset($_SESSION["Eggs"])  && isset($_SESSION["Dhal"]))
    {
        $Biscuits = 50 * $_SESSION["Biscuits"];
        $Noodles = 100 * $_SESSION["Noodles"];
        $Bread = 40 * $_SESSION["Bread"];
        $Milk = 60 * $_SESSION["Milk"];
        $Eggs = 5 * $_SESSION["Eggs"];
        $Dhal = 75 * $_SESSION["Dhal"];
        $Total = $Biscuits + $Noodles + $Bread + $Milk + $Eggs + $Dhal;
    }
    else
    {
        $Total = 0;
    }
    echo "Total Bill is: Rs$Total";
    echo "<br>";
    echo "<br>";
    ?>
    <a href ="Bill Calculation.php">Go Back</a>
</body>
</html>