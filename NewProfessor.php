<html>
<body>
<?php 
// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: NewProfessor.php
// Description: This class takes informaton about a professor from NewProfessor.html and appends it to the professor file
// 				The information that is appended can then be used in later calculations.
// Last modified on: 4/27/15


/** Opens professors.txt, gets the post data from NewProfessor.html, and appends it to the text file */
	$file = 'professors.txt';
	$current = file_get_contents($file, FILE_USE_INCLUDE_PATH);
	$prof = $_POST["professorName"];
	$help = $_POST["professorHelp"];
	$clarity = $_POST["professorClarity"];
	$easy = $_POST["professorEasy"];
	$current .= "\n" . $prof . ", " . $help . ", " . $clarity . ", " . $easy . ", ";
	file_put_contents($file, $current);
	
?>

<!-- Displays a success message to the user with the professor name that they added & gives them the option to 
     go back to the main page -->
<body background="background.png">
<link rel="stylesheet" href="style2.css"> 
<div id = "freeTime2">
<?php echo "$prof" ?> added successfully
</div>
<form action="Test2.php" method="post">
<div class = "button">
<button type="submit">Go back </button>
</div>
</form>
</body>
</html>