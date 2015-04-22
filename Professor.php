<?php

// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: Professor.php
// Description: Entity class designed to hold information about a professor 
// Last modified on: 4/21/15

class Professor
{
	private $profName;
	private $profHelp = 0;
	private $profClarity = 0;
	private $profEasy = 0;
	
	/** Empty constructor */
	public function Professor() {
		
	}
	
	/** Sets the professor object's name */
	public function setProfName($eProfName) {
		$this->profName = $eProfName;
	}
	
	/** Sets the professor object's clarity level */ 
	public function setProfClarity($eProfClarity) {
		$this->profClarity = $eProfClarity;
	}
	
	/** Sets the professor object's helpfulness level */
	public function setProfHelp($eProfHelp) {
		$this->profHelp = $eProfHelp; 
	}
	
	/** Sets the professor object's easiness level */
	public function setProfEasy($eProfEasy) {
		$this->profEasy = $eProfEasy;
	}
	
	/** Get function for retrieving the difficulty level of the professor
	  * @return 5-each difficulty parameter */
    public function difficulty_Prof()
    {
        return 5-$this->profHelp + 5-$this->profClarity + 5-$this->profEasy;
    }
	/** Get function to return the professor's name */
	 public function getProfName()
    {
		$returnProf = $this->profName;
		return $returnProf;	
	}
	/** ToString function - returns the name of the professor */
	public function __toString ()
	{
		$returnProf = $this->profName;
		return $returnProf;	
	}
}
?>