<?php

function __autoload($class_name) {
    include $class_name . '.php';
}

public class FileReader {

/** Getting the professors file */
$file = file_get_contents('./professors.txt', FILE_USE_INCLUDE_PATH);
/** Each item (delimited by ",") is added to a seperate element in the $file array */
$file = explode(",", $file);
$counter = count($file);
$freeTime = 0;
/** count for keeping track of where we are in $ListOfProfessors */
$count = 0;
/** Array that contains all the professor objects */
$ListOfProfessors = array();

for ($i = 0; $i < $counter; $i = $i+4) {
	$ListOfProfessors[$count] = new Professor();
	$ListOfProfessors[$count]->setProfName($file[$i]);
	$ListOfProfessors[$count]->setProfHelp($file[$i+1]);
	$ListOfProfessors[$count]->setProfClarity($file[$i+2]);
	$ListOfProfessors[$count]->setProfEasy($file[$i+3]);
	$count++;
}


for ($i = 0; $i < count($ListOfProfessors); $i++) {
	$var = $ListOfProfessors[$i]->difficulty_Prof();
	$freeTime = $var + $freeTime;
}

$course = new Course($_POST['course'], $_POST['level'], $_POST['requirement']);
$objects = $ListOfProfessors;
for ($i = 0; $i < count($objects); $i++) {
	if (strpos($objects[$i]->getProfName(), $_POST['professors']) !== false) {
		$course->setProfessor($objects[$i]);
	}
}

echo $course->getCourseDifficulty();
}

?>

</body>
</html>