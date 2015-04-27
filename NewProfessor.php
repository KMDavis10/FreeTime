<html>
<body>
<?php 
	$file = 'professors.txt';
	// Open the file to get existing content
	$current = file_get_contents($file, FILE_USE_INCLUDE_PATH);
	// Append a new person to the file
	$prof = $_POST["professorName"];
	$help = $_POST["professorHelp"];
	$clarity = $_POST["professorClarity"];
	$easy = $_POST["professorEasy"];
	$current .= "\n" . $prof . ", " . $help . ", " . $clarity . ", " . $easy . ", ";
	// Write the contents back to the file
	file_put_contents($file, $current);
	
?>

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