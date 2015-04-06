<?php

function __autoload($class_name) {
    include $class_name . '.php';
}

$file = file_get_contents('./professors.txt', FILE_USE_INCLUDE_PATH);
$file = explode(",", $file);
$counter = count($file);
$freeTime = 0;
$count = 0;
$ListOfObjects = array();

for ($i = 0; $i < count($file); $i = $i+4) {
	$ListOfObjects[$count] = new Professor();
	$ListOfObjects[$count]->setProfName($file[$i]);
	$ListOfObjects[$count]->setProfHelp($file[$i+1]);
	$ListOfObjects[$count]->setProfClarity($file[$i+2]);
	$ListOfObjects[$count]->setProfEasy($file[$i+3]);
	$count++;
}


for ($i = 0; $i < count($ListOfObjects); $i++) {
	//echo $ListOfObjects[$i]->difficulty_Prof();
	$var = $ListOfObjects[$i]->difficulty_Prof();
	$freeTime = $var + $freeTime;
}

$objects = $ListOfObjects;
for ($i = 0; $i < count($objects); $i++) {
	if (strpos($objects[$i]->getProfName(), $_POST['professors']) !== false) {
		echo $objects[$i]->difficulty_Prof();
	}
}



?>

</body>
</html>