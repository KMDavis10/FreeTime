<?php

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
	  * if it does, then we get that Professor object and add it to the professor array 
	  */
	if(strpos($k, 'professor') === 0) {
		$professors[$count1] = $reader->getProfessor($v);
		$count1++;
	}
}
/** Retrieves user-entered information from Test2 and populates courseNames array */
foreach($_POST as $k => $v) {
	/** For each course name that the user entered in Test 2, we check to see if that course exists in our database
	  * if it does, then we add it to courseNames */
	if(strpos($k, 'course') === 0) {
		$courseNames[$count2] = $v;
		$count2++;
	}
}
foreach($_POST as $k => $v) {
	if(strpos($k, 'level') === 0) {
		$courseLevels[$count3] = $v;
		$count3++;
	}
}
foreach($_POST as $k => $v) {
	if(strpos($k, 'requirement') === 0) {
		$majorRequirements[$count4] = $v;
		$count4++;
	}
}
/** Creates each course with information from arrays */
for ($i = 0; $i < $count1; $i++) {
	$courses[$i] = new Course($courseNames[$i], $courseLevels[$i], $majorRequirements[$i], $professors[$i]);
	echo $courses[$i];
}
/** Defines a User and passes them the courses */
$user = new User($courses, $professors);
$totalCourseDifficulty = $user->getAllCourseDifficulty();
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
$difficultyToHours = $totalCourseDifficulty/5;
$difficultyToHours += $other;
echo nl2br("<br />" . "Total hours a week needed: " . $difficultyToHours);

?>

</body>
</html>