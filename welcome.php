
<?php

function __autoload($class_name) {
    include $class_name . '.php';
}

$reader = new FileReader();
$professor1 = $reader->getProfessor($_POST['professor1']);
$professor2 = $reader->getProfessor($_POST['professor2']);
$professor3 = $reader->getProfessor($_POST['professor3']);
$professor4 = $reader->getProfessor($_POST['professor4']);
$course1 = new Course($_POST['course1'], $_POST['level1'], $_POST['requirement1'], $professor1);
echo $course1->getCourseDifficulty() . "\n";
$course2 = new Course($_POST['course2'], $_POST['level2'], $_POST['requirement2'], $professor2);
echo $course2->getCourseDifficulty() . "\n";
$course3 = new Course($_POST['course3'], $_POST['level3'], $_POST['requirement3'], $professor3);
echo $course3->getCourseDifficulty() . "\n";
$course4 = new Course($_POST['course4'], $_POST['level4'], $_POST['requirement4'], $professor4);
echo $course4->getCourseDifficulty() . "\n";

$courses = array($course1, $course2, $course3, $course4);
$professors = array($professor1, $professor2, $professor3, $professor4);

$user = new User($courses, $professors);

$totalCourseDifficulty = $user->getAllCourseDifficulty();
echo $totalCourseDifficulty . "\n";
$difficultyToHours = $totalCourseDifficulty/5;
echo $difficultyToHours . "\n";

?>

</body>
</html>