<?php
class Course
{
	private $studentCourse;
	private $courseLevel;
	private $isMajor;
	private $professor;
	
	public function Course ($eStudentCourse, $eCourseLevel, $eIsMajor, $eProfessor) {
		$this->studentCourse = $eStudentCourse;
		$this->courseLevel = $eCourseLevel;
		$this->isMajor = $eIsMajor;
		$this->professor = $eProfessor;
	}
	
	public function getCourseDifficulty() {
		$x1 = $this->courseCalculator();
		$x2 = $this->levelCalculator();
		$x3 = $this->majorCalculator();
		$a = $this->professor;
		$x4 = $a->difficulty_Prof();
		$x5 = $x1 + $x2 + $x3 + $x4;
		return $x5;
	}
	
	private function courseCalculator() {
		$file = file_get_contents('./courseList.txt', FILE_USE_INCLUDE_PATH);
		$file = explode(",", $file);
		$counter = count($file);
		$ListOfCourses = array();
		$count = 0;
		for ($i = 0; $i < $counter; $i=$i+2) {
			$ListOfCourses[$count][0] = $file[$i];
			$ListOfCourses[$count][1] = $file[$i+1];
			$count++;
		}
		$courseNameDifficulty = 0;
		for ($i = 0; $i < count($ListOfCourses); $i++) {
			$a = $ListOfCourses[$i][0];
			if (strpos($a, $this->studentCourse) !== false) {
				$courseNameDifficulty = $courseNameDifficulty + $ListOfCourses[$i][1];
			}
				
		}
		return $courseNameDifficulty;
	}
	
	private function levelCalculator() {
		$courseLevelDifficulty = 0;
		if ($this->courseLevel >= 100 && $this->courseLevel < 200) {
			$courseLevelDifficulty = $courseLevelDifficulty +5;
		}
		if ($this->courseLevel >= 200 && $this->courseLevel < 300) {
			$courseLevelDifficulty = $courseLevelDifficulty +7;
		}
		if ($this->courseLevel >= 300 && $this->courseLevel < 400) {
			$courseLevelDifficulty = $courseLevelDifficulty +10;
		}
		if ($this->courseLevel >= 400 && $this->courseLevel < 500) {
			$courseLevelDifficulty = $courseLevelDifficulty +12;
		}
		return $courseLevelDifficulty;
	}
	
	private function MajorCalculator() {
		$majorDifficulty = 0;
		if ($this->isMajor == true) {
			$majorDifficulty = $majorDifficulty+10;
		}
		return $majorDifficulty;
	}
	
	public function __toString ()
	{
		$courseName = $this->studentCourse;
		$courseLevel = $this->courseLevel;
		$courseDifficulty = $this->getCourseDifficulty();
		return "<br />" . $courseName . $courseLevel . " has a difficulty ranking of: " . $courseDifficulty . "\n";
	}
	
	
}
?>