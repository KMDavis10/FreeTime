<?php
class User
{
	private $courses;
	private $professors;
	public function User($eCourses, $eProfessors) {
		$this->courses = $eCourses;
		$this->professors = $eProfessors;
	}
	
	public function getAllCourseDifficulty() {
		$x1 = 0;
		for ($i = 0; $i < count($this->courses); $i++) {
			$a = $this->courses[$i];
			$x1 = $x1 + $a->getCourseDifficulty();
		}
		$x2 = 0;
		for ($j = 0; $j < count($this->professors); $j++) {
			$b = $this->professors[$j];
			$x2 = $x2 + $b->difficulty_Prof();
		}
		$x3 = $x1 + $x2;
		return $x3;
	}

}
?> 