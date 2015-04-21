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
// Last modified on: 4/21/15

function __autoload($class_name) {
    include $class_name . '.php';
}
/** $reader - FileReader object that reads information about each professor and places them into objects */
$reader = new FileReader();
$professors = array();
$courseNames = array();
$courseLevels = array();
$majorRequirements = array();
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
	
	  * If the user did not enter a professor (or entered an invalid input) then we use a default "unknown" professor with
	  * 0 difficulty level. 
	  */
	if (strpos($k, 'professor') === 0 && empty($v)) {
		$professors[$count1] = $reader->getProfessor("unknown");
		$count1++;
	}
	else {
		/** Otherwise, we send the value through to reader's getProfessor method and get a professor object back,
		   * which we place into our professors array
		   */
		if(strpos($k, 'professor') === 0) {
			$professors[$count1] = $reader->getProfessor($v);
			$count1++;
		}
	}
}
/** Retrieves user-entered information from Test2 and populates courseNames array */
foreach($_POST as $k => $v) {
/** For each course name that the user entered in Test 2, we check to see if that course exists in our database
  *
  * If the user did not enter a course, then we use a default "UNK" prefix (short for unknown), and we do not 
  * use information about the course name in our difficulty calculations
  */
	if(strpos($k, 'course') === 0 && empty($v)) {
			$courseNames[$count2] = "UNK";
			$count2++;
	}
		/** Otherwise, we place the user-entered course name in our courseNames array */
	else {
		if (strpos($k, 'course') === 0) {
			$courseNames[$count2] = $v;
			$count2++;
		}
	}	
}

/** Retrieves user-entered information from Test2 and populates courseLevels array */
foreach($_POST as $k => $v) {
/** For each course level that the user entered, we check to see if that name exists in our database 
  *
  * If the user did not enter a course level, then we use a default course level of 0, which assigns 0 difficulty */
	if(strpos($k, 'level') === 0 && empty($v)) {
			$courseLevels[$count3] = 0;
			$count3++;
	/** Otherwise, we use the user-entered value as the course level */
	else {
		$courseLevels[$count3] = $v;
		$count3++;
	}
	
}

/** Retrieves user-entered information from Test2 and populates the majorRequirements array */
foreach($_POST as $k => $v) {
	/** If the user did not enter a value as to whether or not the course was a major requirement, then our default is 0 */
	if(strpos($k, 'requirement' && empty($v)) === 0) {
			$majorRequirements[$count4] = 0;
			$count4++;
		}
		/** Otherwise, we use the user-entered value as the major requirement */
		else {
			$majorRequirements[$count4] = $v;
			$count4++;
		}
	}
}
/** Creates each course with information from arrays */
for ($i = 0; $i < $count1; $i++) {
	$courses[$i] = new Course($courseNames[$i], $courseLevels[$i], $majorRequirements[$i], $professors[$i]);
	echo $courses[$i];
}
/** Defines a User and passes them the courses */
$user = new User($courses, $professors);
/** Takes calculations about the user's classes from user */
$totalCourseDifficulty = $user->getAllCourseDifficulty();
/** Retrieves other user-entered schedule information */
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
/** Converts difficulty level to hours needed to do well in that class */
$difficultyToHours = $totalCourseDifficulty/5;
/** Adds course hours to other hours */
$difficultyToHours += $other;
/** Displays total hours needed a week */
echo nl2br("<br />" . "Total hours a week needed: " . $difficultyToHours);
/** 100 comes from 168 (total hours in a week) - 56 (hours spent sleeping a week 8*7) - 12 (hours spent in class a week) */
$freeTime = 100 - $difficultyToHours;
/** Displays free time that student has a week, or average free time per day */
echo nl2br("<br />" . "Total free hours a week: " . $freeTime . ", or approximately " . $freeTime/7 . " hours a day");

?>

</body>
</html>