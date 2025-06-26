<html>
<body>

Welcome <?php echo $_POST["FullName"]; ?><br>
Your email address is: <?php echo $_POST["Email"]; ?><br>
Your Contact Number is: <?php echo $_POST["ContactNumber"]; ?><br>
Your Gender is: <?php echo $_POST["gender"]; ?><br>
Position applied for: <?php echo $_POST["PositionAppliedFor"]; ?><br>
Work Experience: <?php echo $_POST["WorkExperience"]; ?><br>
Work Skills: 
<?php
if (isset($_POST['Skills'])) {
    foreach ($_POST['Skills'] as $skill) {
        echo htmlspecialchars($skill) . "<br>";
    }
} else {
    echo "No skills selected.";
}
?>

</body>
</html>