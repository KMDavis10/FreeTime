<?php

// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: welcome.php
// Description: This class takes in user-entered information from the initial page (Test2) and creates objects with it.
//				Information regarding courses goes into the courses array and information regarding professors goes into
// 				the professors array. These arrays are then passed to a single User object, which returns its calculations 
// 				back to this page. These calculations are then added to other information indicated by the user, subtracted
//				from a set amount, and displayed to the user. 
// Last modified on: 4/27/15


function __autoload($class_name) {
    include $class_name . '.php';
}
/** $reader - FileReader object that reads information about each professor and places them into objects */
$reader = new FileReader();
$professors = array();
$courseNames = array();
$courseLevels = array();
$majorRequirements = array();
$professorsExist = array();
$other = 0;
/** $courses - made up of Course objects, which are given information from the above arrays*/
$courses = array();
/** Counts for populating each of the course information arrays (professors, courseNames, etc.) */
$count1 = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
/** Retrieves user-entered information from Test2 and populates professors array */
foreach($_POST as $k => $v) {
	/** For each name that the user entered in Test2, we check to see if that professor exists in our Professor objects
	  * if it does not exist ($v was not set/was blank), then we say that the professor was unknown */
	if (strpos($k, 'professor') === 0 && empty($v)) {
		$professors[$count1] = $reader->getProfessor("unknown");
		$professorsExist[$count1] = false;
		$count1++;
	}
	else {
		/** Otherwise, we use $v and check if that professor is in our database */
		if(strpos($k, 'professor') === 0) {
			/** Add the professor object gotten from the professor name we gave the getProfessor method (if the name did
			  * not exist in the database, then it returns an "unknown" professor object, with 0 difficulty)*/
			$professors[$count1] = $reader->getProfessor($v);
			/** If that professor exists, then we update the professorsExist array (used for displaying to the user 
			  * if the professor they entered was in the database or not)*/
			if ($reader->getProfessorFound() == true) {
				$professorsExist[$count1] = true;
				$count1++;
			}
			/** If the professor was not found in the database, then we declare that position of the professorsExist array
			  * to be false, and this information will be displayed to the user later */
			else {
				$professorsExist[$count1] = false;
				$count1++;
			}
		}
	}
}
/** Retrieves user-entered information from Test2 and populates courseNames array */
foreach($_POST as $k => $v) {
/** For each course name that the user entered in Test 2, we check to see if that course exists in our database
  * if it does, then we add it to courseNames */
	if(strpos($k, 'course') === 0 && empty($v)) {
			$courseNames[$count2] = "UNK";
			$count2++;
	}
		/** If it is not set (the user did not define a course name), we say it is an unknown course, with 0 difficulty */
	else {
		if (strpos($k, 'course') === 0) {
			$courseNames[$count2] = $v;
			$count2++;
		}
	}	
}
/** Retrieves user-entered information from Test2 and populates courseLevel array */
foreach($_POST as $k => $v) {
	if(strpos($k, 'level') === 0) {
		if (isset($k)){
			$courseLevels[$count3] = $v;
			$count3++;
		}
		else {
			$courseLevels[$count3] = 0;
		}
	}
}
/** Retrieves user-entered information from Test2 and populates majorRequirements array */
foreach($_POST as $k => $v) {
	if(strpos($k, 'requirement') === 0) {
		if (isset($k)){
			$majorRequirements[$count4] = $v;
			$count4++;
		}
		else {
			$majorRequirements[$count4] = 0;
		}
	}
}
/** Creates each course with information from arrays */
for ($i = 0; $i < $count1; $i++) {
	$courses[$i] = new Course($courseNames[$i], $courseLevels[$i], $majorRequirements[$i], $professors[$i]);
	/** Displays an error to the user if there is an unknown course (either the course prefix is not in the database or it is blank)*/
	if ($professorsExist[$i] !=  null && $professors[$i] == true) {
		if (strpos($courseNames[$i], "UNK") !== false) {
			echo '<div align="center">';
			echo '<font color="red">Error! </font>';
			echo " Course does not exist in database - calculated " . $courses[$i]->getCourseName() . " as an unknown class with no additional information";
			echo '</div>';	
		}
		echo '<div id = "courses">';
		echo $courses[$i]; 
		echo '</div>';
	}
	else {
		/** Displays an error to the user if there is an unknown course (either the course prefix is not in the database or it is blank)*/
		if (strpos($courses[$i]->getCourseName(), "UNK") !== false) {
			echo '<div align="center">';
			echo '<font color="red">Error! </font>';
			echo " Course does not exist in database - calculated " . $courses[$i]->getCourseName() . " as an unknown class with no additional calculations";
			echo '</div>';	
		}
		/** Displays an error to the user if there is an unknown professor (left blank or does not exist)*/
		echo '<div align="center">';
		echo '<font color="red">Error! </font>';
		echo " Professor did not exist in database - calculated " . $courses[$i]->getCourseName() . $courses[$i]->getCourseLevel() . " without professor information";
		echo '</div>';
		echo '<div id = "courses">';
		echo $courses[$i]; 
		echo '</div>';
		
	}
}
/** Defines a User and passes them the courses */
$user = new User($courses, $professors);
/** Gets total difficulty for all classes */
$totalCourseDifficulty = $user->getAllCourseDifficulty();
/** Gets other variables from user */
$sports = $_POST["sportsHours"];
$jobs = $_POST["jobHours"];
$clubs = $_POST["clubHours"];
if (!empty($sports)) {
	$other += $sports;
}
if (!empty($jobs)) {
	$other += $jobs;
}
if (!empty($clubs)) {
	$other += $clubs;
}
/** Converts difficulty to hours */
$difficultyToHours = $totalCourseDifficulty/5;
$difficultyToHours += $other;
/** 100 comes from 168 (total hours in a week) - 56 (hours spent sleeping a week 8*7) - 12 (hours spent in class a week) */
$freeTime = 100 - $difficultyToHours;

?>


<body background="background.png">
<link rel="stylesheet" href="style2.css">
<div id = "freeTime">
<br>
<!-- Displays the total free hours a week to 0 decimal places -->
Total Free Hours a Week: <?php echo round($freeTime, 0)?>
</div>
<div id = "freeTime2">
<!-- Displays the average free time a day, to 2 decimal places -->
<?php echo "(or approximately " . round($freeTime/7, 2) . " hours a day)" ?>
</div>

<form action="Test2.php" method="post">
<div class = "button">
<button type="submit">Try again? </button>
</div>
</form>
<form action="NewProfessor.html" method="post">
<div class = "button">
<button type="submit">Add a new professor? </button>
</div>
</form>

</body>
</html>