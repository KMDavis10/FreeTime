<?php
// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: Course.php
// Description: Entity class designed to hold information about a course 
// Last modified on: 4/27/15

class Course
{
	private $studentCourse;
	private $courseLevel;
	private $isMajor;
	private $professor;
	
	/** Course constructor - takes in the prefix of the course, the level, whether or not it's a major course 
	  * and the professor object
	  */
	public function Course ($eStudentCourse, $eCourseLevel, $eIsMajor, $eProfessor) {
		$this->studentCourse = $eStudentCourse;
		$this->courseLevel = $eCourseLevel;
		$this->isMajor = $eIsMajor;
		$this->professor = $eProfessor;
	}
	/** Calculates the difficulty of the course by calling other private methods
	  *
	  * @return the final calculation for course difficulty
	  */
	public function getCourseDifficulty() {
		$x1 = $this->courseCalculator();
		$x2 = $this->levelCalculator();
		$x3 = $this->majorCalculator();
		$a = $this->professor;
		$x4 = $a->difficulty_Prof();
		$x5 = $x1 + $x2 + $x3 + $x4;
		return $x5;
	}
	
	/** Get method for returning the name of a course
	  *
	  * @return studentCourse, the prefix of the course
	  */
	public function getCourseName() {
		return $this->studentCourse;
	}
	
	/** Get method for returning the level of a course
	  *
	  * @return courseLevel, the level of the course
	  */
	public function getCourseLevel() {
		return $this->courseLevel;
	}
	
	
	/** Gets course name difficulty from text file - each course prefix is assigned a difficulty level in the file
	  * which is parsed and added to the calculations
	  * @return the difficulty associated with the course 
	  */
	private function courseCalculator() {
		$file = file_get_contents('./courseList.txt', FILE_USE_INCLUDE_PATH);
		$file = explode(",", $file);
		$counter = count($file);
		$ListOfCourses = array();
		$count = 0;
		/** Gets course name and difficulty ranking from array and assigns them to a fixed location in the second 
		  * dimension of the array
		  */
		for ($i = 0; $i < $counter; $i=$i+2) {
			$ListOfCourses[$count][0] = $file[$i];
			$ListOfCourses[$count][1] = $file[$i+1];
			$count++;
		}
		$courseNameDifficulty = 0;
		/** Goes through the array of courses */
		for ($i = 0; $i < count($ListOfCourses); $i++) {
			$a = $ListOfCourses[$i][0];
			/** If the course that the user entered matches one in the array, then that course's difficulty is now
			  * courseNameDifficulty
			  */
			if (strpos($a, $this->studentCourse) !== false) {
				$courseNameDifficulty = $courseNameDifficulty + $ListOfCourses[$i][1];
			}
				
		}
		return $courseNameDifficulty;
	}
	
	/** Calculates difficulty of course's level - >100 level being the lowest difficulty, and 400+ being the highest 
	  * @return the difficulty associated with the level
	  */
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
	
	/** Calculates the major difficulty - if the class is a requirement to the student's major, it is assigned
	  * a higher difficulty (or priority) 
	  * @return the difficulty level associated with it being a major course
	  */
	private function MajorCalculator() {
		$majorDifficulty = 0;
		if ($this->isMajor == true) {
			$majorDifficulty = $majorDifficulty+10;
		}
		return $majorDifficulty;
	}
	
	/** ToString method - returns a string saying the difficulty of this particular course */
	public function __toString ()
	{
		$courseName = $this->studentCourse;
		$courseLevel = $this->courseLevel;
		$courseDifficulty = $this->getCourseDifficulty();
		return "<br />" . $courseName . $courseLevel . " has a difficulty ranking of: " . $courseDifficulty . "\n";
	}
	
	
}
?>