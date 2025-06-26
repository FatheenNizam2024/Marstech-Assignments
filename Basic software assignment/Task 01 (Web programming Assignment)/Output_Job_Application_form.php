<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Application Form</title>
    </head>
    <body>
    <?php
        session_start();
        $Fullname = isset($_SESSION["Fullname"]) ? htmlspecialchars( $_SESSION["Fullname"]) :"N/A";
        $Email = isset($_SESSION["Email"]) ? htmlspecialchars( $_SESSION["Email"]) :"N/A";  
        $Contactnumber = isset($_SESSION["Contactnumber"]) ? htmlspecialchars( $_SESSION["Contactnumber"]) :"N/A"; 
        $DateofBirth = isset($_SESSION["DateofBirth"]) ? htmlspecialchars( $_SESSION["DateofBirth"]) :"N/A"; 
        $gender = isset($_SESSION["gender"]) ? htmlspecialchars( $_SESSION["gender"]) :"N/A"; 
        $PositionAppliedFor = isset($_SESSION["PositionAppliedFor"]) ? htmlspecialchars( $_SESSION["PositionAppliedFor"]) :"N/A"; 
        $Resume = isset($_SESSION["Resume"]) ? htmlspecialchars( $_SESSION["Resume"]) :"N/A"; 
        $CoverLetter = isset($_SESSION["CoverLetter"]) ? htmlspecialchars( $_SESSION["CoverLetter"]) :"N/A";     
        $LinkedInProfile= isset($_SESSION["LinkedInProfile"]) ? htmlspecialchars( $_SESSION["LinkedInProfile"]) :"N/A";   
        $WorkExperience= isset($_SESSION["WorkExperience"]) ? htmlspecialchars( $_SESSION["WorkExperience"]) :"N/A"; 
        $Skills= isset($_SESSION["Skills"]) ? ( $_SESSION["Skills"]) :"N/A"; 

        session_unset();
        session_destroy();
        ?>
        <h2>Output</h2>
        <?php
                echo $Fullname;
                echo "<br>";
                echo $Email;
                echo "<br>";
                echo $Contactnumber;
                echo "<br>";    
                echo $DateofBirth;  
                echo "<br>";
                echo $gender;
                echo "<br>";
                echo $PositionAppliedFor;
                echo"<br>";
                echo $Resume;   
                echo "<br>";
                echo $CoverLetter;
                echo "<br>";
                echo $LinkedInProfile;
                echo "<br>";
                echo $WorkExperience;
                echo "<br>";
                echo implode(", ", $Skills);
                echo "<br>";
        ?>
        
    </body>
</html>