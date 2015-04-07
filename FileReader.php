<?php
class FileReader {

	private $ListOfProfessors;
	
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

		for ($i = 0; $i < $counter; $i = $i+4) {
			$this->ListOfProfessors[$count] = new Professor();
			$this->ListOfProfessors[$count]->setProfName($file[$i]);
			$this->ListOfProfessors[$count]->setProfHelp($file[$i+1]);
			$this->ListOfProfessors[$count]->setProfClarity($file[$i+2]);
			$this->ListOfProfessors[$count]->setProfEasy($file[$i+3]);
			$count++;
		}
	}
		
	public function getProfessor($eProfName) {
		$returnProf;
		$objects = $this->ListOfProfessors;
		for ($i = 0; $i < count($objects); $i++) {
			if (strpos($objects[$i]->getProfName(), $eProfName) !== false) {
				$returnProf = $objects[$i];
			}
		}
		return $returnProf;
	}
}

?>

</body>
</html>