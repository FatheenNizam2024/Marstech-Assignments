<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Application Form</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 750px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-size: 1.0em;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="file"], textarea, select {
            width: 70%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 10px;
        }
        .skills-container label {
            font-weight: normal;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        textarea {
            resize: vertical;
        }
    </style>
    </head>
    <body>
    <?php
    session_start();

    $FullnameErr = $EmailErr = $ContactnumberErr = $DateofBirthErr = 
    $genderErr = $PositionAppliedForErr = $ResumeErr = $CoverLetterErr = $LinkedInProfileErr =
    $WorkExperienceErr = $SkillsErr ="";
    $Fullname = $Email = $Contactnumber = $DateofBirth = 
    $gender = $PositionAppliedFor = $Resume = $CoverLetter = $LinkedInProfile =
    $WorkExperience = ""; $Skills = [];



    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["Fullname"]))
        {
            $FullnameErr = "Full Name Required";
        }
        else
        {
            $Fullname = test_input($_POST["Fullname"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $Fullname))
            {
                $FullnameErr = "Only letters and white space allowed";
            }
            // Store the data in the session
            $_SESSION["Fullname"] = $Fullname;
        }
        if(empty($_POST["Email"]))
        {
            $EmailErr = "Email Required";
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
        if(empty($_POST["Contactnumber"]))
        {
            $ContactnumberErr = "Contact number Required";
        }
        else
        {
            $Contactnumber = test_input($_POST["Contactnumber"]);
            if(!preg_match("/^[0-9]{10}$/", $Contactnumber))
            {
                $ContactnumberErr = "Only numbers with maximum 10 digits allowed";
            }
            $_SESSION["Contactnumber"] = $Contactnumber;
        }
        if(empty($_POST["DateofBirth"]))
        {
            $DateofBirthErr = "Date of Birth Required";
        }
        else
        {
            $DateofBirth = test_input($_POST["DateofBirth"]);
            $_SESSION["DateofBirth"] = $DateofBirth;
        }
        if(empty($_POST["gender"]))
        {
            $genderErr = "Gender Required";
        }
        else
        {
            $gender = test_input($_POST["gender"]);
            $_SESSION["gender"] = $gender;
        }
        if(empty($_POST["PositionAppliedFor"]))
        {
            $PositionAppliedForErr = "Position Applied Required";
        }
        else
        {
            $PositionAppliedFor = test_input($_POST["PositionAppliedFor"]);
            $_SESSION["PositionAppliedFor"] = $PositionAppliedFor;
        }
        if(empty($_FILES["Resume"]["name"])) //$_FILES is used to upload files
        {
            $ResumeErr = "Resume Required";
        }
        else
        {
            $target_dir = "";
            $target_file = $target_dir . basename($_FILES["Resume"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($fileType != "pdf" && $fileType != "doc" && $fileType != "docx")
            {
                $ResumeErr = "Only pdf, doc, docx files are allowed";
            }
            
            if ($_FILES["Resume"]["error"] == UPLOAD_ERR_OK) {
                $Resume = $_FILES["Resume"]["name"]; // Store the file name
                $_SESSION["Resume"] = $Resume;
            } else {
                $ResumeErr = "Error uploading file.";
            }
        }
        if(empty($_POST["CoverLetter"]))
        {
            $CoverLetterErr = "Cover Letter Required";
        }
        else
        {
            $CoverLetter = test_input($_POST["CoverLetter"]);
            $_SESSION["CoverLetter"] = $CoverLetter;
        }
        if(empty($_POST["LinkedInProfile"]))
        {
            $LinkedInProfileErr = "LinkedIn Profile Required";
        }
        else
        {
            $LinkedInProfile = test_input($_POST["LinkedInProfile"]);
            $_SESSION["LinkedInProfile"] = $LinkedInProfile;
        }
        if(empty($_POST["WorkExperience"]))
        {
            $WorkExperienceErr = "Work Experience Required";
        }
        else
        {
            $WorkExperience = test_input($_POST["WorkExperience"]);
            $_SESSION["WorkExperience"] = $WorkExperience;
            
        }
        if(empty($_POST["Skills"]))
        {
            $SkillsErr = "Skills Required";
        }
        else
        {
            foreach ($_POST["Skills"] as $skill) {
                $Skills[] = test_input($skill);
            } 
            $_SESSION["Skills"] = $Skills;
        }
         // Redirect to the output page if there are no errors
         if(empty($FullnameErr) && empty($EmailErr) && empty($ContactnumberErr) && empty($DateofBirthErr) && 
         empty($genderErr) && empty($PositionAppliedForErr) && empty($ResumeErr) && empty($CoverLetterErr) && 
         empty($LinkedInProfileErr) && empty($WorkExperienceErr) && empty($SkillsErr))
         {
             header("Location: Output_Job_Application_form.php");
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
    <div class="form-container">
    <h1>Job Application Form</h1>
    <span class = "error"> * Required Fields </span><br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" target="_blank">

    <label for="Fullname">Full Name</label>
            <input type="text" name="Fullname" id="Fullname" placeholder="Enter your full name" size="50">
            <span class="error">* <?php echo $FullnameErr; ?></span><br><br>

            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email" placeholder="Enter your email" size="50">
            <span class="error">* <?php echo $EmailErr; ?></span><br><br>

            <label for="Contactnumber">Contact Number</label>
            <input type="text" name="Contactnumber" id="Contactnumber" placeholder="Enter your contact number" size="50">
            <span class="error">* <?php echo $ContactnumberErr; ?></span><br><br>

            <label for="DateofBirth">Date of Birth</label>
            <input type="date" name="DateofBirth" id="DateofBirth" size="50">
            <span class="error">* <?php echo $DateofBirthErr; ?></span><br><br>

            <label>Gender:</label>
            <input type="radio" name="gender" value="Male" id="Male">Male
            <input type="radio" name="gender" value="Female" id="Female">Female
            <span class="error">* <?php echo $genderErr; ?></span><br><br>

            <label for="PositionAppliedFor">Position Applied For</label>
            <select name="PositionAppliedFor" id="PositionAppliedFor">
                <option value="">Select Position</option>
                <option value="Web Developer" <?php if($PositionAppliedFor == "Web Developer") echo "selected"; ?>>Web Developer</option>
                <option value="Software Developer" <?php if($PositionAppliedFor == "Software Developer") echo "selected"; ?>>Software Developer</option>
                <option value="Data Analyst" <?php if($PositionAppliedFor == "Data Analyst") echo "selected"; ?>>Data Analyst</option>
                <option value="Data Scientist" <?php if($PositionAppliedFor == "Data Scientist") echo "selected"; ?>>Data Scientist</option>
                <option value="AI Engineer" <?php if($PositionAppliedFor == "AI Engineer") echo "selected"; ?>>AI Engineer</option>
            </select>
            <span class="error">* <?php echo $PositionAppliedForErr; ?></span><br><br>

            <label for="Resume">Upload Resume</label>
            <input type="file" name="Resume" id="Resume">
            <span class="error">* <?php echo $ResumeErr; ?></span><br><br>

            <label for="CoverLetter">Cover Letter</label>
            <textarea name="CoverLetter" id="CoverLetter" rows="10" cols="50" placeholder="Enter your cover letter"></textarea>
            <span class="error">* <?php echo $CoverLetterErr; ?></span><br><br>

            <label for="LinkedInProfile">LinkedIn Profile</label>
            <input type="text" name="LinkedInProfile" id="LinkedInProfile" placeholder="Your LinkedIn Profile" size="50">
            <span class="error">* <?php echo $LinkedInProfileErr; ?></span><br><br>

            <label for="WorkExperience">Work Experience (Years)</label>
            <input type="text" name="WorkExperience" id="WorkExperience" placeholder="Your Work Experience" size="50">
            <span class="error">* <?php echo $WorkExperienceErr; ?></span><br><br>

            <label>Skills:</label>
            <div class="skills-container">
                <label><input type="checkbox" name="Skills[]" value="html" <?php if(in_array("html", $Skills)) echo "checked"; ?>> HTML</label>
                <label><input type="checkbox" name="Skills[]" value="css" <?php if(in_array("css", $Skills)) echo "checked"; ?>> CSS</label>
                <label><input type="checkbox" name="Skills[]" value="javascript" <?php if(in_array("javascript", $Skills)) echo "checked"; ?>> JavaScript</label>
                <label><input type="checkbox" name="Skills[]" value="php" <?php if(in_array("php", $Skills)) echo "checked"; ?>> PHP</label><span class="error">* <?php echo $SkillsErr; ?></span><br><br>
            </div>
            <input type="submit" name="Apply" value="Apply">
        </form>
    </div>
</body>
</html>