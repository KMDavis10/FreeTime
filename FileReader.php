<?php
// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: FileReader.php
// Description: Retrieves professor information from file, creates Professor objects, places objects into Professor array.
// 				Returns the correct professor object upon entry of a professor's name 
// Last modified on: 4/27/15

class FileReader {
	/** Array of professor objects - made up from all professors in the text file */
	private $ListOfProfessors;
	/** */
	private $professorFound;
	
	/** FileReader - the constructor. Moves professor information from file to array, which is then delimited and placed
	  * into $ListOfProfessors */
	public function FileReader() {
		/** Getting the professors file */
		$file = file_get_contents('./professors.txt', FILE_USE_INCLUDE_PATH);
		/** Each item (delimited by ",") is added to a seperate element in the $file array */
		$file = explode(",", $file);
		$counter = count($file);
		$freeTime = 0;
		/** count for keeping track of where we are in $ListOfProfessors */
		$count = 0;
		/** Array that contains all the professor objects */
		$this->ListOfProfessors = array();
		/** Because there are 4 parameters in the text file (professor name, helpfulness, clarity and easiness),
		  * the loop increments by 4 until it is finished
		  */
		if (strpos($file[$counter-1], ",") === true) {
			/** If the last position of the file has a hanging comma, we adjust how the array reads in the data */
			for ($i = 0; $i < $counter; $i = $i+4) {
				$this->ListOfProfessors[$count] = new Professor();
				$this->ListOfProfessors[$count]->setProfName($file[$i]);
				$this->ListOfProfessors[$count]->setProfHelp($file[$i+1]);
				$this->ListOfProfessors[$count]->setProfClarity($file[$i+2]);
				$this->ListOfProfessors[$count]->setProfEasy($file[$i+3]);
				$count++;
			}
		}
		else {
			for ($i = 0; $i < $counter-1; $i = $i+4) {
				$this->ListOfProfessors[$count] = new Professor();
				$this->ListOfProfessors[$count]->setProfName($file[$i]);
				$this->ListOfProfessors[$count]->setProfHelp($file[$i+1]);
				$this->ListOfProfessors[$count]->setProfClarity($file[$i+2]);
				$this->ListOfProfessors[$count]->setProfEasy($file[$i+3]);
				$count++;
			}
		}
	}
	
	/** getProfessor - takes in a string name and returns the professor object associated with it
	  *
	  * @param $eProfName
	  * @return $returnProf
	  */	
	public function getProfessor($eProfName) {
		$returnProf;
		$this->professorFound = false;
		$objects = $this->ListOfProfessors;
		/** Goes through list of professors and searches for the name entered as parameters */
		for ($i = 0; $i < count($objects); $i++) {
			/** If we were able to find a professor whose name matches the one in the parameter, we set "professorFound"
			  * to true and set returnProf to the object we matched 
			  */
			if (strpos($objects[$i]->getProfName(), $eProfName) !== false) {
				$this->professorFound = true;
				$returnProf = $objects[$i];
			}
		}
		/** If we were not able to find the correct professor after looking through our list, we set the professor object
		  * to the unknown object and return that.
		  */
		if ($this->professorFound != true) {
			for ($i = 0; $i < count($objects); $i++) {
				if (strpos($objects[$i]->getProfName(), "unknown") !== false) {
					$returnProf = $objects[$i];
				}
			}
		}
		return $returnProf;
	}
	
	/** Function for checking if the right professor was found in order to print a correct message to the user */
	public function getProfessorFound() {
		return $this->professorFound;
	}
	
}

?>

</body>
</html>