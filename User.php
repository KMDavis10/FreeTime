<?php

// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: User.php
// Description: Entity class designed to hold all the information about a specific user 
// Last modified on: 4/21/15

class User
{
	private $courses;
	private $professors;
	/** Constructor - 
	  * @param - array of courses that the user has, array of professors for each course 
	  */
	public function User($eCourses, $eProfessors) {
		$this->courses = $eCourses;
		$this->professors = $eProfessors;
	}
	
	/** AllCourseDifficulty function - adds up all the difficulty levels of each course and returns that calculation
	  */
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