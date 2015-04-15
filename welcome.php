
<?php

function __autoload($class_name) {
    include $class_name . '.php';
}

$reader = new FileReader();
$professors = array();
$courseNames = array();
$courseLevels = array();
$majorRequirements = array();
$courses = array();
$count1 = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
foreach($_POST as $k => $v) {
	if(strpos($k, 'professor') === 0) {
		$professors[$count1] = $reader->getProfessor($v);
		$count1++;
	}
}
foreach($_POST as $k => $v) {
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

for ($i = 0; $i < $count1; $i++) {
	$courses[$i] = new Course($courseNames[$i], $courseLevels[$i], $majorRequirements[$i], $professors[$i]);
	echo $courses[$i];
}
$user = new User($courses, $professors);

$totalCourseDifficulty = $user->getAllCourseDifficulty();
$difficultyToHours = $totalCourseDifficulty/5;
echo nl2br("<br />" . "Total hours a week needed: " . $difficultyToHours);

?>

</body>
</html>